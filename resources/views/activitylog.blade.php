@extends('layout.master')

@push('plugin-styles')
    {{-- DataTables CSS --}}
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    {{-- Header Section --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
        <div>
            <h4 class="text-2xl font-extrabold text-slate-900 tracking-tight">System Audit Log</h4>
            <p class="text-slate-500 text-sm font-medium">Detailed tracking of administrative actions and record changes.</p>
        </div>
        <div class="mt-4 md:mt-0">
            <div class="flex items-center bg-white text-slate-600 px-4 py-2 rounded-2xl border border-slate-200 shadow-sm">
                <span class="relative flex h-2 w-2 mr-3">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                </span>
                <span class="text-[11px] font-bold uppercase tracking-widest">Live Monitoring Enabled</span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card border-0 shadow-sm overflow-hidden">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table align-middle">
                            <thead class="bg-slate-50/50">
                                <tr>
                                    <th class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">User</th>
                                    <th class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">Target Resource</th>
                                    <th class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">Action</th>
                                    <th class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">Timestamp</th>
                                    <th class="text-[11px] font-bold text-slate-400 uppercase tracking-widest text-center">Details</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50">
                                @foreach($logs as $log)
                                    <tr class="hover:bg-slate-50/30 transition-colors">
                                        {{-- User Column --}}
                                        <td class="py-3">
                                            <div class="flex items-center gap-3">
                                                <div class="w-8 h-8 rounded-full bg-indigo-50 flex items-center justify-center text-indigo-600 font-bold text-xs border border-indigo-100">
                                                    {{ substr($log->causer->name ?? 'S', 0, 1) }}
                                                </div>
                                                <div>
                                                    <div class="font-bold text-slate-700 text-sm">{{ $log->causer->name ?? 'System' }}</div>
                                                    <div class="text-[9px] text-slate-400 font-bold uppercase tracking-tighter">
                                                        IP: {{ $log->getExtraProperty('ip') ?? 'N/A' }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        {{-- Target Column --}}
                                        <td>
                                            <span class="text-sm font-semibold text-slate-700">{{ class_basename($log->subject_type) }}</span>
                                            <span class="text-slate-400 font-mono text-[10px] ml-1 block">ID: #{{ $log->subject_id }}</span>
                                        </td>

                                        {{-- Action Badge --}}
                                        <td>
                                            @php
                                                $styles = [
                                                    'created' => 'bg-emerald-50 text-emerald-600 border-emerald-100',
                                                    'updated' => 'bg-amber-50 text-amber-600 border-amber-100',
                                                    'deleted' => 'bg-rose-50 text-rose-600 border-rose-100',
                                                ][$log->description] ?? 'bg-slate-50 text-slate-600 border-slate-100';
                                            @endphp
                                            <span class="inline-flex px-3 py-1 rounded-full text-[10px] font-black uppercase border {{ $styles }}">
                                                {{ $log->description }}
                                            </span>
                                        </td>

                                        {{-- Time Column --}}
                                        <td>
                                            <div class="text-sm font-bold text-slate-700">{{ $log->created_at->format('M d, Y') }}</div>
                                            <div class="text-[10px] text-slate-400 uppercase font-medium">{{ $log->created_at->format('h:i A') }}</div>
                                        </td>

                                        {{-- Modal Trigger --}}
                                        <td class="text-center">
                                            <button onclick='openLogModal(@json($log->properties), "{{ $log->description }}", "{{ $log->causer->name ?? 'System' }}", "{{ $log->created_at->diffForHumans() }}")'
                                                class="w-8 h-8 rounded-lg bg-white border border-slate-200 text-slate-400 hover:text-indigo-600 hover:border-indigo-200 transition-all shadow-sm">
                                                <i class="fas fa-eye text-xs"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ADVANCED AUDIT MODAL --}}
    <div id="logModal" class="hidden fixed inset-0 z-[9999] overflow-y-auto" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-slate-900/20 backdrop-blur-sm transition-opacity" onclick="closeLogModal()"></div>

        <div class="flex items-center justify-center min-h-screen p-4">
            <div id="modalPanel" class="relative bg-white rounded-[2rem] overflow-hidden shadow-2xl transform transition-all sm:max-w-2xl sm:w-full border border-white opacity-0 scale-95 duration-300">
                
                <div id="accentBar" class="h-1.5 w-full bg-slate-200"></div>

                <div class="px-8 pt-8 pb-4 flex justify-between items-start">
                    <div class="flex items-start gap-4">
                        <div id="actionIcon" class="flex items-center justify-center w-12 h-12 rounded-2xl border shadow-sm"></div>
                        <div>
                            <h3 class="text-xl font-black text-slate-900 tracking-tight">Audit Details</h3>
                            <p class="text-xs text-slate-500 font-medium">
                                Action by <span class="text-slate-900 font-bold" id="userName"></span> • <span id="logTime"></span>
                            </p>
                        </div>
                    </div>
                    <button onclick="closeLogModal()" class="text-slate-300 hover:text-slate-600 transition-colors">
                        <i class="fas fa-times text-lg"></i>
                    </button>
                </div>

                <div class="px-8 pb-8">
                    <div class="max-h-[50vh] overflow-y-auto pr-2 custom-scrollbar" id="modalContent"></div>
                </div>

                <div class="px-8 py-4 bg-slate-50 border-t border-slate-100 flex justify-end">
                    <button onclick="closeLogModal()" class="px-6 py-2 bg-slate-900 text-white text-xs font-bold rounded-xl shadow-md">
                        Done
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script>
        $(function() {
            'use strict';
            // Initialize DataTable
            $('#dataTableExample').DataTable({
                "aLengthMenu": [[10, 30, 50, -1], [10, 30, 50, "All"]],
                "iDisplayLength": 10,
                "language": { search: "" },
                "order": [[3, "desc"]] // Sort by Timestamp by default
            });
            $('.dataTables_filter input').addClass('form-control bg-transparent border-slate-200 rounded-lg text-sm').attr("placeholder", "Search logs...");
        });

        function openLogModal(properties, action, user, time) {
            const modal = document.getElementById('logModal');
            const panel = document.getElementById('modalPanel');
            const content = document.getElementById('modalContent');
            const iconBox = document.getElementById('actionIcon');
            const accentBar = document.getElementById('accentBar');
            
            document.getElementById('userName').innerText = user;
            document.getElementById('logTime').innerText = time;

            // Theme Setting
            let theme = { icon: '', bg: '', accent: '' };
            if(action === 'created') theme = { icon: 'fa-plus', bg: 'bg-emerald-50 border-emerald-100 text-emerald-500', accent: 'bg-emerald-500' };
            else if(action === 'updated') theme = { icon: 'fa-pen', bg: 'bg-amber-50 border-amber-100 text-amber-500', accent: 'bg-amber-500' };
            else theme = { icon: 'fa-trash-alt', bg: 'bg-rose-50 border-rose-100 text-rose-500', accent: 'bg-rose-500' };

            iconBox.innerHTML = `<i class="fas ${theme.icon} text-lg"></i>`;
            iconBox.className = `flex items-center justify-center w-12 h-12 rounded-2xl border shadow-sm ${theme.bg}`;
            accentBar.className = `h-1.5 w-full ${theme.accent}`;

            // Data Logic
            const attributes = properties.attributes || (action === 'deleted' ? properties : {});
            const old = properties.old || null;
            const skip = ['id', 'created_at', 'updated_at', 'password'];
            const keys = Object.keys(attributes).filter(k => !skip.includes(k));

            let html = '';
            if (action === 'updated' && old) {
                html = `<div class="space-y-3">`;
                keys.forEach(key => {
                    html += `
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                        <label class="text-[10px] font-black text-slate-400 uppercase block mb-2">${key}</label>
                        <div class="grid grid-cols-11 items-center gap-2 text-xs">
                            <div class="col-span-5 p-2 rounded bg-white border border-slate-100 text-slate-400 line-through">${old[key] ?? 'N/A'}</div>
                            <div class="col-span-1 text-center"><i class="fas fa-arrow-right text-slate-300"></i></div>
                            <div class="col-span-5 p-2 rounded bg-indigo-50 border border-indigo-100 text-indigo-700 font-bold">${attributes[key]}</div>
                        </div>
                    </div>`;
                });
            } else {
                html = `<div class="grid grid-cols-2 gap-3">`;
                keys.forEach(key => {
                    html += `
                    <div class="p-3 rounded-2xl bg-slate-50 border border-slate-100">
                        <label class="text-[9px] font-black text-slate-400 uppercase block">${key}</label>
                        <div class="text-xs font-bold text-slate-700">${attributes[key]}</div>
                    </div>`;
                });
            }
            content.innerHTML = html + `</div>`;

            modal.classList.remove('hidden');
            setTimeout(() => { panel.classList.add('opacity-100', 'scale-100'); }, 10);
        }

        function closeLogModal() {
            const modal = document.getElementById('logModal');
            const panel = document.getElementById('modalPanel');
            panel.classList.remove('opacity-100', 'scale-100');
            setTimeout(() => { modal.classList.add('hidden'); }, 300);
        }
    </script>
@endpush
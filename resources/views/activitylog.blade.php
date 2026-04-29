@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    {{-- Header Section --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
            <h4 class="text-2xl font-extrabold text-slate-900 tracking-tight">System Audit Log</h4>
            <p class="text-slate-500 text-sm font-medium">Detailed tracking of administrative actions and record changes.</p>
        </div>
        <div class="mt-4 md:mt-0">
            <div class="flex items-center bg-white text-slate-600 px-4 py-2 rounded-2xl border border-slate-200 shadow-sm transition-all hover:shadow-md">
                <span class="relative flex h-2 w-2 mr-3">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                </span>
                <span class="text-[11px] font-bold uppercase tracking-widest">Live Monitoring</span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card border-0 shadow-sm  overflow-hidden">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table  class="table mb-0 align-middle">
                            <thead class="bg-slate-50/50 border-b border-slate-100">
                                <tr>
                                    <th class="px-6 py-4 text-[11px] font-bold text-slate-400 uppercase tracking-widest">User</th>
                                    <th class="px-6 py-4 text-[11px] font-bold text-slate-400 uppercase tracking-widest">Target</th>
                                    <th class="px-6 py-4 text-[11px] font-bold text-slate-400 uppercase tracking-widest">Timestamp</th>
                                    <th class="px-6 py-4 text-[11px] font-bold text-slate-400 uppercase tracking-widest text-center">Action</th>
                                    <th class="px-6 py-4 text-[11px] font-bold text-slate-400 uppercase tracking-widest text-center">Details</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50">
                                @foreach($logs as $log)
                                    <tr class="hover:bg-slate-50/30 transition-colors">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-3">
                                                <div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-500 font-bold text-xs border border-slate-200">
                                                    {{ substr($log->causer->name ?? 'S', 0, 1) }}
                                                </div>
                                                <div>
                                                    <div class="font-bold text-slate-700 text-sm">{{ $log->causer->name ?? 'System' }}</div>
                                                    <div class="text-[10px] text-indigo-500 font-bold uppercase tracking-tighter">
                                                        {{ $log->getExtraProperty('user_type') ?? 'Automated' }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-sm font-semibold text-slate-700">
                                            {{ class_basename($log->subject_type) }} <span class="text-slate-400 font-mono text-xs ml-1">#{{ $log->subject_id }}</span>
                                        </td>
                                        <td class="px-6 py-4 text-sm">
                                            <div class="font-bold text-slate-700">{{ $log->created_at->format('h:i A') }}</div>
                                            <div class="text-[10px] text-slate-400 uppercase">{{ $log->created_at->format('M d, Y') }}</div>
                                        </td>
                                        <td class="px-6 py-4 text-center">
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
                                        <td class="px-6 py-4 text-center">
                                            <button onclick='openLogModal(@json($log->properties), "{{ $log->description }}", "{{ $log->causer->name ?? 'System' }}", "{{ $log->created_at->diffForHumans() }}")'
                                                class="w-9 h-9 rounded-xl bg-white border border-slate-200 text-slate-400 hover:text-indigo-600 hover:border-indigo-200 transition-all shadow-sm">
                                                <i class="fas fa-search-plus text-xs"></i>
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

    {{-- MODERN AUDIT MODAL --}}
    <div id="logModal" class="hidden fixed inset-0 z-[9999] overflow-y-auto" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-slate-900/10 backdrop-blur-sm transition-opacity duration-500" onclick="closeLogModal()"></div>

        <div class="flex items-center justify-center min-h-screen p-4">
            <div id="modalPanel" class="relative bg-white/95 backdrop-blur-xl rounded-[2.5rem] overflow-hidden shadow-[0_32px_64px_-12px_rgba(0,0,0,0.15)] transform transition-all sm:max-w-2xl sm:w-full border border-white scale-95 opacity-0 duration-300">
                
                <div id="accentBar" class="h-1.5 w-full bg-slate-200"></div>

                <div class="px-10 pt-10 pb-6 flex justify-between items-start">
                    <div class="flex items-start gap-6">
                        <div id="actionIcon" class="flex items-center justify-center w-16 h-16 rounded-3xl shadow-sm border border-slate-100"></div>
                        <div>
                            <h3 class="text-2xl font-black text-slate-900 tracking-tight">Audit Details</h3>
                            <p class="text-sm text-slate-500 font-medium">
                                Performed by <span class="text-slate-900 font-bold" id="userName">Admin</span> • <span id="logTime" class="text-slate-400">Just now</span>
                            </p>
                        </div>
                    </div>
                    <button onclick="closeLogModal()" class="group p-3 rounded-2xl hover:bg-slate-100 transition-all">
                        <i class="fas fa-times text-slate-400 group-hover:rotate-90 transition-transform"></i>
                    </button>
                </div>

                <div class="px-10 pb-10">
                    <div class="max-h-[50vh] overflow-y-auto pr-2 custom-scrollbar" id="modalContent">
                        {{-- Content injected here --}}
                    </div>
                </div>

                <div class="px-10 py-6 bg-slate-50/50 border-t border-slate-100 flex justify-between items-center">
                    <span class="text-[10px] text-slate-400 font-bold uppercase tracking-widest font-mono">Reference Trace: Security Log</span>
                    <button onclick="closeLogModal()" class="px-8 py-3 bg-slate-900 hover:bg-black text-white text-xs font-bold rounded-2xl transition-all shadow-lg active:scale-95">
                        Close Review
                    </button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .custom-scrollbar::-webkit-scrollbar { width: 4px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
    </style>
@endsection

@push('custom-scripts')
    <script>
        function openLogModal(properties, action, user, time) {
            const modal = document.getElementById('logModal');
            const panel = document.getElementById('modalPanel');
            const content = document.getElementById('modalContent');
            const iconBox = document.getElementById('actionIcon');
            const accentBar = document.getElementById('accentBar');
            
            document.getElementById('userName').innerText = user;
            document.getElementById('logTime').innerText = time;

            // 1. Action Theme Setup
            let icon = '', themeClass = '', accent = '';
            if(action === 'created') { 
                icon = '<i class="fas fa-plus text-emerald-500 text-xl"></i>'; 
                themeClass = 'bg-emerald-50'; accent = 'bg-emerald-500';
            } else if(action === 'updated') { 
                icon = '<i class="fas fa-pen text-amber-500 text-xl"></i>'; 
                themeClass = 'bg-amber-50'; accent = 'bg-amber-500';
            } else { 
                icon = '<i class="fas fa-trash-alt text-rose-500 text-xl"></i>'; 
                themeClass = 'bg-rose-50'; accent = 'bg-rose-500';
            }
            iconBox.innerHTML = icon;
            iconBox.className = `flex items-center justify-center w-16 h-16 rounded-3xl shadow-sm border border-slate-100 ${themeClass}`;
            accentBar.className = `h-1.5 w-full ${accent}`;

            // 2. Data Preparation
            const attributes = properties.attributes || (action === 'deleted' ? properties : {});
            const old = properties.old || null;
            const skip = ['id', 'created_at', 'updated_at', 'deleted_at', 'password', 'remember_token'];
            
            const keys = [...new Set([...Object.keys(attributes), ...Object.keys(old || {})])]
                        .filter(k => !skip.includes(k) && typeof attributes[k] !== 'object');

            let html = '';

            // 3. Render Layout
            if (action === 'updated') {
                // Update Layout: 1 field per row, side-by-side comparison
                html = `<div class="space-y-4">`;
                keys.forEach(key => {
                    const valOld = old && old[key] !== undefined ? old[key] : 'N/A';
                    const valNew = attributes[key] !== undefined ? attributes[key] : 'N/A';
                    
                    html += `
                    <div class="p-5 rounded-3xl bg-slate-50/50 border border-slate-100">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-3">${key.replace(/_/g, ' ')}</label>
                        <div class="flex items-center gap-4">
                            <div class="flex-1 p-3 rounded-xl bg-white border border-slate-100 text-xs text-slate-400 line-through">${valOld}</div>
                            <i class="fas fa-long-arrow-alt-right text-slate-300"></i>
                            <div class="flex-1 p-3 rounded-xl bg-indigo-50 border border-indigo-100 text-xs text-indigo-900 font-bold">${valNew}</div>
                        </div>
                    </div>`;
                });
                html += `</div>`;
            } else {
                // Created/Deleted Layout: 2 fields per row grid
                html = `<div class="grid grid-cols-2 gap-4">`;
                keys.forEach(key => {
                    const val = attributes[key] !== undefined ? attributes[key] : 'EMPTY';
                    const bg = action === 'deleted' ? 'bg-rose-50/50 border-rose-100 text-rose-900' : 'bg-slate-50 border-slate-100 text-slate-700';
                    
                    html += `
                    <div class="p-4 rounded-3xl ${bg} border">
                        <label class="text-[10px] font-black opacity-50 uppercase tracking-widest block mb-1">${key.replace(/_/g, ' ')}</label>
                        <div class="text-xs font-bold truncate">${val}</div>
                    </div>`;
                });
                html += `</div>`;
            }

            content.innerHTML = keys.length > 0 ? html : `<p class="text-center text-slate-400 py-10 italic">No displayable data found.</p>`;

            // 4. Show Modal
            modal.classList.remove('hidden');
            setTimeout(() => { panel.classList.add('scale-100', 'opacity-100'); }, 50);
        }

        function closeLogModal() {
            const modal = document.getElementById('logModal');
            const panel = document.getElementById('modalPanel');
            panel.classList.remove('scale-100', 'opacity-100');
            setTimeout(() => { modal.classList.add('hidden'); }, 300);
        }
    </script>
@endpush
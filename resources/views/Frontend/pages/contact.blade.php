@extends('Frontend.layouts.master')

@section('title', 'Contact Us')

@section('content')
    <section class="relative pt-28 pb-16 bg-zinc-50 dark:bg-zinc-950 overflow-hidden">
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute -top-20 -left-24 w-[340px] h-[340px] rounded-full bg-violet-500/10 blur-3xl"></div>
            <div class="absolute inset-0 bg-[radial-gradient(#d4d4d8_1px,transparent_1px)] dark:bg-[radial-gradient(#27272a_1px,transparent_1px)] [background-size:28px_28px] opacity-50"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-6">
            <div class="max-w-3xl">
                <span class="inline-flex items-center px-3 py-1 text-xs font-bold uppercase tracking-widest rounded-full bg-indigo-50 text-indigo-600 dark:bg-indigo-950/50 dark:text-indigo-300 border border-indigo-100 dark:border-indigo-900/50">
                    Contact Us
                </span>
                <h1 class="mt-5 text-4xl sm:text-5xl font-black tracking-tight text-zinc-900 dark:text-white leading-tight">
                    Let’s discuss your next project.
                </h1>
                <p class="mt-6 text-lg text-zinc-600 dark:text-zinc-400 leading-relaxed">
                    Have a question or need technical consultation? Send us a message and our team will get back to you
                    as soon as possible.
                </p>
            </div>
        </div>
    </section>

    <section class="pb-20 bg-zinc-50 dark:bg-zinc-950">
        <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 rounded-2xl border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900 p-6 sm:p-8">
                <h2 class="text-2xl font-black text-zinc-900 dark:text-white">Send a message</h2>
                <p class="mt-2 text-sm text-zinc-500 dark:text-zinc-400">Fill out the form below and we will contact you.</p>

                <form action="{{ route('contact.send') }}" method="POST" class="mt-6 space-y-5">
                    @csrf
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-zinc-700 dark:text-zinc-300 mb-2">Full Name</label>
                            <input type="text" name="name" required
                                class="w-full rounded-xl border border-zinc-300 dark:border-zinc-700 bg-white dark:bg-zinc-950 px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-200 dark:focus:ring-indigo-900 focus:border-indigo-400 outline-none transition">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-zinc-700 dark:text-zinc-300 mb-2">Email Address</label>
                            <input type="email" name="email" required
                                class="w-full rounded-xl border border-zinc-300 dark:border-zinc-700 bg-white dark:bg-zinc-950 px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-200 dark:focus:ring-indigo-900 focus:border-indigo-400 outline-none transition">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-zinc-700 dark:text-zinc-300 mb-2">Phone</label>
                        <input type="text" name="phone"
                            class="w-full rounded-xl border border-zinc-300 dark:border-zinc-700 bg-white dark:bg-zinc-950 px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-200 dark:focus:ring-indigo-900 focus:border-indigo-400 outline-none transition">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-zinc-700 dark:text-zinc-300 mb-2">Message</label>
                        <textarea name="message" rows="5" required
                            class="w-full rounded-xl border border-zinc-300 dark:border-zinc-700 bg-white dark:bg-zinc-950 px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-200 dark:focus:ring-indigo-900 focus:border-indigo-400 outline-none transition"></textarea>
                    </div>
                    <button type="submit"
                        class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-indigo-600 text-white font-semibold hover:bg-indigo-700 transition-colors shadow-lg shadow-indigo-600/20">
                        Send Message
                        <i class="fa-solid fa-paper-plane text-xs"></i>
                    </button>
                </form>
            </div>

            <div class="space-y-4">
                <div class="rounded-2xl border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900 p-6">
                    <h3 class="font-bold text-zinc-900 dark:text-white">Email</h3>
                    <p class="mt-2 text-sm text-zinc-600 dark:text-zinc-400">support@example.com</p>
                </div>
                <div class="rounded-2xl border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900 p-6">
                    <h3 class="font-bold text-zinc-900 dark:text-white">Phone</h3>
                    <p class="mt-2 text-sm text-zinc-600 dark:text-zinc-400">+92 300 0000000</p>
                </div>
                <div class="rounded-2xl border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900 p-6">
                    <h3 class="font-bold text-zinc-900 dark:text-white">Office Hours</h3>
                    <p class="mt-2 text-sm text-zinc-600 dark:text-zinc-400">Mon - Fri, 9:00 AM - 6:00 PM</p>
                </div>
            </div>
        </div>
    </section>
@endsection

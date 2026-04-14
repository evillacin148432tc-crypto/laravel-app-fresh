<x-layout>
    <style>
        @keyframes gradientFlow {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .animate-mesh {
            background: linear-gradient(-45deg, #741a1a, #1e1b4b, #ac3636, #020617);
            background-size: 400% 400%;
            animation: gradientFlow 10s ease infinite;
        }

        .glass-card {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>

    <div class="min-h-screen animate-mesh py-12 px-4 sm:px-6 lg:px-8 font-sans antialiased">
        <div class="max-w-7xl mx-auto">

            <div class="glass-card rounded-3xl shadow-2xl overflow-hidden">

                <div class="px-8 pt-8 pb-6 bg-gradient-to-b from-white/5 to-transparent">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <div class="flex items-center space-x-4">
                            <div class="p-3 bg-indigo-500/20 rounded-2xl ring-1 ring-indigo-400/30">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5V4H2v16h5m10 0v-2a4 4 0 00-4-4H11a4 4 0 00-4 4v2m10 0H7m10-10a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                            <div>
                                <h1 class="text-2xl font-bold text-white tracking-tight">Registered Users</h1>
                                <p class="text-xs text-indigo-300 uppercase tracking-widest font-bold opacity-70">
                                    Demonstration Purposes
                                </p>
                            </div>
                        </div>

                        <a href="/register"
                           class="inline-flex items-center justify-center bg-indigo-600 hover:bg-indigo-500 transition-all px-5 py-3 rounded-xl text-sm font-bold text-white shadow-lg shadow-indigo-500/20">
                            Add New User
                        </a>
                    </div>
                </div>

                <div class="px-8 pb-8">
                    @if(session('success'))
                        <div class="mb-6 rounded-xl bg-emerald-500/10 border border-emerald-500/20 px-4 py-3 text-sm text-emerald-300">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="rounded-2xl border border-white/10 bg-white/5 overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="min-w-full text-sm text-left text-slate-300">
                                <thead class="bg-white/5 text-slate-200 uppercase text-xs tracking-wider">
                                    <tr>
                                        <th class="px-4 py-4">ID</th>
                                        <th class="px-4 py-4">First Name</th>
                                        <th class="px-4 py-4">Last Name</th>
                                        <th class="px-4 py-4">Middle Name</th>
                                        <th class="px-4 py-4">Nickname</th>
                                        <th class="px-4 py-4">Email</th>
                                        <th class="px-4 py-4">Age</th>
                                        <th class="px-4 py-4">Address</th>
                                        <th class="px-4 py-4">Contact Number</th>
                                        <th class="px-4 py-4 text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-white/5">
                                    @forelse($users as $user)
                                        <tr class="hover:bg-white/5 transition-all">
                                            <td class="px-4 py-4">{{ $user->id }}</td>
                                            <td class="px-4 py-4">{{ $user->first_name }}</td>
                                            <td class="px-4 py-4">{{ $user->last_name }}</td>
                                            <td class="px-4 py-4">{{ $user->middle_name }}</td>
                                            <td class="px-4 py-4">{{ $user->nickname }}</td>
                                            <td class="px-4 py-4">{{ $user->email }}</td>
                                            <td class="px-4 py-4">{{ $user->age }}</td>
                                            <td class="px-4 py-4">{{ $user->address }}</td>
                                            <td class="px-4 py-4">{{ $user->contact_number }}</td>
                                            <td class="px-4 py-4">
                                                <div class="flex items-center justify-center gap-2">
                                                    <a href="/users/edit/{{ $user->id }}"
                                                       class="bg-amber-500/20 hover:bg-amber-500/30 text-amber-300 px-3 py-2 rounded-lg text-xs font-bold transition-all">
                                                        Edit
                                                    </a>

                                                    <form action="/users/delete/{{ $user->id }}" method="POST" onsubmit="return confirm('Delete this user?')">
                                                        @csrf
                                                        <button type="submit"
                                                            class="bg-red-500/20 hover:bg-red-500/30 text-red-300 px-3 py-2 rounded-lg text-xs font-bold transition-all">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="px-4 py-10 text-center text-slate-500">
                                                No users found.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="px-8">
                    <div class="w-full border-t border-white/5"></div>
                </div>

                <div class="px-8 py-8">
                    <div class="text-center py-10 rounded-2xl bg-white/5 border border-dashed border-white/10">
                        <p class="text-slate-500 text-sm font-medium">
                            User records will appear here after registration.
                        </p>
                    </div>
                </div>
            </div>

            <div class="text-center mt-8">
                <p class="text-slate-500 text-[10px] uppercase tracking-[0.3em] font-bold">
                    University of Mindanao • Data Systems
                </p>
            </div>
        </div>
    </div>
</x-layout>
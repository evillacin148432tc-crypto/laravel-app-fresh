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

    <div class="min-h-screen animate-mesh py-12 px-4 sm:px-6 lg:px-8 font-sans antialiased flex items-center">
        <div class="max-w-3xl mx-auto w-full">
            
            <div class="glass-card rounded-3xl shadow-2xl overflow-hidden">
                
                <div class="px-8 pt-8 pb-6 bg-gradient-to-b from-white/5 to-transparent">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-indigo-500/20 rounded-2xl ring-1 ring-indigo-400/30">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-white tracking-tight">User Registration</h1>
                            <p class="text-xs text-indigo-300 uppercase tracking-widest font-bold opacity-70">Demonstration purposes</p>
                        </div>
                    </div>
                </div>

                <div class="px-8 pb-8">
                    @if(session('success'))
                        <div class="mb-4 rounded-xl bg-emerald-500/10 border border-emerald-500/20 px-4 py-3 text-sm text-emerald-300">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="mb-4 rounded-xl bg-red-500/10 border border-red-500/20 px-4 py-3 text-sm text-red-300">
                            <ul class="list-disc pl-5 space-y-1">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="/users/store" class="space-y-4">
                        @csrf

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="first_name" class="block text-xs font-semibold text-slate-400 mb-2 ml-1 uppercase tracking-wider">
                                    First Name
                                </label>
                                <input
                                    id="first_name"
                                    type="text"
                                    name="first_name"
                                    value="{{ old('first_name') }}"
                                    required
                                    placeholder="Enter first name..."
                                    class="w-full rounded-xl bg-slate-950/50 border border-slate-700/50 text-white px-4 py-3.5 text-sm transition-all placeholder:text-slate-600 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 focus:outline-none"
                                />
                            </div>

                            <div>
                                <label for="last_name" class="block text-xs font-semibold text-slate-400 mb-2 ml-1 uppercase tracking-wider">
                                    Last Name
                                </label>
                                <input
                                    id="last_name"
                                    type="text"
                                    name="last_name"
                                    value="{{ old('last_name') }}"
                                    required
                                    placeholder="Enter last name..."
                                    class="w-full rounded-xl bg-slate-950/50 border border-slate-700/50 text-white px-4 py-3.5 text-sm transition-all placeholder:text-slate-600 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 focus:outline-none"
                                />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="middle_name" class="block text-xs font-semibold text-slate-400 mb-2 ml-1 uppercase tracking-wider">
                                    Middle Name
                                </label>
                                <input
                                    id="middle_name"
                                    type="text"
                                    name="middle_name"
                                    value="{{ old('middle_name') }}"
                                    placeholder="Enter middle name..."
                                    class="w-full rounded-xl bg-slate-950/50 border border-slate-700/50 text-white px-4 py-3.5 text-sm transition-all placeholder:text-slate-600 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 focus:outline-none"
                                />
                            </div>

                            <div>
                                <label for="nickname" class="block text-xs font-semibold text-slate-400 mb-2 ml-1 uppercase tracking-wider">
                                    Nickname
                                </label>
                                <input
                                    id="nickname"
                                    type="text"
                                    name="nickname"
                                    value="{{ old('nickname') }}"
                                    placeholder="Enter nickname..."
                                    class="w-full rounded-xl bg-slate-950/50 border border-slate-700/50 text-white px-4 py-3.5 text-sm transition-all placeholder:text-slate-600 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 focus:outline-none"
                                />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="email" class="block text-xs font-semibold text-slate-400 mb-2 ml-1 uppercase tracking-wider">
                                    Email
                                </label>
                                <input
                                    id="email"
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    required
                                    placeholder="Enter email..."
                                    class="w-full rounded-xl bg-slate-950/50 border border-slate-700/50 text-white px-4 py-3.5 text-sm transition-all placeholder:text-slate-600 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 focus:outline-none"
                                />
                            </div>

                            <div>
                                <label for="age" class="block text-xs font-semibold text-slate-400 mb-2 ml-1 uppercase tracking-wider">
                                    Age
                                </label>
                                <input
                                    id="age"
                                    type="number"
                                    name="age"
                                    value="{{ old('age') }}"
                                    required
                                    placeholder="Enter age..."
                                    class="w-full rounded-xl bg-slate-950/50 border border-slate-700/50 text-white px-4 py-3.5 text-sm transition-all placeholder:text-slate-600 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 focus:outline-none"
                                />
                            </div>
                        </div>

                        <div>
                            <label for="address" class="block text-xs font-semibold text-slate-400 mb-2 ml-1 uppercase tracking-wider">
                                Address
                            </label>
                            <textarea
                                id="address"
                                name="address"
                                rows="3"
                                required
                                placeholder="Enter address..."
                                class="w-full rounded-xl bg-slate-950/50 border border-slate-700/50 text-white px-4 py-3.5 text-sm transition-all placeholder:text-slate-600 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 focus:outline-none"
                            >{{ old('address') }}</textarea>
                        </div>

                        <div>
                            <label for="contact_number" class="block text-xs font-semibold text-slate-400 mb-2 ml-1 uppercase tracking-wider">
                                Contact Number
                            </label>
                            <input
                                id="contact_number"
                                type="text"
                                name="contact_number"
                                value="{{ old('contact_number') }}"
                                required
                                placeholder="Enter contact number..."
                                class="w-full rounded-xl bg-slate-950/50 border border-slate-700/50 text-white px-4 py-3.5 text-sm transition-all placeholder:text-slate-600 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 focus:outline-none"
                            />
                        </div>

                        <div class="mt-4 flex justify-end gap-3">
                            <a href="/users"
                               class="w-full sm:w-auto text-center bg-slate-700/60 hover:bg-slate-600/60 transition-all px-8 py-3 rounded-xl text-sm font-bold text-white">
                                View Users
                            </a>

                            <button
                                type="submit"
                                class="w-full sm:w-auto bg-indigo-600 hover:bg-indigo-500 active:scale-95 transition-all px-8 py-3 rounded-xl text-sm font-bold text-white shadow-lg shadow-indigo-500/20"
                            >
                                Register User
                            </button>
                        </div>
                    </form>
                </div>

                <div class="px-8">
                    <div class="w-full border-t border-white/5"></div>
                </div>

                <div class="px-8 py-8">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-sm font-bold text-slate-300 flex items-center">
                            <span>Registration Info</span>
                        </h2>
                        <span class="px-2.5 py-1 text-[10px] font-black bg-indigo-500/20 text-indigo-300 rounded-lg border border-indigo-500/30 uppercase">
                            User Form
                        </span>
                    </div>

                    <div class="text-center py-12 rounded-2xl bg-white/5 border border-dashed border-white/10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-slate-600 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4v16m8-8H4" />
                        </svg>
                        <p class="text-slate-500 text-sm font-medium">Fill out the form to register a new user.</p>
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
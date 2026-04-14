<x-layout title="Add Book">

    <div class="max-w-5xl mx-auto">
        <h1 class="text-4xl font-bold mb-2">Add Book</h1>
        <p class="text-white/80 mb-6">Enter the book details below.</p>

        @if ($errors->any())
            <div class="bg-red-500/20 border border-red-300 text-white rounded-2xl p-4 mb-6">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white/15 backdrop-blur-md rounded-3xl shadow-xl p-6 md:p-8">
            <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-5">
                @csrf

                <div>
                    <label class="block mb-2 font-semibold">Title</label>
                    <input type="text" name="title" value="{{ old('title') }}"
                        class="w-full rounded-xl px-4 py-3 text-black bg-white border border-white/30 outline-none">
                </div>

                <div>
                    <label class="block mb-2 font-semibold">Author</label>
                    <input type="text" name="author" value="{{ old('author') }}"
                        class="w-full rounded-xl px-4 py-3 text-black bg-white border border-white/30 outline-none">
                </div>

                <div class="md:col-span-2">
                    <label class="block mb-2 font-semibold">Description</label>
                    <textarea name="description"
                        class="w-full rounded-xl px-4 py-3 text-black bg-white border border-white/30 outline-none h-28">{{ old('description') }}</textarea>
                </div>

                <div>
                    <label class="block mb-2 font-semibold">Genre</label>
                    <input type="text" name="genre" value="{{ old('genre') }}"
                        class="w-full rounded-xl px-4 py-3 text-black bg-white border border-white/30 outline-none">
                </div>

                <div>
                    <label class="block mb-2 font-semibold">Published Year</label>
                    <input type="number" name="published_year" value="{{ old('published_year') }}"
                        class="w-full rounded-xl px-4 py-3 text-black bg-white border border-white/30 outline-none">
                </div>

                <div>
                    <label class="block mb-2 font-semibold">ISBN</label>
                    <input type="text" name="isbn" value="{{ old('isbn') }}"
                        class="w-full rounded-xl px-4 py-3 text-black bg-white border border-white/30 outline-none">
                </div>

                <div>
                    <label class="block mb-2 font-semibold">Pages</label>
                    <input type="number" name="pages" value="{{ old('pages') }}"
                        class="w-full rounded-xl px-4 py-3 text-black bg-white border border-white/30 outline-none">
                </div>

                <div>
                    <label class="block mb-2 font-semibold">Language</label>
                    <input type="text" name="language" value="{{ old('language') }}"
                        class="w-full rounded-xl px-4 py-3 text-black bg-white border border-white/30 outline-none">
                </div>

                <div>
                    <label class="block mb-2 font-semibold">Publisher</label>
                    <input type="text" name="publisher" value="{{ old('publisher') }}"
                        class="w-full rounded-xl px-4 py-3 text-black bg-white border border-white/30 outline-none">
                </div>

                <div>
                    <label class="block mb-2 font-semibold">Price</label>
                    <input type="number" step="0.01" name="price" value="{{ old('price') }}"
                        class="w-full rounded-xl px-4 py-3 text-black bg-white border border-white/30 outline-none">
                </div>

                <div class="md:col-span-2">
                    <label class="inline-flex items-center gap-3 font-semibold">
                        <input type="checkbox" name="is_available" value="1" {{ old('is_available') ? 'checked' : '' }}
                            class="w-5 h-5">
                        Available
                    </label>
                </div>

                <div class="md:col-span-2 flex flex-wrap gap-3 pt-2">
                    <button type="submit"
                        class="bg-yellow-400 hover:bg-yellow-300 text-black font-bold px-6 py-3 rounded-xl shadow">
                        Save Book
                    </button>

                    <a href="{{ route('books.index') }}"
                        class="bg-white/20 hover:bg-white/30 text-white font-bold px-6 py-3 rounded-xl">
                        Back to Book List
                    </a>
                </div>
            </form>
        </div>
    </div>

</x-layout>
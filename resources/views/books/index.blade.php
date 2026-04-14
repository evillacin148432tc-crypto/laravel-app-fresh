<x-layout title="Book List">

    <div class="max-w-6xl mx-auto">
        <h1 class="text-4xl font-bold mb-2">Book List</h1>
        <p class="text-white/80 mb-6">Display books in a table with live search, filter, and actions.</p>

        @if(session('success'))
            <div class="bg-green-500/20 border border-green-300 text-white rounded-2xl p-4 mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white/15 backdrop-blur-md rounded-3xl shadow-xl p-6">

            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
                <div class="flex flex-col md:flex-row gap-3 w-full md:w-auto">
                    <input
                        type="text"
                        id="search"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search by title or author"
                        class="rounded-xl px-4 py-3 text-black bg-white border border-white/30 outline-none w-full md:w-72"
                    >

                    <select
                        id="genre"
                        name="genre"
                        class="rounded-xl px-4 py-3 text-black bg-white border border-white/30 outline-none w-full md:w-52"
                    >
                        <option value="">All Genres</option>
                        <option value="Fiction">Fiction</option>
                        <option value="Sci-Fi">Sci-Fi</option>
                        <option value="Drama">Drama</option>
                        <option value="Romance">Romance</option>
                        <option value="Fantasy">Fantasy</option>
                    </select>
                </div>

                <a
                    href="{{ route('books.create') }}"
                    class="bg-yellow-400 hover:bg-yellow-300 text-black font-bold px-5 py-3 rounded-xl text-center"
                >
                    + Add Book
                </a>
            </div>

            <div id="books-table">
                @include('books.partials.table', ['books' => $books])
            </div>
        </div>
    </div>

    <script>
        const searchInput = document.getElementById('search');
        const genreSelect = document.getElementById('genre');
        const booksTable = document.getElementById('books-table');

        let timeout = null;

        function fetchBooks() {
            const search = searchInput.value;
            const genre = genreSelect.value;

            fetch(`{{ route('books.index') }}?search=${encodeURIComponent(search)}&genre=${encodeURIComponent(genre)}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.text())
            .then(html => {
                booksTable.innerHTML = html;
            })
            .catch(error => {
                console.error('Live search error:', error);
            });
        }

        searchInput.addEventListener('keyup', function () {
            clearTimeout(timeout);
            timeout = setTimeout(fetchBooks, 300);
        });

        genreSelect.addEventListener('change', fetchBooks);
    </script>

</x-layout>
<div class="overflow-x-auto">
    <table class="w-full text-left text-white">
        <thead>
            <tr class="border-b border-white/20">
                <th class="p-4">Title</th>
                <th class="p-4">Author</th>
                <th class="p-4">Genre</th>
                <th class="p-4">Price</th>
                <th class="p-4">Availability</th>
                <th class="p-4">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($books as $book)
                <tr class="border-b border-white/10">
                    <td class="p-4">{{ $book->title }}</td>
                    <td class="p-4">{{ $book->author }}</td>
                    <td class="p-4">{{ $book->genre }}</td>
                    <td class="p-4">₱{{ number_format($book->price, 2) }}</td>
                    <td class="p-4">
                        <span class="px-3 py-1 rounded-full text-sm bg-white/20">
                            {{ $book->is_available ? 'Available' : 'Not Available' }}
                        </span>
                    </td>
                    <td class="p-4">
                        <div class="flex flex-wrap gap-2">
                            <a href="{{ route('books.show', $book->id) }}"
                               class="bg-slate-500 hover:bg-slate-400 text-white px-4 py-2 rounded-lg text-sm font-semibold">
                                View
                            </a>

                            <a href="{{ route('books.edit', $book->id) }}"
                               class="bg-green-600 hover:bg-green-500 text-white px-4 py-2 rounded-lg text-sm font-semibold">
                                Edit
                            </a>

                            <form action="{{ route('books.delete', $book->id) }}" method="POST">
                                @csrf
                                <button type="submit"
                                        onclick="return confirm('Delete this book?')"
                                        class="bg-red-600 hover:bg-red-500 text-white px-4 py-2 rounded-lg text-sm font-semibold">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="p-6 text-center text-white/80">
                        No books found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
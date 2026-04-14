<x-layout title="View Book">

    <div class="max-w-4xl mx-auto">
        <h1 class="text-4xl font-bold mb-2">View Book</h1>
        <p class="text-white/80 mb-6">Book details information.</p>

        <div class="bg-white/15 backdrop-blur-md rounded-3xl shadow-xl p-6 space-y-4">
            <div><strong>Title:</strong> {{ $book->title }}</div>
            <div><strong>Author:</strong> {{ $book->author }}</div>
            <div><strong>Description:</strong> {{ $book->description }}</div>
            <div><strong>Genre:</strong> {{ $book->genre }}</div>
            <div><strong>Published Year:</strong> {{ $book->published_year }}</div>
            <div><strong>ISBN:</strong> {{ $book->isbn }}</div>
            <div><strong>Pages:</strong> {{ $book->pages }}</div>
            <div><strong>Language:</strong> {{ $book->language }}</div>
            <div><strong>Publisher:</strong> {{ $book->publisher }}</div>
            <div><strong>Price:</strong> ₱{{ number_format($book->price, 2) }}</div>
            <div><strong>Availability:</strong> {{ $book->is_available ? 'Available' : 'Not Available' }}</div>

            <div class="pt-4">
                <a href="{{ route('books.index') }}" class="bg-blue-600 hover:bg-blue-500 text-white px-5 py-3 rounded-xl font-bold">
                    Back to Book List
                </a>
            </div>
        </div>
    </div>

</x-layout>
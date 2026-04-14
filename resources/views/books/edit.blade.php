<h1>Edit Book</h1>

@foreach($errors->all() as $error)
    <p style="color:red;">{{ $error }}</p>
@endforeach

<form action="/books/update/{{ $book->id }}" method="POST">
    @csrf
    <input type="text" name="title" value="{{ $book->title }}"><br><br>
    <input type="text" name="author" value="{{ $book->author }}"><br><br>
    <textarea name="description">{{ $book->description }}</textarea><br><br>
    <input type="text" name="genre" value="{{ $book->genre }}"><br><br>
    <input type="number" name="published_year" value="{{ $book->published_year }}"><br><br>
    <input type="text" name="isbn" value="{{ $book->isbn }}"><br><br>
    <input type="number" name="pages" value="{{ $book->pages }}"><br><br>
    <input type="text" name="language" value="{{ $book->language }}"><br><br>
    <input type="text" name="publisher" value="{{ $book->publisher }}"><br><br>
    <input type="number" step="0.01" name="price" value="{{ $book->price }}"><br><br>

    <label>
        <input type="checkbox" name="is_available" {{ $book->is_available ? 'checked' : '' }}>
        Available
    </label><br><br>

    <button type="submit">Update Book</button>
</form>

<br>
<a href="/books">Back to Book List</a>
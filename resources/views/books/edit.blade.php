@extends("layouts.books")

@section("content")

<!-- indietro -->
 <a href="{{ route("books.index") }}" class="position-absolute top-0 start-0 m-4 back-icon">
    <i class="bi bi-arrow-left-circle-fill fs-2"></i>
 </a>

 <h1 class="text-center my-3">Modifica il libro</h1>
 <!-- form -->
  <div class="container d-flex justify-content-center my-4">
    <form action="{{ route("books.update", $book) }}" method="POST" class="work-form w-75" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $book->title }}" required>
        </div>

        <div class="form-group  mt-3">
            <label for="author">Autore</label>
            <input type="text" name="author" id="author" class="form-control" value="{{ $book->author }}" required>
        </div>

        <div class="form-group  mt-3">
            <label for="image">Immagine</label>
            <input type="file" name="image" id="image" class="form-control" required>

             @if ($book->image)
            <div class="my-4">
                <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}" class="img-fluid w-50">
            </div>
            @endif
        </div>

        <div class="form-group  mt-3">
            <label for="year">Anno</label>
            <input type="text" name="year" id="year" class="form-control" value="{{ $book->year }}" required>
        </div>

        <div class="form-group mt-3 d-flex flex-column">
            <label for="genre_id">Genere</label>
            <select name="genre_id" id="genre_id">
            @foreach($genres as $genre)
            <option value="{{ $genre->id }}" {{ $book->genre_id == $genre->id ? 'selected' : '' }}>{{ $genre->name }}</option>
            @endforeach
            </select>
        </div>

        <div class="form-group  mt-3">
            <label for="content">Sinossi</label>
            <textarea name="content" id="content" class="form-control" rows="5" required>{{ $book->content }}</textarea>
        </div>

        <div class="form-group mt-3 d-flex flex-wrap">
            @foreach($types as $type)
            <div class="tag me-2">
                <input type="checkbox" name="types[]" value="{{ $type->id }}" id="type-{{ $type->id }}" {{ $book->types->contains($type->id) ? 'checked' : ''}}>
                <label for="type-{{ $type->id }}">{{ $type->name }}</label>
            </div>
            @endforeach
        </div>

        <div class="form-group  mt-3">
            <label for="audio">Audio</label>
            <input type="file" name="audio" id="audio" class="form-control" required>
        </div>

        <div class="text-center mt-3">
            <button type="submiit" class="btn btn-warning">Modifica Libro</button>
        </div>
    </form>

  </div>
@endsection
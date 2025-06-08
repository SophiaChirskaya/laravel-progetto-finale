@extends("layouts.books")

@section("title")

@section("content")

<!-- indietro -->
 <a href="{{ route("books.index") }}" class="position-absolute top-0 start-0 m-4 back-icon">
    <i class="bi bi-arrow-left-circle-fill fs-2"></i>
 </a>

 <h1 class="text-center my-3">Aggiungi un libro</h1>
 <!-- form -->
  <div class="container d-flex justify-content-center my-4">
    <form action="{{ route("books.store") }}" method="POST" class="work-form w-75" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="form-group  mt-3">
            <label for="author">Autore</label>
            <input type="text" name="author" id="author" class="form-control" required>
        </div>

        <div class="form-group  mt-3">
            <label for="image">Immagine</label>
            <input type="file" name="image" id="image" class="form-control" required>
        </div>

        <div class="form-group  mt-3">
            <label for="year">Anno</label>
            <input type="text" name="year" id="year" class="form-control" required>
        </div>

        <div class="form-group  mt-3">
            <label for="content">Sinossi</label>
            <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
        </div>

        <div class="form-group  mt-3">
            <label for="audio">Audio</label>
            <input type="file" name="audio" id="audio" class="form-control" required>
        </div>

        <div class="text-center mt-3">
            <button type="submiit" class="btn btn-warning">Aggiungi Libro</button>
        </div>
    </form>

  </div>
@endsection
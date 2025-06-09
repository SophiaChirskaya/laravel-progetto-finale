@extends("layouts.books")
@section("content")

<div class="container my-5 d-flex justify-content-center">

<!-- indietro -->
 <a href="{{ route("books.index") }}" class="position-absolute top-0 start-0 m-4 back-icon">
    <i class="bi bi-arrow-left-circle-fill fs-2"></i>
 </a>

 <!-- card -->
  <div class="card shadow-lg p-4 text-center w-75 work-details">
    <h2 class="fw-bold">{{ $book->title }}</h2>
    <h5 class="fst-italic">{{ $book->author }}</h5>

    <!-- image -->
     @if ($book->image)
     <div class="my-4">
        <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}" class="img-fluid w-50">
     </div>
     @endif

     <p class="fs-4">{{ $book->year }}</p>
     <p class="fs-4">{{ $book->genre->name }}</p>
     <hr>
     <p class="lead">{{ $book->content }}</p>
     <hr class="my-2">

     <div class="d-flex justify-content-center gap-3 mt-4 flex-wrap">

     <!-- modifica -->
      <a href="{{ route("books.edit", $book) }}" class="btn btn-outline-warning">Modifica</a>

      <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Elimina</button>

     </div>

    <div class="modal" id="exampleModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Elimina Libro</h5>
        <button type="button" class="btn-close modal-btn" data-bs-dismiss="modal" aria-label="Chiudi"></button>
      </div>
      <div class="modal-body">
        <p>Sei sicuro di eliminare il libro?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-modal-secondary modal-btn" data-bs-dismiss="modal">Annulla</button>
        <form action="{{ route("books.destroy", $book) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" class="btn btn-modal-danger modal-btn" value="Elimina definitivamente">
        </form>
      </div>
    </div>
  </div>
</div>


  </div>

</div>
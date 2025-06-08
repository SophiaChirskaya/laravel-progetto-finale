@extends("layouts.books")

@section("title", "tutti i libri")

@section("content")


<!-- container -->
 <div class="container">
    <div class="section my-4 text-center">
        <h1 class="my-4">Libri</h1>
        <a class="btn btn-outline-primary" href="{{ route("books.create") }}">Aggiungi</a>
    </div>
    <!-- qui devo aggiungere il form di ricerca -->

 </div>

 <div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4 justify-content-center">
        @if ($books->isEmpty() && request('search'))
        <div class="col-12 text-center">
            <p class="text-muted fs-5">
                Nessun libro o autore corrispondente alla ricerca.
            </p>
            <a href="{{ route("books.index") }}" class="btn btn-warning mt-1 mb-4">Mostra tutti i libri</a>
        </div>
        @endif

        @foreach ($books as $book)
        <div class="col-md-4 mb-4">
            <x-card :book="$book" />
        </div>
        @endforeach
    </div>

 </div>




@endsection
@extends("layouts.books")

@section("title")

@section("content")

<!-- hero img -->

<div class="hero-img position-relative text-blue text-center">
    <img src="{{ asset('hero.jpg') }}" alt="hero" class="img-fluid w-100 hero-banner">
    <div class="hero-text position-absolute top-50 start-50 translate-middle">
        <h1>"Il libro è un sogno che tieni tra le mani"</h1>
        <h5>Neil Gaiman</h5>
        <p>In questa sezione puoi esplorare il nostro catalogo di libri, sfogliando tra titoli di ogni genere. Grazie ai filtri disponibili, puoi affinare la ricerca per autore, genere, anno di pubblicazione e altri criteri utili. Una volta individuato il libro di tuo interesse, potrai accedere alla sua scheda dettagliata per scoprire le edizioni disponibili. Ogni libro, infatti, può essere consultato in diverse versioni: paperbook, audiolibro, ebook e Braille, per garantire un’esperienza di lettura accessibile a tutti.</p>
    </div>
</div>


<!-- container -->
 <div class="container">
    <div class="section my-4 text-center">
        <h1 class="my-4">CATALOGO</h1>
        <a class="btn btn-outline-primary" href="{{ route("books.create") }}">Aggiungi</a>
    </div>
    <!-- form di ricerca -->
     <div class="container my-4 text-center">
        <form id="searchForm"  action="{{ route("books.index") }}" method="GET" class="d-flex justify-content-center">
            <input type="text" id="searchInput" name="search" class="form-control w-25 me-2" placeholder="Cerca libro/autore" value="{{ request('search') }}">
            <button type="submit" class="btn btn-warning">Cerca</button>
        </form>
        <!-- messaggio di errore -->
         <div id="searchError" class="text-danger text-center mt-2" style="display: none;">
            Inserisci un titolo/un atore
         </div>
     </div>
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

    <!-- bottone per tornare ad index anche se ci sono i resultati -->
     @if (request('search') && !$books->isEmpty())
     <div class="text-center mt-4">
        <a href="{{ route("books.index") }}" class="btn btn-warning mb-3">Mostra tutti i libri</a>
     </div>
     @endif
 </div>

 <!-- icon -->
  <button class="scroll-to-top" onclick="scrollToTop()" aria-label="Torna su">
    <i class="bi bi-arrow-up-circle-fill fs-2"></i>
  </button>

  <!-- script icon -->
   <script>
    function scrollTiTop() {
        window.scrollTo({
            top: 0;
            behavior: "smooth"
        });
    }
   </script>

   <script>
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.getElementById('searchForm');
        const input = document.getElementById('searchInput');
        const error = document.getElementById('searchError');

        form.addEventListener('submit', function (e) {
            if (input.value.trim() === "") {
                e.preventDefault();
                error.style.display = 'block';
            } else {
                error.style.display = 'none';
            }
        });

        input.addEventListener('input', function () {
            if (input.value.trim() !== "") {
                error.style.display = 'none';
            }
        });
    });
   </script>

@endsection
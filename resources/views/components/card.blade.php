@props(['book'])

<div class="card h-100 shadow-sm">
    @if ($book->image)
    <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}" class="card-img-top card-image">
    @else
    <img src="{{ asset('images/default.jpg') }}" alt="Immagine non disponibile" class="card-img-top card-image">
    @endif
    <div class="card-body text-center">
        <h5 class="card-title">{{ $book->title }}</h5>
        <p class="card-text"><strong>Autore: </strong>{{ $book->author }}</p>
        <p class="card-text"><strong>Anno: </strong>{{ $book->year }}</p>

    </div>

</div>
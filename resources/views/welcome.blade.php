@extends('layouts.app')
@section('content')

<div class="jumbotron p-5 mb-4 bg-light">
    <div class="container py-5">
        <div class="row allign-items-center">
            <!-- testo -->
             <div class="col-md-6 mb-4 mb-md-0">
                <h1 class="display-4 fw-bold mb-3">
                    L'hybrary - la tua libreria ibrida
                </h1>

                <p class="lead">
                    La nostra libreria ibrida nasce dalla volontà di promuovere l’inclusione e abbattere le barriere che limitano l’accesso alla cultura. Crediamo che la letteratura debba essere un bene comune, fruibile da tutti, indipendentemente dalle abilità personali. Per questo offriamo non solo libri cartacei ed eBook, ma anche audiolibri e testi in formato Braille, così da garantire un’esperienza di lettura accessibile e coinvolgente per ogni lettore. La nostra missione è dare voce a una lettura che accoglie, include e unisce.    
                </p>
            </div>

            <!-- Immagine a dx -->
             <div class="col-md-6 text-center">
                <img src="{{ asset('books.jpg') }}" alt="books" class="img-fluid rounded shadow-sm" style="max-height: 300px;" >
             </div>
        </div>

        <!-- Card sempre visibili -->
         <div class="row justify-content-center text-center g-4" >
            <div class="col-md-4">
                <div class="p-4 bg-white rounded shadow-sm h-100 card-animated">
                    <h5 class="mb-3" style="color:blue"><i class="bi bi-collection me-2"></i>Area Amministrazione</h5>
                    <p>Gestisci e modifica i progetti in modo semplice e intuitivo</p>
                    <a class="btn btn-warning" href="{{ route('books.index') }}">Accedi</a>
                </div>
            </div>

            @auth
            @if (Auth::user()->is_admin)
            <div class="col-md-4" >
                <div class="p-4 bg-white rounded shadow-sm h-100 card-animated">
                    <h5 class="mb-3" style="color: blue;"><i class="bi bi-person-lock me-2"></i>Pannello Admin</h5>
                    <p>Accedi agli strumenti i gestione avanzata del catalogo</p>
                    <a class="btn btn-outline-warning" href="{{ route('books.index') }}">Vai al pannello</a>
                </div>
            </div>
            @endif
            @endauth

            <div class="col-md-4">
                <div class="p-4 bg-white rounded shadow-sm h-100 card-animated">
                    <h5 class="mb-3" style="color: blue;"><i class="bi bi-easel me-2"></i>Area utenti</h5>
                    <p>Esplora la tua libreria ibrida in un' esperienza moderna e coinvolgente</p>
                    <a href="http://localhost:5174" target="_blank" class="btn btn-warning">Vai alla pagina</a>
                </div>
            </div>
         </div>
    </div>
</div>

@endsection
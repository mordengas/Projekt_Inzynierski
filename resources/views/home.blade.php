@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <h3 class="text-primary">Top 5 gier</h3>
            <ul class="list-group">
                <li class="list-group-item bg-secondary">
                    <div class="d-flex justify-content-between">
                        <div class="text-secondary">Gra 1</div>
                        <div>
                            <input type="file" accept="image/*" class="form-control">
                        </div>
                    </div>
                </li>
                <li class="list-group-item bg-secondary">
                    <div class="d-flex justify-content-between">
                        <div class="text-secondary">Gra 2</div>
                        <div>
                            <input type="file" accept="image/*" class="form-control">
                        </div>
                    </div>
                </li>
                <li class="list-group-item bg-secondary">
                    <div class="d-flex justify-content-between">
                        <div class="text-secondary">Gra 3</div>
                        <div>
                            <input type="file" accept="image/*" class="form-control">
                        </div>
                    </div>
                </li>
                <li class="list-group-item bg-secondary">
                    <div class="d-flex justify-content-between">
                        <div class="text-secondary">Gra 4</div>
                        <div>
                            <input type="file" accept="image/*" class="form-control">
                        </div>
                    </div>
                </li>
                <li class="list-group-item bg-secondary">
                    <div class="d-flex justify-content-between">
                        <div class="text-secondary">Gra 5</div>
                        <div>
                            <input type="file" accept="image/*" class="form-control">
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="jumbotron bg-primary">
                @auth
                    <h1 class="display-4 text-white">Witaj, {{ Auth::user()->name }}!</h1>
                @else
                    <h1 class="display-4 text-white">Witaj w Mojej Aplikacji Laravel!</h1>
                @endauth
                <p class="lead text-white">To jest przykładowa strona główna.</p>
                <hr class="my-4">
                <p class="text-white">Możesz zacząć od nawigacji powyżej i sprawdzić dostępne artykuły.</p>
            </div>

            <h2 class="text-primary">Ostatnie Artykuły</h2>
            <ul>
                {{-- @foreach($articles as $article)
                    <li>{{ $article->title }}</li>
                @endforeach --}}
            </ul>
        </div>
    </div>
</div>
@endsection

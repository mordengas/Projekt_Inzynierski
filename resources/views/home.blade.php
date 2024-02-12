<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/> --}}
    <style>
    </style>
</head>
<body>

@include('shared.navbar')

<div class="container mt-4">
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>
</html>

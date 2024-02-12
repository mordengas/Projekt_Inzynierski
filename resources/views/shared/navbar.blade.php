<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/">Play Game</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav"> <!-- Add ml-auto class to align items to the right -->
            <li class="nav-item active">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/articles">TOP Games</a>
            </li>
        </ul>

        <ul class="navbar-nav m-auto">
            <li class="nav-item">
                <form class="d-flex m-auto" action="{{ route('search.store') }}" method="POST">
                    @csrf
                    <input class="form-control me-2" name="title" type="Search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>
            </li>
        </ul>


        <ul class="navbar-nav ml-auto"> <!-- Add ml-auto class to align items to the left -->

            @auth
                <li class="nav-item">
                    <a class="nav-link" href="/profile">Profile</a>
                </li>
                <li class="nav-item">
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link">Logout</button>
                    </form>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register">Register</a>
                </li>
            @endauth
        </ul>

    </div>
</nav>

    <form action="{{route('recommend.storeweight')}}" method="POST" enctype="multipart/form-data" id="weight">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="single_player">Single Player:</label>
            <select class="form-select" aria-label="Default select example" id="single_player" name="single_player">
                <script>
                    for (var i = 1; i <= 10; i++) {
                        document.write('<option value="' + i + '">' + i + '</option>');
                    }
                </script>
            </select>
        </div>

        <div class="form-group">
            <label for="multi_player">Multi Player:</label>
            <select class="form-select" aria-label="Default select example" id="multi_player" name="multi_player">
                <script>
                    for (var i = 1; i <= 10; i++) {
                        document.write('<option value="' + i + '">' + i + '</option>');
                    }
                </script>
            </select>
        </div>

        <div class="form-group">
            <label for="co_op">CO-OP:</label>
            <select class="form-select" aria-label="Default select example" id="co_op" name="co_op">
                <script>
                    for (var i = 1; i <= 10; i++) {
                        document.write('<option value="' + i + '">' + i + '</option>');
                    }
                </script>
            </select>
        </div>

        <div class="form-group">
            <label for="split_screen">Split Screen:</label>
            <select class="form-select" aria-label="Default select example" id="split_screen" name="split_screen">
                <script>
                    for (var i = 1; i <= 10; i++) {
                        document.write('<option value="' + i + '">' + i + '</option>');
                    }
                </script>
            </select>
        </div>

        <div class="form-group">
            <label for="mmo">MMO:</label>
            <select class="form-select" aria-label="Default select example" id="mmo" name="mmo">
                <script>
                    for (var i = 1; i <= 10; i++) {
                        document.write('<option value="' + i + '">' + i + '</option>');
                    }
                </script>
            </select>
        </div>

        <div class="form-group">
            <label for="battle_royale">Battle Royale:</label>
            <select class="form-select" aria-label="Default select example" id="battle_royale" name="battle_royale">
                <script>
                    for (var i = 1; i <= 10; i++) {
                        document.write('<option value="' + i + '">' + i + '</option>');
                    }
                </script>
            </select>
        {{-- <label for="tryb_gry">Wybierz tryb gry:</label>
        <select class="form-select" aria-label="Default select example" id = "tryb_gry" name="tryb_gry">
            <option value="Single Player">Single Player</option>
            <option value="Multiplayer">Multiplayer</option>
            <option value="Co-operative">Co-Op</option>
            <option value="Split screen">Split Screen</option>
            <option value="Massively Multiplayer Online (MMO)">MMO</option>
            <option value="Battle Royale">Battle Royale</option>
        </select>
        <br>
        <label for="gatunek">Wybierz gatunek:</label>
        <select class="form-select" aria-label="Default select example" id = "gatunek" name="gatunek">
            <option value="Fighting">Fighting</option>
            <option value="Shooter">Shooter</option>
            <option value="Music">Music</option>
            <option value="Platform">Platforms</option>
            <option value="Puzzle">Puzzle</option>
            <option value="Racing">Racing</option>
            <option value="Real Time Strategy (RTS)">RTS</option>
            <option value="Role-playing (RPG)">RPG</option>
            <option value="Simulator">Simulator</option>
            <option value="Sport">Sport</option>
        </select>
        <br> --}}
            <label for="platforma">Wybierz Platformę:</label>
            <select class="form-select" aria-label="Default select example" id="platforma" name="platforma">
                <option value=6>PC</option>
                <option value=169>Xbox Series X</option>
                <option value=167>PS 5</option>
                <option value=49>Xbox One</option>
                <option value=48>PS 4</option>
            </select>
        </div>

        <div class="form-group">
            <label for="rok_wydania">Wybierz najwczesniejszy rok wydania:</label>
            <input type="number" placeholder="YYYY" min="1995" max="2023" id="rok_wydania" name="rok_wydania">
        </div>

        <button class="btn btn-primary btn-lg" type="submit" form="weight">Prześlij</button>
    </form>

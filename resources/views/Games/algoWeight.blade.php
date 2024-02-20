    <form action="{{route('recommend.storeweight')}}" method="POST" enctype="multipart/form-data" id="weight">
        {{ csrf_field() }}
        <div class="row">
        <div class="col-md-6">
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

        </div>

        <div class="col-md-6">
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
            </div>
        </div>
    </div>
        <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="platforma">Select Platform:</label>
                <select class="form-select" aria-label="Default select example" id="platforma" name="platforma">
                    <option value=6>PC</option>
                    <option value=169>Xbox Series X</option>
                    <option value=167>PS 5</option>
                    <option value=49>Xbox One</option>
                    <option value=48>PS 4</option>
                    <option value=130>Nintendo Switch</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="rok_wydania">Select earliest release year:</label>
                <select class="form-select" aria-label="Default select example" id="rok_wydania" name="rok_wydania">
                    <script>
                        for (var i = 1990; i <= 2024; i++) {
                            document.write('<option value="' + i + '">' + i + '</option>');
                        }
                    </script>
                </select>
            </div>
        </div>
        </div>
        <br>
        <div class="d-flex flex-row-reverse">
            <div class="col-md-1.5">
                <button class="btn btn-primary btn-lg" type="submit" form="weight">See Games</button>
            </div>
        </div>
    </form>

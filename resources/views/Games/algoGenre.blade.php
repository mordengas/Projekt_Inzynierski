
    <form action="{{route('recommend.storegenre')}}" method="POST" enctype="multipart/form-data" id="algo">
        {{ csrf_field() }}

        <div class="checkbox-group">

            <div class="row">
                <div class="col-md-4">
                    <input type="checkbox" id="point-and-click" name="point-and-click" value=1>
                    <label for="point-and-click">Point and Click</label><br>

                    <input type="checkbox" id="fighting" name="fighting" value=1>
                    <label for="fighting">Fighting</label><br>

                    <input type="checkbox" id="shooter" name="shooter" value=1>
                    <label for="shooter">Shooter</label><br>

                    <input type="checkbox" id="music" name="music" value=1>
                    <label for="music">Music</label><br>

                    <input type="checkbox" id="platform" name="platform" value=1>
                    <label for="platform">Platform</label><br>

                    <input type="checkbox" id="puzzle" name="puzzle" value=1>
                    <label for="puzzle">Puzzle</label><br>

                    <input type="checkbox" id="racing" name="racing" value=1>
                    <label for="racing">Racing</label><br>

                    <input type="checkbox" id="rts" name="rts" value=1>
                    <label for="rts">Real Time Strategy (RTS)</label><br>

                </div>

                <div class="col-md-4">

                    <input type="checkbox" id="rpg" name="rpg" value=1>
                    <label for="rpg">Role-playing (RPG)</label><br>

                    <input type="checkbox" id="simulator" name="simulator" value=1>
                    <label for="simulator">Simulator</label><br>

                    <input type="checkbox" id="sport" name="sport" value=1>
                    <label for="sport">Sport</label><br>

                    <input type="checkbox" id="strategy" name="strategy" value=1>
                    <label for="strategy">Strategy</label><br>

                    <input type="checkbox" id="tbs" name="tbs" value=1>
                    <label for="tbs">Turn-based strategy (TBS)</label><br>

                    <input type="checkbox" id="tactical" name="tactical" value=1>
                    <label for="tactical">Tactical</label><br>

                    <input type="checkbox" id="hack-and-slash" name="hack-and-slash" value=1>
                    <label for="hack-and-slash">Hack and slash/Beat 'em up</label><br>

                    <input type="checkbox" id="quiz" name="quiz" value=1>
                    <label for="quiz">Quiz/Trivia</label><br>
                </div>

                <div class="col-md-4">

                    <input type="checkbox" id="pinball" name="pinball" value=1>
                    <label for="pinball">Pinball</label><br>

                    <input type="checkbox" id="adventure" name="adventure" value=1>
                    <label for="adventure">Adventure</label><br>

                    <input type="checkbox" id="indie" name="indie" value=1>
                    <label for="indie">Indie</label><br>

                    <input type="checkbox" id="arcade" name="arcade" value=1>
                    <label for="arcade">Arcade</label><br>

                    <input type="checkbox" id="visual-novel" name="visual-novel" value=1>
                    <label for="visual-novel">Visual Novel</label><br>

                    <input type="checkbox" id="card-board" name="card-board" value=1>
                    <label for="card-board">Card & Board Game</label><br>

                    <input type="checkbox" id="moba" name="moba" value=1>
                    <label for="moba">MOBA</label><br>
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
                    <button class="btn btn-primary btn-lg" type="submit" form="algo">See Games</button>
                </div>
            </div>
    </form>

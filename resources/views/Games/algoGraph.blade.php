<div class="container">


    <form action="{{route('recommend.storegraph')}}" method="POST" enctype="multipart/form-data" id="graph">
        {{ csrf_field() }}
        <div class="checkbox-group-graph">

            <div class="row">
                <div class="col-md-4">
                    <input class="checkbox-graph" type="checkbox" id="point-and-click" name="genres[]" value="Point-and-click">
                    <label for="point-and-click">Point and Click</label><br>

                    <input class="checkbox-graph" type="checkbox" id="fighting" name="genres[]" value="Fighting">
                    <label for="fighting">Fighting</label><br>

                    <input class="checkbox-graph" type="checkbox" id="shooter" name="genres[]" value="Shooter">
                    <label for="shooter">Shooter</label><br>

                    <input class="checkbox-graph" type="checkbox" id="music" name="genres[]" value="Music">
                    <label for="music">Music</label><br>

                    <input class="checkbox-graph" type="checkbox" id="platform" name="genres[]" value="Platform">
                    <label for="platform">Platform</label><br>

                    <input class="checkbox-graph" type="checkbox" id="puzzle" name="genres[]" value="Puzzle">
                    <label for="puzzle">Puzzle</label><br>

                    <input class="checkbox-graph" type="checkbox" id="racing" name="genres[]" value="Racing">
                    <label for="racing">Racing</label><br>

                    <input class="checkbox-graph" type="checkbox" id="rts" name="genres[]" value="Real Time Strategy (RTS)">
                    <label for="rts">Real Time Strategy (RTS)</label><br>

                </div>

                <div class="col-md-4">

                    <input class="checkbox-graph" type="checkbox" id="rpg" name="genres[]" value="Role-playing (RPG)">
                    <label for="rpg">Role-playing (RPG)</label><br>

                    <input class="checkbox-graph" type="checkbox" id="simulator" name="genres[]" value="Simulator">
                    <label for="simulator">Simulator</label><br>

                    <input class="checkbox-graph" type="checkbox" id="sport" name="genres[]" value="Sport">
                    <label for="sport">Sport</label><br>

                    <input class="checkbox-graph" type="checkbox" id="strategy" name="genres[]" value="Strategy">
                    <label for="strategy">Strategy</label><br>

                    <input class="checkbox-graph" type="checkbox" id="tbs" name="genres[]" value="Turn-based strategy (TBS)">
                    <label for="tbs">Turn-based strategy (TBS)</label><br>

                    <input class="checkbox-graph" type="checkbox" id="tactical" name="genres[]" value="Tactical">
                    <label for="tactical">Tactical</label><br>

                    <input class="checkbox-graph" type="checkbox" id="hack-and-slash" name="genres[]" value="Hack and slash/Beat 'em up">
                    <label for="hack-and-slash">Hack and slash/Beat 'em up</label><br>

                    <input class="checkbox-graph" type="checkbox" id="quiz" name="genres[]" value="Quiz/Trivia">
                    <label for="quiz">Quiz/Trivia</label><br>
                </div>

                <div class="col-md-4">

                    <input class="checkbox-graph" type="checkbox" id="pinball" name="genres[]" value="Pinball">
                    <label for="pinball">Pinball</label><br>

                    <input class="checkbox-graph" type="checkbox" id="adventure" name="genres[]" value="Adventure">
                    <label for="adventure">Adventure</label><br>

                    <input class="checkbox-graph" type="checkbox" id="indie" name="genres[]" value="Indie">
                    <label for="indie">Indie</label><br>

                    <input class="checkbox-graph" type="checkbox" id="arcade" name="genres[]" value="Arcade">
                    <label for="arcade">Arcade</label><br>

                    <input class="checkbox-graph" type="checkbox" id="visual-novel" name="genres[]" value="Visual Novel">
                    <label for="visual-novel">Visual Novel</label><br>

                    <input class="checkbox-graph" type="checkbox" id="card-board" name="genres[]" value="Card & Board Game">
                    <label for="card-board">Card & Board Game</label><br>

                    <input class="checkbox-graph" type="checkbox" id="moba" name="genres[]" value="MOBA">
                    <label for="moba">MOBA</label><br>
                </div>
            </div>
        </div>
        <div class="d-flex flex-row-reverse">
            <div class="form-group">
                <label for="range">Range:</label>
                <input type="range" class="form-control-range" id="range" name="range" min="1" max="3" oninput="updateRangeIndicator(this.value)">
                <span id="rangeIndicator">2</span>
            </div>
        </div>
        <script>
            function updateRangeIndicator(value) {
                document.getElementById("rangeIndicator").textContent = value;
            }
        </script>
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
                    <button class="btn btn-primary btn-lg" type="submit" form="graph">See Games</button>
                </div>
            </div>
    </form>
</div>

<script>
    const checkboxes = document.querySelectorAll('input[type="checkbox"].checkbox-graph');
    let checkedCount = 0;

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            if (this.checked) {
                checkedCount++;
                if (checkedCount > 3) {
                    this.checked = false;
                    checkedCount--;
                }
            } else {
                checkedCount--;
            }
        });
    });
</script>

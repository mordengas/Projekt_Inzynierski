<div class="container">


    <form action="{{route('recommend.storegraph')}}" method="POST" enctype="multipart/form-data" id="graph">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="genre">Genre:</label>
            <select class="form-control" id="genre" name="genre">
                <option value="1">Genre 1</option>
                <option value="2">Genre 2</option>
                <option value="3">Genre 3</option>
            </select>
        </div>
        <div class="form-group">
            <label for="range">Range:</label>
            <input type="range" class="form-control-range" id="range" name="range" min="1" max="3">
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

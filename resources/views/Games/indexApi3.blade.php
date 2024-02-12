
    <div class="container">
        <form action="{{}}" method="POST">
            @csrf

            <div class="form-group">
                <label for="genres">Wybierz gatunki gier (od 1 do 3):</label>
                <select name="genres[]" id="genres" class="form-control" multiple>
                    <option value="action">Akcja</option>
                    <option value="adventure">Przygodowa</option>
                    <option value="rpg">RPG</option>
                    <option value="strategy">Strategia</option>
                    <option value="sports">Sportowa</option>
                </select>
            </div>

            <div class="form-group">
                <label for="range">Wybierz zakres (od 1 do 3):</label>
                <select name="range" id="range" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Filtruj</button>
        </form>

        {{-- @if(isset($selectedGenre))
            <div class="selected-genre">
                <h3>Wybrany gatunek:</h3>
                <p>{{ $selectedGenre }}</p>
            </div>
        @endif --}}
    </div>


<!DOCTYPE html>
<html>
<head>
    <title>Blank Site</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
@include('shared.navbar')
<div class="container">

@include('shared.gamebox', ['view' => 'recommend'])

<form>
    <div class="form-group">
        <label for="genre">Genre:</label>
        <select class="form-control" id="genre" name="genre">
            <option value="1">Genre 1</option>
            <option value="2">Genre 2</option>
            <option value="3">Genre 3</option>
        </select>
    </div>
    <div class="form-group">
        <label for="year">Year:</label>
        <input type="number" class="form-control" id="year" name="year">
    </div>
    <div class="form-group">
        <label for="platform">Platform:</label>
        <select class="form-control" id="platform" name="platform">
            <option value="1">Platform 1</option>
            <option value="2">Platform 2</option>
            <option value="3">Platform 3</option>
        </select>
    </div>
    <div class="form-group">
        <label for="range">Range:</label>
        <input type="range" class="form-control-range" id="range" name="range" min="1" max="3">
    </div>
</form>
</div>
{{dd($games)}}

</body>
</html>

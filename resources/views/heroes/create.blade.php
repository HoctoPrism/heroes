<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>Heroes - Créer un hero</title>
</head>
<body>
@extends('layout')
@section('content')
<form class="my-5 row" method="POST" action="{{ route('heroes.store') }}" enctype="multipart/form-data">
     @csrf
    <h1 class="text-center col-12">Ajouter un hero</h1>

    <!-- Message d'information -->
    @if ($errors->any())
      <div class="alert alert-danger">
       <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
       </ul>
      </div>
    @endif

    <div class="mb-3 col-12">
        <label for="name" class="form-label">Nom du hero</label>
        <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp">
    </div>
    <div class="mb-3 col-12">
        <label for="description" class="form-label">description du héro</label>
        <input type="text" class="form-control" name="description" id="description" aria-describedby="descriptionHelp">
    </div>
    <div class="mb-3 col-6">
        <label for="skill" class="form-label">skill du héro</label>
        <select class="form-select" name="skill" id="skill" aria-describedby="skillHelp">
            @foreach($skills as $skill)
                <option value="{{ $skill->id }}">{{ $skill->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3 col-6">
        <label for="gender" class="form-label">Genre du héro</label>
        <select class="form-select" name="gender" id="gender" aria-describedby="genderHelp">
            @foreach($genders as $gender)
                <option value="{{ $gender->id }}">{{ $gender->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3 col-6">
        <label for="race" class="form-label">Race du héro</label>
        <select class="form-select" name="race" id="race" aria-describedby="raceHelp">
            @foreach($races as $race)
                <option value="{{ $race->id }}">{{ $race->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3 col-6">
        <label for="universes" class="form-label">Les univers du héro</label>
        <select class="form-select" name="universes[]" id="universes" aria-describedby="universesHelp" multiple="multiple">
            @foreach($universes as $universe)
                <option value="{{ $universe->id }}">{{ $universe->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3 col-12">
        <label for="image" class="form-label">Image du hero</label>
        <input type="file" class="form-control" name="image" id="image" aria-describedby="imageHelp">
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>
@endsection
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

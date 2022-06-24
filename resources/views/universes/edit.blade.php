<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>Heroes - Editer une universe</title>
</head>
<body>
@extends('layout')
@section('content')
<form class="my-5 row" method="POST" action="{{ route('universes.update', $universe->id) }}">
     @csrf
    @method('PATCH')
    <h1 class="text-center col-12">Editer un universe</h1>

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
        <label for="name" class="form-label">Nom de l'univers</label>
        <input type="text" class="form-control" value="{{$universe->name}}" name="name" id="name" aria-describedby="nameHelp">
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>
@endsection
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>Heroe - {{$heroe->name}}</title>
</head>
<body>
@extends('layout')
@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div>Nom du héro : <span class="fw-bold">{{$heroe->name}}</span></div>
                <h1>C'est bien moche</h1>
                <a href="{{ route('heroes.index')}}" class="btn btn-primary btn-sm">retour à la liste</a>
            </div>
        </div>
    </div>
    @endsection
    <script type="text/javascript"
                src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

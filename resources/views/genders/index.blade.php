<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>Heroes - Liste des genres</title>
</head>
<body>
@extends('layout')
@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="bg-white rounded-lg shadow-sm p-5">
                    <div class="tab-content">
                        <div id="nav-tab-card" class="tab-pane fade show active">
                            <h3>Liste des genres</h3>
                            <a href="{{ route('genders.create')}}" class="btn btn-primary btn-sm">Ajouter</a>
                            @if(session()->get('success'))
                              <div class="alert alert-success">
                                {{ session()->get('success') }}
                              </div><br />
                            @endif
                            <!-- Tableau -->
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($genders as $gender)
                                    <tr>
                                        <td>{{$gender->id}}</td>
                                        <td>{{$gender->name}}</td>
                                        <td>
                                            <a href="{{ route('genders.show', $gender->id)}}" class="btn btn-primary btn-sm">Voir</a>
                                            <a href="{{ route('genders.edit', $gender->id) }}" class="btn btn-primary btn-sm">Editer</a>
                                            <form class="btn btn-sm" action="{{ route('genders.destroy', $gender->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit">Supprimer</button>
                                             </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <!-- Fin du Tableau -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        @endsection
        <script type="text/javascript"
                src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

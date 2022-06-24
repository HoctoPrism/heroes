<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>Heroe - Liste des heroes</title>
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
                            <h3>Liste des heroes</h3>
                            <a href="{{ route('heroes.create')}}" class="btn btn-primary btn-sm">Ajouter</a>
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
                                    <th scope="col">Description</th>
                                    <th scope="col">Race</th>
                                    <th scope="col">Genre</th>
                                    <th scope="col">Skill</th>
                                    <th scope="col">Universes</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($heroes as $heroe)
                                    <tr>
                                        <td>{{$heroe->id}}</td>
                                        <td>{{$heroe->name}}</td>
                                        <td>{{$heroe->description}}</td>
                                        @if($heroe->hrace)
                                            <td>{{$heroe->hrace->name}}</td>
                                        @else <td></td>
                                        @endif
                                        @if($heroe->gender)
                                            <td>{{$heroe->hGender->name}}</td>
                                            @else <td></td>
                                        @endif
                                        @if($heroe->skill)
                                            <td>{{$heroe->hSkill->name}}</td>
                                            @else <td></td>
                                        @endif
                                        @if($heroe->universe)
                                            <td>
                                                @foreach($heroe->universe as $uni)
                                                    <span class="me-2">{{$uni->name}}</span>
                                                @endforeach
                                            </td>
                                        @endif
                                        @if($heroe->image)
                                            <td>
                                                <img src="/storage/image/{{$heroe->image}}" alt="" width="100">
                                            </td>
                                        @endif
                                        <td>
                                            <a href="{{ route('heroes.show', $heroe->id)}}" class="btn btn-primary btn-sm">Voir</a>
                                            <a href="{{ route('heroes.edit', $heroe->id) }}" class="btn btn-primary btn-sm">Editer</a>
                                            <form class="btn btn-sm" action="{{ route('heroes.destroy', $heroe->id) }}" method="POST">
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

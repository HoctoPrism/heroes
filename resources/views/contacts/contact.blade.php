<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>Heroe - Liste des universes</title>
</head>
<body>
@extends('layout')
@section('content')
    <form action="" method="post" class="mt-5" action="{{ route('contact.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control {{ $errors->has('name') ? 'error' : '' }}" name="name" id="name">
            <!-- Error -->
            @if ($errors->has('name'))
                <div class="error">
                    {{ $errors->first('name') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control {{ $errors->has('email') ? 'error' : '' }}" name="email" id="email">
            @if ($errors->has('email'))
                <div class="error">
                    {{ $errors->first('email') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control {{ $errors->has('phone') ? 'error' : '' }}" name="phone" id="phone">
            @if ($errors->has('phone'))
                <div class="error">
                    {{ $errors->first('phone') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" class="form-control {{ $errors->has('subject') ? 'error' : '' }}" name="subject"
                   id="subject">
            @if ($errors->has('subject'))
                <div class="error">
                    {{ $errors->first('subject') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control {{ $errors->has('message') ? 'error' : '' }}" name="message" id="message"
                      rows="4"></textarea>
            @if ($errors->has('message'))
                <div class="error">
                    {{ $errors->first('message') }}
                </div>
            @endif
        </div>
        <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
    </form>
@endsection
<script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

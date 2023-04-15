<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Podcast App</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Podcast App</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">User Info</h3>
                </div>
                <div class="card-body">
                    <h5 class="card-title">first name: {{ $user->name }}</h5>
                    <h5 class="card-title">last name: {{ $user->last_name }}</h5>
                    <p class="card-text">User ID: {{ $user->id }}</p>
                    <form action="{{ route('users.destroy', $user) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>

                    <div class="form-group form-check">
                        <label class="form-check-input" for="deletePodcasts">Delete users podcasts ?</label>
                        <input type="checkbox" class="form-check-input" id="deletePodcasts" name="deletePodcasts">
                    </div>
                    </form>
                    <a href="{{ route('users.edit', $user) }}" class="btn btn-primary mt-2">Modify</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">User's Podcasts</h3>
                    <a href="{{route('podcasts.create', ['user_id'=>$user->id])}}" class="btn btn-success mt-3"> New podcast </a>
                </div>
                <div class="card-body">
                    @foreach ($podcasts as $podcast)
                        <div class="media mb-3">
                            <img src="{{ $podcast->image }}" class="align-self-start mr-3" alt="{{ $podcast->title }}" width="64" style="font-size:0">
                            <div class="media-body">
                                <h5 class="card-title" style="font-family: 'Berlin Sans FB',SansSerif,serif; text-decoration-line: underline" > Podcast title: {{ $podcast->title }}</h5>
                                <h5 style="color: #1f2937">Description:</h5><p class="card-text" style="color: #6b7280; text-wrap: normal">
                                    {{ $podcast->description }}
                                    </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap JavaScript -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

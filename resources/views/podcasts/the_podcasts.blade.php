<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create a podcast</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
</head>
<body>
<!-- Navigation bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">My App</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('podcasts.index') }}">Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('podcasts.index') }}">Podcasts</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <h1>Create a Podcast</h1>

    <a href="{{route('podcasts.create') }}" >
        @if ($podcasts->isEmpty())
            <p class="text-center">{{ __("You haven't added a podcast") }}</p>
        @endif
        @foreach ($podcasts as $podcast)
            <li>
                @if ($podcast ->image)
                    <img class="" src="{{Storage::url($podcast->image)}}" alt="{{ $podcast -> title }}">
                @endif

                <a href="{{ route('podcasts.show', $podcast) }}" class="">{{$podcast->title }}</a>

                @if ($podcast -> podcast)
                    <audio class="" controls>
                        <source src="{{ Storage::url($podcast->podcast) }}"
                                type="{{ Storage::mimeType($podcast->podcast) }}">
                    </audio>
                @endif

                <a href="{{ route('podcasts.edit', $podcast ) }}" class=""> Edit podcast</a>
                <a href="{{ route('podcasts.show', $podcast ) }}" class=""> Infos</a>
            </li>
        @endforeach
        <button type="submit" class="btn btn-primary">Create Podcast</button>
    </a>
</div>
<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>

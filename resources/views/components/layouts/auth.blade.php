<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link  href="{{asset('css/style.css')}}" rel="stylesheet">
    <link  href="{{asset('css/auth.css')}}" rel="stylesheet">
    <link  href="{{asset('css/alert.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.15.0/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c98bca4305.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>{{ $title ?? 'Recipe Book 79' }}</title>
</head>
<body class="layout-style align-items-center">
    <div class="row align-content-center">
        <p class="text-center mt-10 title-auth">Buku Resep 79</p>
        <div class="container">
            <div class="row mx-auto justify-content-center align-items-center" style="width: 5rem;">
                <img src="{{ asset('icon/logo.svg') }}" alt="Book-recipe" class="d-block mx-auto">
            </div>
        </div>
    {{ $slot }}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>
</html>
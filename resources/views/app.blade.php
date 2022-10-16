<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AZWE - {{ $siteNameTittle }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<<<<<<< HEAD
<div class="container"></div>
=======
<div class="container "></div>
>>>>>>> 4997f7d (Dodanie wyglądu szablonu statystyk)

<nav class="navbar navbar-expand-lg bg-light items-center">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">AZWE</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

<<<<<<< HEAD
        <div class="collapse navbar-collapse" id="navbarNav">
=======
        <div class="collapse navbar-collapse " id="navbarNav">
>>>>>>> 4997f7d (Dodanie wyglądu szablonu statystyk)
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="{{Route('app_central')}}">Statystyki</a>
                </li>
                <li class="nav-item">

                    <a class="nav-link" href="{{Route('app_projects')}}">Projekty</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{Route('app_leads')}}">Leady</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link "href="{{Route('app_contacts')}}">Kontakty</a>
                </li>
            </ul>
        </div>
        <div>
            <a href="#"><button type="button" class="btn btn-secondary" >Wyloguj</button></a>
        </div>
    </div>
</nav>
@yield('content')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>

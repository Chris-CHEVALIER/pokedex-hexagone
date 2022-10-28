<?php session_start() ?>

<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Pokédex</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-danger mb-3">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="./index.php">Pokédex</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="./index.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="./createPokemon.php">Ajouter un Pokémon</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="./createType.php">Ajouter un type</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Rechercher un Pokémon"
                            aria-label="Search">
                        <button class="btn btn-warning" type="submit">Rechercher</button>
                    </form>

                    <?php if ($_SESSION && $_SESSION["username"]) : ?>
                    <a href="./disconnect.php" class="mx-2 btn btn-danger">Se déconnecter</a>
                    <?php else : ?>
                    <a href="./login.php" class="mx-2 btn btn-primary">Se connecter</a>
                    <?php endif ?>
                </div>
            </div>
        </nav>
    </header>

    <?php

    function loadClass(string $class)
    {
        if (str_contains($class, "Controller")) {
            require "./Controller/$class.php";
        } else {
            require "./Entity/$class.php";
        }
    }

    spl_autoload_register("loadClass");

    $pokemonController = new PokemonController();
    $typeController = new TypeController();
    $userController = new UserController();

    ?>

    <main class="container">
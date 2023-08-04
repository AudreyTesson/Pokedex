<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $absoluteUri ?>/css/style.css">
    <title>Pokedex</title>
</head>

<body>
<header>
        <div class="container">
            <a class="logo" href="<?= $_SERVER['BASE_URI'] ?>">Pokédex</a>
            <nav>
                <ul>
                    <li><a href="<?= $_SERVER['BASE_URI'] ?>">Liste</a></li>
                    <li><a href="<?= $_SERVER['BASE_URI']. '/types' ?>">Types</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main class="container">

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
    <style>
    .fond-page {
        background-color: #FF7700;
    }
    </style>
</head>

<body class="container-fluid">

    <!-- début de la navigation -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Mon App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" 
                        href="/home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/book-list">
                        Liste des livres
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/book-new">
                        Ajouter un livre
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/author-list">
                            Liste des auteurs
                        </a>
                    </li>
                </ul>
                <form class="d-flex" method="get" action="/book-search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- fin de la navigation -->

    <div class="row justify-content-center">
        <div class="col-md-8 p-2 fond-page">

            <!-- Gestion des messages flash -->
            <?php if(hasFlashMessage()): ?>
                <div class="alert alert-warning mt-2 mb-2">
                    <?= getFlashMessage() ?>
                </div>
            <?php endif ?>

            <?=$content?>
        </div>

    </div>

</body>

</html>
<?php
require "./Vues/layout/header.php";

$pokemons = $pokemonController->readAll();


if ($_SESSION && $_SESSION["username"]) : ?>

<div id="carouselExampleCaptions" class="carousel slide w-50 mx-auto" data-bs-ride="false">
    <div class="carousel-indicators">
        <?php
            foreach ($pokemons as $pokemon) : ?>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" aria-current="true"
            class="active" aria-label="<?= $pokemon->getName() ?>"></button>
        <?php
            endforeach ?>
    </div>
    <div class="carousel-inner">
        <?php
            $i = 0;
            foreach ($pokemons as $pokemon) :
                $type1 = $typeController->read($pokemon->getId_type1());
                $type2 = $typeController->read($pokemon->getId_type2());
            ?>
        <div class="carousel-item <?= $i === 0 ? "active" : "" ?>" style="height: 620px; object-fit:container">
            <img src="<?= $pokemon->getImage() ?>" class="d-block w-100" alt="<?= $pokemon->getName() ?>">
            <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50">
                <h5><?= $pokemon->getName() ?></h5>
                <p>
                    <span class="badge" style="background-color: <?= $type1->getColor()  ?>">
                        <?= $type1->getName() ?>
                    </span>
                    <span class="badge" style="background-color: <?= $type2->getColor()  ?>">
                        <?= $type2->getName() ?>
                    </span>
                </p>
                <p>Originaire de <?= $pokemon->getRegion() ?></p>
                <p><?= $pokemon->getDescription() ?></p>
            </div>
        </div>
        <?php $i++;
            endforeach ?>


    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<?php else : ?>
<h3>Vous devez vous <a href="./login.php">connecter</a> !</h3>
<?php endif ?>




<?php require "./Vues/layout/footer.php"; ?>
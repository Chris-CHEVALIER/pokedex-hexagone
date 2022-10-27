<?php
require "./Vues/layout/header.php";



$pokemons = $pokemonController->readAll();


?>



<div id="carouselExampleCaptions" class="carousel slide w-25" data-bs-ride="false">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <?php
        foreach ($pokemons as $pokemon) :
            $type1 = $typeController->read($pokemon->getId_type1());
            $type2 = $typeController->read($pokemon->getId_type2());
        ?>
        <div class="carousel-item active">
            <img src="<?= $pokemon->getImage() ?>" class="d-block w-100" alt="...">
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
            </div>
        </div>
        <?php endforeach ?>


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

<?php require "./Vues/layout/footer.php"; ?>
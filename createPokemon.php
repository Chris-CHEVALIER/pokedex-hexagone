<?php
require "./Vues/layout/header.php";

if ($_POST) {
    $pokemon = new Pokemon($_POST);
    $pokemonController->create($pokemon);
    echo "<script>window.location.href = './index.php'</script>";
}

$types = $typeController->readAll();

?>


<h3>Ajouter un Pokémon</h3>
<form method="POST">
    <div class="mb-3">
        <label for="number" class="form-label">Numéro</label>
        <input type="number" name="number" class="form-control" id="number" placeholder="Numéro du Pokémon">
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Nom</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Nom du Pokémon">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="form-control" id="description" placeholder="Nom du Pokémon"></textarea>
    </div>


    <label for="id_type1" class="form-label">Type 1</label>
    <select name="id_type1" id="id_type1" class="form-control">
        <?php foreach ($types as $type) { ?>
        <option value="<?= $type->getId() ?>"><?= $type->getName() ?></option>
        <?php } ?>
    </select>

    <label for="id_type2" class="form-label">Type 2</label>
    <select name="id_type2" id="id_type2" class="form-control">
        <?php foreach ($types as $type) { ?>
        <option value="<?= $type->getId() ?>"><?= $type->getName() ?></option>
        <?php } ?>
    </select>

    <div class="mb-3">
        <label for="image" class="form-label">URL de l'image</label>
        <input type="text" name="image" class="form-control" id="image" placeholder="Image du Pokémon">
    </div>
    <div class="mb-3">
        <label for="region" class="form-label">Région</label>
        <input type="text" name="region" class="form-control" id="region" placeholder="Région du Pokémon">
    </div>
    <input type="submit" value="Ajouter" class="btn btn-success">

</form>

<?php
require "./Vues/layout/footer.php";

?>
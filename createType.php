<?php
require "./Vues/layout/header.php";

if ($_POST) {
    $type = new Type($_POST);
    $typeController->create($type);
    echo "<script>window.location.href = './index.php'</script>";
}

?>

<h3>Ajouter un type</h3>
<form method="POST">
    <div class="mb-3">
        <label for="name" class="form-label">Nom</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Nom du type">
    </div>
    <div class="mb-3">
        <label for="color" class="form-label">Couleur</label>
        <input type="color" name="color" class="form-control" id="color" placeholder="Couleur du type">
    </div>

    <input type="submit" value="Ajouter" class="btn btn-success">
</form>

<?php
require "./Vues/layout/footer.php";

?>
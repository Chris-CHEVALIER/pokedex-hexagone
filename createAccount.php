<?php
require "./Vues/layout/header.php";


if ($_POST) {
    if ($_POST["password"] === $_POST["confirm"]) {
        array_pop($_POST);
        $_POST["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $user = new User($_POST);
        $userController->create($user);
        $_SESSION["username"] = $user->getUsername();
        $_SESSION["firstName"] = $user->getFirstName();
        $_SESSION["lastName"] = $user->getLastName();
        $_SESSION["email"] = $user->getEmail();
        echo "<script>window.location.href = './index.php'</script>";
    } else {
        echo "Les mots de passe ne correspondent pas.";
    }
}

?>

<h3>Créer un compte</h3>
<form method="POST">

    <div class="mb-3">
        <label for="firstName" class="form-label">Prénom</label>
        <input type="text" name="firstName" class="form-control" id="firstName" placeholder="Votre prénom">
    </div>
    <div class="mb-3">
        <label for="lastName" class="form-label">Nom</label>
        <input type="text" name="lastName" class="form-control" id="lastName" placeholder="Votre nom">
    </div>
    <div class="mb-3">
        <label for="username" class="form-label">Pseudo</label>
        <input type="text" name="username" class="form-control" id="username" placeholder="Votre pseudo">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="Votre email">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Votre mot de passe">
    </div>
    <div class="mb-3">
        <label for="confirm" class="form-label">Confirmez votre mot de passe</label>
        <input type="password" name="confirm" class="form-control" id="confirm" placeholder="Votre mot de passe">
    </div>

    <input type="submit" value="Créer un compte" class="btn btn-primary">

</form>
<a href="./login.php">Vous avez déjà un compte ?</a>

<?php
require "./Vues/layout/footer.php";
?>
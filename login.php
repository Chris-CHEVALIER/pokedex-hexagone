<?php
require "./Vues/layout/header.php";

if ($_POST) {
    $users = $userController->readAll();
    foreach ($users as $user) {
        if ($_POST["username"] === $user->getUsername() && password_verify($_POST["password"], $user->getPassword())) {
            $_SESSION["username"] = $user->getUsername();
            $_SESSION["firstName"] = $user->getFirstName();
            $_SESSION["lastName"] = $user->getLastName();
            $_SESSION["email"] = $user->getEmail();
            echo "<script>window.location.href = './index.php'</script>";
        } else {
            echo "Vos identifiants de connexion sont incorrects.";
        }
    }
}
?>

<h3>Se connecter</h3>
<form method="POST">
    <div class="mb-3">
        <label for="username" class="form-label">Pseudo</label>
        <input type="text" name="username" class="form-control" id="username" placeholder="Votre pseudo">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Votre mot de passe">
    </div>

    <input type="submit" value="Connexion" class="btn btn-primary">

</form>
<a href="./createAccount.php">Vous n'avez pas de compte ?</a>

<?php
require "./Vues/layout/footer.php";
?>
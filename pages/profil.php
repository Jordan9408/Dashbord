<?php
require_once('../include/create-db-table.php');
if ($_POST) {
    $user = $_POST['username'];
    $mdp = $_POST['mdp'];


    $sql = "SELECT username, mdp FROM users
    WHERE username = :username
    AND mdp = MD5(:mdp)
    ";

    $sth = $dbh->prepare($sql);
    $sth->bindParam(':username', $username, PDO::PARAM_STR);
    $sth->bindParam(':mdp', $mdp, PDO::PARAM_STR);
    $sth->execute();

    $result = $sth->fetchAll(PDO::FETCH_OBJ);
    $nbre_result = $sth->rowCount();
    var_dump($nbre_result);
    var_dump($result);

    if (empty($user) || empty($mdp)) {
        $msg_error = "Merci de rentrer vos informations";
    } else {
        if ($nbre_result == 1) {
            $_SESSION['user'] = $user;
            header('Location: index.php?page=insert');
        }
    }
}

?>


<?php if (isset($msg_error)) : ?>
    <div class="error">
        <p><?php echo $msg_error; ?></p>
    </div>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <main>
        <h2>Connection</h2>
        <form method="post" action="profil.php" id="form-ident">
            <label for="username">User</label>
            <input type="text" name="username" id="username">
            <br>
            <label for="mdp">Mot de passe</label>
            <input type="password" name="mdp" id="mdp">
            <br>
            <input type="submit" value="Se connecter">
        </form>

    </main>
</body>

</html>
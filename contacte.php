<?php
    session_start();

    include_once 'database.php';
    $dbconnexion = dbConnect();

    if(isset($_POST['envoyer'])){
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $message = $_POST['message'];

        $adduser = $dbconnexion->prepare('INSERT INTO messages (nom_user, prenom, message) VALUES (?, ?, ?)');
        $adduser->execute(array($nom, $prenom, $message));
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Me contacter</title>
</head>
<body>
    <div class="container">
        <form method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">NOM :</label>
                <input type="text" class="form-control" name="nom" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Prénom :</label>
                <input type="text" class="form-control" name="prenom" required>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword"  class="col-sm-2 col-form-label">Message :</label>
                <textarea name="message" cols="30" rows="10"></textarea>
            </div>
            <button type="submit" name="envoyer" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
</body>
</html>
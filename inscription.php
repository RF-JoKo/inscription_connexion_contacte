<?php
    //Connexion à la base de données :
    include_once 'database.php';
    $dbconnexion = dbConnect();

    if(isset($_POST['envoyer'])){
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $pswrd = $_POST['pswrd'];
        //Récupère les informations saisies par l'utilisateur pour les rentrer dans la base de données :
        $adduser = $dbconnexion->prepare('INSERT INTO users (nom_user, prenom, user_email, mot_de_passe) VALUES (?, ?, ?, ?)');
        $adduser->execute(array($nom, $prenom, $email, $pswrd));

        $user = $adduser->fetch();
        //Redirige l'utilisateur vers la page de connexion :
        if(empty($user)){
            header("location: connexion.php");
            }
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Inscription</title>
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
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Adresse mail :</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mots de passe :</label>
                <input type="password" class="form-control" name="pswrd" required>
            </div>
            <button type="submit" name="envoyer" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
</body>
</html>
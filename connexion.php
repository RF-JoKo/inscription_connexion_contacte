<?php
    session_start();

    include_once 'database.php';
    $dbconnexion = dbConnect();

    if(isset($_POST['connexion'])){
        $email = $_POST['email'];
        $pswrd = $_POST['pswrd'];
        //Vérifie que l'utilisateur est bien enregistré dans la base de données via son adresse mail et son mots de passe :
        $getuser = $dbconnexion->prepare("SELECT * FROM users WHERE user_email = ? AND mot_de_passe = ? ");
        $getuser->execute(array($email, $pswrd));

        $user = $getuser->fetch(); 

        if(!empty($user)){
            header("location: contacte.php");
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
  <title>Connexion</title>
</head>
<body>
    <div class="container">
        <form method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Adresse mail :</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mots de passe :</label>
                <input type="password" class="form-control" name="pswrd" required>
            </div>
            <button type="submit" name="connexion" class="btn btn-primary">Se connecter</button>
        </form>
    </div>
</body>
</html>
<?php

//remplissage de toutes les variables de création de compte
$name = $_POST['nom'];
$surname = $_POST['prenom'];
$gender = $_POST['Gdr'];
$dob = $_POST['birth'];
$address = $_POST['Addr'];
$city = $_POST['Cty'];
$postal_code = $_POST['pc'];
$email = $_POST['email'];
$password = $_POST['password'];

include("bdd.php");

$mail = $pdo->prepare("select * from users where email='$email' limit 1");
$mail->execute();
$result = $mail->fetchAll();

if (count($result) > 0){
    $resultat = true;
} else {
    $resultat = false;
    $insert = $pdo->prepare("insert into users(name, surname, gender, dob, address, city, postal_code, email, password) values(?,?,?,?,?,?,?,?,?)");
    $insert->execute(array($name, $surname, $gender, $dob, $address, $city, $postal_code, $email, $password));
    
    if ($insert) {
        header("Location: ../html/connexion.html");
        exit(); // Assurez-vous d'ajouter exit après la redirection pour arrêter l'exécution du script
    } else {
        echo "Error: " . $insert . "<br>" . $pdo->error;
    }
}

echo json_encode($resultat);

?>

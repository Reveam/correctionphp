<?php

$server = "localhost"; 
$user = "root";
$pass = "root";
$database = "tp_final_carmen";

// ici on déclare les noms de variables qui seront utilisées juste en dessous avec la fonction mysqliconnect pour se connecter a la base de données

$conn = mysqli_connect($server, $user, $pass, $database); // connection a la base de donnée en input les données demandées par mysqli

if (!$conn) {
    die("<script>alert('La connexion a échoué')</script>");
}
// si la connexion ne fonctionne pas (!) alors message d'erreur (die) qui affiche un texte

$pdo= new PDO('mysql:dbname=tp_final_carmen;host=localhost;charset=utf8','root','root');
// PDO veut dire PHP Data Object, c'est une extension qui défini l'interface pour accéder a la base de données avec du PHP, 
//elle permet d'écrire un code beaucoup plus court et simple
// !! ne pas oublier d'encoder l'accès a la base de données en utf8 pour avoir les caractères spéciaux, etc

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //gestion d'erreurs du PDO
   // ICI DOIT APPARAITRE LA CONNECTION AVEC LA BASE DE DONNEES
   // ET LA GESTION DES ERREURS
?>
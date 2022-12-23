<!-- ICI DOIT APPARAITRE LE CODE PHP CONTENANT
    LA LIAISON AVEC LA BASE DE DONNEES
    LA DECLARATION DES VARIABLES
    ET LA GESTION DES ERREURS
-->
<?php
include('db.php'); // on précise a la page de run le fichier db.php avant de run ce fichier ci, il va nous connecter a la db
if (isset($_POST['enregistrer'])) { //si l'utilisateur a cliqué sur le bouton enregistrer du formulaire HTML ci dessous


  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $email = $_POST['email'];
  $mdp = sha1($_POST['password']); //sha1 est l'encodage du mot de passe
  
  //récupérer les données mentionnées dans le formulaire et leur donner des nom de variables 

  $select = mysqli_query($conn, "SELECT * FROM users WHERE email = '".$_POST['email']."'"); //ici je défini la variable select, on demande a mysqli de rechercher
  // dans la base de données 'users' et dans la colonne 'email' là ou un endroit est égal a l'email mentionné dans le formulaire

if (mysqli_num_rows ($select) > 0) { //si mysqli a trouvé plus de 0 email similaires a celui mentionné dans le formulaire (donc 1)
  header ('index.php'); 
  echo "<center>Cette adresse e-mail est déjà enregistrée.</center>";
  //on redirige vers la page index.php et on affiche un message sans faire l'inscription

} else {
  $req = "INSERT INTO users(nom, prenom, email, password) VALUES(?,?,?,?)";
  $execute = $pdo->prepare($req);
  $stm = $execute->execute([$nom, $prenom, $email, $mdp]);
  echo "<center>Inscription effectuée avec succès !</center>";
  //sinon, on défini la variable req, qui va demander d'insérer les valeurs données plus tard dans les colonnes de la db users
  //ensuite on va définir la variable execute, qui va demander au PDO (mis en place dans db.php) de 'préparer' les choses demandées dans la variable req
  //enfin, la variable stm (composée de prepare et execute voir https://www.php.net/manual/en/mysqli.quickstart.prepared-statements.php) va exécuter la requete 
  //(req) préparée plus haut en utilisant les variables du formulaire
  
}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
     <link rel="stylesheet" href="assets/bootstrap.min.css">
     <link rel="stylesheet" href="assets/all.min.css">
	<title>Home</title>
</head>
<body background="">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">société generale</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="inscription.php">inscription</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
	<form action="" method="post">
       <div class="container-fluid">
       	  <div class="p-4  mx-auto shadow rounded" style="width:100%; max-width:340px; margin-top: 50px;">
      
       	  	<img src="assets/images/t.png" class=" =  rounded-circle mx-auto d-block" style="width: 140px;">
       	  	<h3>creation de compte</h3>
       	  	 <input type="text" class="my-2 form-control" placeholder="Nom" name="nom" required>
       	  	 <input type="text" class="my-2 form-control" placeholder="Prénom" name="prenom" required>
				  <input type="email" class="my-2 form-control" placeholder="Email" name="email" required>
				  <input type="password" class="my-2 form-control" placeholder="Mot de passe" name="password" required>
          <!-- Ci dessus le formulaire d'inscription en HTML: pour récupérer les variables dans le code PHP on utilisera les données utilisées dans le champ 'name=' --> 
				
       	   
       	  	 <button class=" btn btn-primary" type="submit" name="enregistrer">Enregistrer</button>
       	  </div>
		
       </div>
	   </form>
	   <script src="assets/bootstrap.bundle.min.js"></script>
    <script src="assets/bootstrap.min.js"></script>
</body>
</html> 
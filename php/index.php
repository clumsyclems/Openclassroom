<!-- index.php -->
<?php
try
{
	// On se connecte à MySQL
	$mysqlClient = new PDO('mysql:host=localhost;dbname=we_love_food;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer


// Ecriture de la requête
$sqlQuery = 'INSERT INTO recipes(title, recipe, author, is_enabled) VALUES (:title, :recipe, :author, :is_enabled)';

// Préparation
$insertRecipe = $mysqlClient->prepare($sqlQuery);

// Exécution ! La recette est maintenant en base de données
$insertRecipe->execute([
    'title' => 'Cassoulet',
    'recipe' => 'Etape 1 : Des flageolets ! Etape 2 : Euh ...',
    'author' => 'contributeur@exemple.com',
    'is_enabled' => 1, // 1 = true, 0 = false
]);

// On récupère tout le contenu de la table recipes
$sqlQuery = 'SELECT * FROM recipes';
$recipesStatement = $mysqlClient->prepare($sqlQuery);
$recipesStatement->execute();
$recipes = $recipesStatement->fetchAll();

// On affiche chaque recette une à une
foreach ($recipes as $recipe) {
?>
    <p><?php
    echo $recipe['author']; ?></p>
<?php
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de recettes - Page d'accueil</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100"> <!-- Rappel des balise html : https://openclassrooms.com/fr/courses/1603881-apprenez-a-creer-votre-site-web-avec-html5-et-css3/1608357-memento-des-balises-html -->
    
    <div class="container">
        
        <!-- Methode 1 pour transferer des  infos d'une page à une autre -->
        <a href="submit_contact.php?email=Dupont.jean@gmail.com&amp;message=Jean aime bien ces plats">Dis-moi bonjour !</a>
        
        </form>
        
        <?php include_once('header.php'); ?>
        
        <h1>Site de recettes</h1>

        <!-- inclusion des variables et fonctions -->
        <?php
            include_once('variables.php');
            include_once('functions.php');
        ?>

        <!-- inclusion de l'entête du site -->
        <?php include_once('header.php'); ?>
        
        <?php foreach(getRecipes($recipes) as $recipe) : ?>
            <article>
                <h3><?php echo $recipe['title']; ?></h3>
                <div><?php echo $recipe['recipe']; ?></div>
                <i><?php echo displayAuthor($recipe['author'], $users); ?></i>
            </article>
        <?php endforeach ?>
        <!-- Methode 2 pour transferer des infos d'une page à une autre -->
        <form method="post" action="submit_contact.php"  enctype="multipart/form-data"> <!-- enctype annonnce au moteur de recherche que le formulaire propose la capacité de recevoir des fichiers--> 
            <!-- method est la méthod que l'n va utiliser ici c'est l'envoie de donnée et action est l'endroit vers où les données vont être envoyer-->
        
            <p>
            <input type="hidden" class="form-control" id="email" name="email" aria-describedby="email-help" value="jean.duppont@gmail.com">
            <textarea for="message" class="form-control" placeholder="Exprimez vous" id="message" name="message"></textarea>
            <div class="mb-3">
                <label for="screenshot" class="form-label">Votre capture d'écran</label>
                <input type="file" class="form-control" id="screenshot" name="screenshot" /> <!-- BAlise pour récuperer un fichier grace au type "file"-->
            </div>
            </p>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>

    </div>

    <!-- inclusion du bas de page du site -->
    <?php include_once('footer.php'); ?>
</body>
</html>
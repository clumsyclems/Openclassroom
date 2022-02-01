<!-- index.php -->
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
<body class="d-flex flex-column min-vh-100">
    
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
        <form method="post" action="submit_contact.php"> 
            <!-- method est la méthod que l'n va utiliser ici c'est l'envoie de donnée et action est l'endroit vers où les données vont être envoyer-->
        
            <p>
            <input type="hidden" class="form-control" id="email" name="email" aria-describedby="email-help" value="jean.duppont@gmail.com">
            <textarea for="message" class="form-control" placeholder="Exprimez vous" id="message" name="message"></textarea>
            </p>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>

    </div>

    <!-- inclusion du bas de page du site -->
    <?php include_once('footer.php'); ?>
</body>
</html>
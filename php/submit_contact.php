<?php

/**
 * Teste si les variables envoyés existent et donc pas de corruption des données
 * La méthode isset permet de vérifier si les variable existe : si oui true sinon false et bloque la page
 * Pour filter_var cette page montre des méthode pour valider les information donnée en parametre : https://www.php.net/manual/fr/filter.examples.validation.php
 * empty verifer si l'argument est vide ou pas
 */
if (
    (isset($_GET['email']) || filter_var($_GET['email'], FILTER_VALIDATE_EMAIL))
    || (isset($_GET['message']) || !empty($_GET['message']))
    ):
?>

<h1>Message bien reçu !</h1>

<div class="card">
    
    <div class="card-body">
        <h5 class="card-title">Rappel de vos informations</h5>
        <p class="card-text"><b>Email</b> : <?php echo $_GET['email']; ?></p>
        <p class="card-text"><b>Message</b> : <?php echo $_GET['message']; ?></p>
    </div>
</div>
<?php endif; ?>
<?php 

if (
    (isset($_POST['email']) || filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
    || (isset($_POST['message']) || !empty($_POST['message']))
    ):
?>

<h1>Message bien reçu !</h1>

<div class="card">
    
    <div class="card-body">
        <h5 class="card-title">Rappel de vos informations</h5>
        <p class="card-text"><b>Email</b> : <?php echo htmlspecialchars($_POST['email']); ?></p><!--Permet de échapper le code html rentrer par un utilisateur -->
        <p class="card-text"><b>Message</b> : <?php echo strip_tags($_POST['message']); ?></p><!--Permet de supprimer le code html rentrer par un utilisateur -->

    </div>
</div>
<?php
// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['screenshot']) && $_FILES['screenshot']['error'] == 0)// permet dfe savoir qu'il n'y a pas d'erreur lors de l'envoie
{
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['screenshot']['size'] <= 1000000) //taille définie en octets
        {
                // Testons si l'extension est autorisée
                $fileInfo = pathinfo($_FILES['screenshot']['name']); //pathinfo permet de split le nom du fichier et son extension
                $extension = $fileInfo['extension'];
                $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png', 'webp'];
                if (in_array($extension, $allowedExtensions))
                {
                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($_FILES['screenshot']['tmp_name'], './' . basename($_FILES['screenshot']['name'])); //move_uploaded_file() permet de sauvegarder de manière définitive le fichier envoyé
                        echo "L'envoi a bien été effectué !";
                }
        }
} 
?>
<?php endif; ?>
<?php
if ((
        (!isset($_GET['email']) || !filter_var($_GET['email'], FILTER_VALIDATE_EMAIL))
        || (!isset($_GET['message']) || empty($_GET['message']))
    )&&
    (
        (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        || (!isset($_POST['message']) || empty($_POST['message']))
    ))
{
	echo('Il faut un email et un message valides pour soumettre le formulaire.');
    return;
}
?>
<?php

/**
 * Teste si les variables envoyés existent et donc pas de corruption des données
 * La méthode isset permet de vérifier si les variable existe : si oui true sinon false et bloque la page
 * Pour filter_var cette page montre des méthode pour valider les information donnée en parametre : https://www.php.net/manual/fr/filter.examples.validation.php
 * empty verifer si l'argument est vide ou pas
 */
if (
    (!isset($_GET['email']) || !filter_var($_GET['email'], FILTER_VALIDATE_EMAIL))
    || (!isset($_GET['message']) || empty($_GET['message']))
    )
{
	echo('Il faut un email et un message valides pour soumettre le formulaire.');
    return;
}
?>

<h1>Message bien reçu !</h1>

<div class="card">
    
    <div class="card-body">
        <h5 class="card-title">Rappel de vos informations</h5>
        <p class="card-text"><b>Email</b> : <?php echo $_GET['email']; ?></p>
        <p class="card-text"><b>Message</b> : <?php echo $_GET['message']; ?></p>
    </div>
</div>
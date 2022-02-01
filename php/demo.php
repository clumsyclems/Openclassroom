Création de code php utilisiation la balise "<?php ?>"

<?php
/**
 * Déclaration de variable par $ suivi du nom de la variable : 
 * pas de typage spécifique int, double ou string, null et bool
 */
$ma_variable = 'Clumsy';
$ma_variable2 = 'Clems';
/**
 * Concaténation de string utilisation "." 
 */
echo $ma_variable ." " . $ma_variable2  . PHP_EOL;
echo "$ma_variable $ma_variable2" . " != " . '$ma_variable \' $ma_variable2' .  PHP_EOL;

/**
 * Création de tableau
 */
$note = [10, 20, 9, 7, 14, 'thirteen'];
echo $note[3] .  PHP_EOL;
/**
 * Création possible d'une structure sous forme de table
 */
$eleve = ['Marc', "Doe", [10,20,15]];
echo $eleve[2][2] . PHP_EOL;
/**
 * Ou sous forme d'une map
 */
$eleve2 = [
    'prenom' => 'Marc', 
    'nom' => 'Doe' , 
    'notes' => [10,20,15]
];
$eleve2['nom'] = 'Smith';
echo $eleve2['nom'] . PHP_EOL;
$eleve2['notes'][] = 'Smith';        // ajout de variable dans un tableau
print_r($eleve2['note']) . PHP_EOL; // nouvelle façon d'afficher à voir plus tard.
print_r($eleve2) . PHP_EOL; 

/**
 * Logique en php
 */

    // if
$value = 12;
if ($value > 10){
    echo "Vous êtes au-dessus de la moyenne". PHP_EOL;
}else{
    echo "Vous n\'êtes pas au-dessus de la moyenne" . PHP_EOL;
}

?>

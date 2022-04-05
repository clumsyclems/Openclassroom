<!DOCTYPE html>
<!--
    Les balises php peuvent s'écrire partout 
-->
<html>
    <head>
        <title>Ceci est une page de test avec des balises PHP</title>
        <meta charset="utf-8" />
    </head>
    <?php
        $variable = "Mon \"nom\" est Mathieu";
        $variable2 = 'Je m\'appelle Mathieu';
        echo $variable;
    ?>
    <body>
        <h2>Page de test</h2>
        
        <p>
            Cette page contient du code HTML avec des balises PHP.<br />
            <?php /* Insérer du code PHP ici */ ?>
            Voici quelques petits tests :
        </p>
        
        <ul>
            <li style="color: blue;">Texte en bleu</li>
            <li style="color: red;">Texte en rouge</li>
            <li style="color: green;">Texte en vert</li>
            <li style="color: red;">Texte en cyan</li>
        </ul>
        
        <p>
            Cette ligne a été écrite entièrement en HTML.<br />
            <?php echo("Celle-ci a été écrite entièrement <strong> en PHP </strong>.");?> 
            <br />
            <?php echo "Fonction pour afficher les dates : \"\date\" suivi du format qu'on souhaite afficher : " . date('d/m/Y h:i:s'); ?> 
        </p>

        <?php
            /* Encore du PHP
            Toujours du PHP */
        ?>

        <p>
            <h2>
                    Test avec les conditions if elseif et else avec php
            </h2>

            <?php $chickenRecipesEnabled = false; ?>

            <?php if ($chickenRecipesEnabled): ?> <!-- Ne pas oublier le ":" -->

                <h3>Liste des recettes à base de poulet</h3>

            <?php endif;
                echo "utilisation de switch(arg) case: break; default : possible."."<br/>"." Possiblilité d'utiliser (condition) ? true : false" 
            ?><!-- Ni le ";" après le endif -->
            
            <h2>
                Boucle while :
            </h2>
            $lines = 1;

            <?php  
                while ($lines <= 10) {
                    echo 'Je ne dois pas regarder les mouches voler quand j\'apprends le PHP.<br />';
                    $lines++; // $lines = $lines + 1
                }
            ?>
            <h2>
                Boucle For :
            </h2>
            <?php

                // Déclaration du tableau des recettes
                $recipes = [
                    ['Cassoulet','[...]','mickael.andrieu@exemple.com',true,],
                    ['Couscous','[...]','mickael.andrieu@exemple.com',false,],
                ];

                ?>
            <?php for ($lines = 0; $lines <= 1; $lines++): ?>
                <li><?php echo $recipes[$lines][0] . ' (' . $recipes[$lines][2] . ')'; ?></li>
            <?php endfor; ?>
            <h2>
                Boucle Foreach et tableau :
            </h2>
            <?php

                $recipes = [
                    [
                        'title' => 'Cassoulet',
                        'recipe' => '',
                        'author' => 'mickael.andrieu@exemple.com',
                        'is_enabled' => true,
                    ],
                    [
                        'title' => 'Couscous',
                        'recipe' => '',
                        'author' => 'mickael.andrieu@exemple.com',
                        'is_enabled' => false,
                    ],
                    [
                        'title' => 'Escalope milanaise',
                        'recipe' => '',
                        'author' => 'mathieu.nebra@exemple.com',
                        'is_enabled' => true,
                    ],
                    [
                        'title' => 'Salade Romaine',
                        'recipe' => '',
                        'author' => 'laurene.castor@exemple.com',
                        'is_enabled' => false,
                    ],
                ];

                foreach($recipes as $recipe) {
                    echo $recipe['title'] . ' contribué(e) par : ' . $recipe['author'] . PHP_EOL. "<br/>"; 
                }
                echo "<br/>print_r peut permettre de faitre ganger du temps <br/>";
                print_r($recipes);
            ?>

            <h2>
                Fonction de recherche dans un tableau :
            </h2>

            <?php
                $recipe = [
                    'title' => 'Salade Romaine',
                    'recipe' => 'Etape 1 : Lavez la salade ; Etape 2 : euh ...',
                    'author' => 'laurene.castor@exemple.com',
                ];

                if (array_key_exists('title', $recipe))
                {
                    echo 'La clé "title" se trouve dans la recette !';
                }

                if (array_key_exists('commentaires', $recipe))
                {
                    echo 'La clé "commentaires" se trouve dans la recette !';
                }

                $users = [
                    'Mathieu Nebra',
                    'Mickaël Andrieu',
                    'Laurène Castor',
                ];

                if (in_array('Mathieu Nebra', $users))
                {
                    echo 'Mathieu fait bien partie des utilisateurs enregistrés !';
                }

                if (in_array('Arlette Chabot', $users))
                {
                    echo 'Arlette fait bien partie des utilisateurs enregistrés !';
                }


                $positionMathieu = array_search('Mathieu Nebra', $users);
                echo '"Mathieu" se trouve en position ' . $positionMathieu . PHP_EOL;

                $positionLaurène = array_search('Laurène Castor', $users);
                echo '"Laurène" se trouve en position ' . $positionLaurène . PHP_EOL;
            ?>
        </p>

        <div class="container">
            <h1>Affichage des recettes</h1>
            <!-- Boucle sur les recettes -->
            <?php foreach($recipes as $recipe) : ?>
                <!-- si la clé existe et a pour valeur "vrai", on affiche -->
                <?php if (array_key_exists('is_enabled', $recipe) && $recipe['is_enabled'] == true): ?>

                    <article>
                        <h3><?php echo $recipe['title']; ?></h3>
                        <div><?php echo $recipe['recipe']; ?></div>
                        <i><?php echo $recipe['author']; ?></i>
                    </article>

                <?php endif; ?>
            <?php endforeach ?>
        </div>
        
        
        <!--
            Fonction utile : 
                str_replace pour rechercher et remplacer des mots dans une variable ;

                move_uploaded_file pour envoyer un fichier sur un serveur ;

                imagecreate pour créer des images miniatures (aussi appelées "thumbnails") ;

                mail pour envoyer un mail avec PHP (très pratique pour faire une newsletter) ;

                de nombreuses options pour modifier des images, y écrire du texte, tracer des lignes, des rectangles, etc. ;

                crypt pour chiffrer des mots de passe ;

                date  pour renvoyer l'heure, la date, etc.
        -->
        <div>
            <h2>
                Manipulation de texte :
            </h2>
            <?php
                $recipe = 'Etape 1 : des flageolets ! Etape 2 : de la saucisse toulousaine';
                $length = strlen($recipe);
                
                
                echo 'La phrase ci-dessous comporte ' . $length . ' caractères :' . PHP_EOL . $recipe;
                echo "<br/>";
                echo str_replace('c', 'C', 'le cassoulet, c\'est très bon');

                $recipe = [
                    'title' => 'Salade Romaine',
                    'recipe' => 'Etape 1 : Lavez la salade ; Etape 2 : euh ...',
                    'author' => 'laurene.castor@exemple.com',
                ];
                echo "<br/>";
                echo sprintf(
                    '%s par "%s" : %s',
                    $recipe['title'],
                    $recipe['author'],
                    $recipe['recipe']
                );
                echo "<br/>";
            ?>
        </div>

        <div>
            <h2>
                Création de fonction :
            </h2>
            <?php
                function isValidRecipe(array $recipe/*variable que la fonction accepte*/) : bool //variable que la fonction renvoie
                {
                    if (array_key_exists('is_enabled', $recipe)) {
                        $isEnabled = $recipe['is_enabled'];
                    } else {
                        $isEnabled = false;
                    }
                
                    return $isEnabled;
                }
                $romanSalad = [
                    'title' => 'Salade Romaine',
                    'recipe' => 'Etape 1 : Lavez la salade ; Etape 2 : euh ...',
                    'author' => 'laurene.castor@exemple.com',
                    'is_enabled' => true,
                ];
               
                echo isValidRecipe($romanSalad);
            ?>
            
        </div>
    </body>
</html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ProjetWeb_vueJS_dataTable</title>
</head>
    <body>
        <?php


        //// Créer un tableau de données
        //$tableau_pour_json = ['prenom'=>'Alexandre', 'nom'=>'Chevalier'];
        //
        //// Convertir le tableau au format json
        //$contenu_json = json_encode($tableau_pour_json);
        //
        //var_dump($contenu_json);
        //// Affichera {"prenom":"Alexandre","nom":"Chevalier"}

        $tableau_pour_json = [
            [
                'id'=>'1',
                'titre'=>'Stratégie SI',
                'msgIntervention'=>'Définition et mise à jour de la stratégie et objectifs du S.I.',
                'affectedTo'=>'Equipe 1',
                'client'=>'Takatoukité',
                'state'=>'A faire'
            ],
            [
                'id'=>'2',
                'titre'=>'Objectifs SI',
                'msgIntervention'=>"Élaboration du plan d'action de réalisation des objectifs du S.I.",
                'affectedTo'=>'Equipe 1',
                'client'=>'Takatoukité',
                'state'=>'A faire'
            ],
            [
                'id'=>'3',
                'titre'=>'Risques SI',
                'msgIntervention'=>"Définition du plan de risque du S.I.",
                'affectedTo'=>'Equipe 2',
                'client'=>'Takatoukité',
                'state'=>'A faire'
            ],
            [
                'id'=>'4',
                'titre'=>'Processus IT',
                'msgIntervention'=>"Définition et mise à jour des processus IT de la société",
                'affectedTo'=>'Equipe 3',
                'client'=>'Takatoukité',
                'state'=>'A faire'
            ],
            [
                'id'=>'5',
                'titre'=>'Formation SSI',
                'msgIntervention'=>"Définition des besoins en formation pour l'équipe du S.S.I.",
                'affectedTo'=>'Equipe 1',
                'client'=>'Takatoukité',
                'state'=>'A faire'
            ],
            [
                'id'=>'6',
                'titre'=>'Equipements matériels',
                'msgIntervention'=>"Gestion des équipements informatiques et de communication",
                'affectedTo'=>'Equipe 1',
                'client'=>'Takatoukité',
                'state'=>'A faire'
            ],
            [
                'id'=>'7',
                'titre'=>'Sytèmes et Logiciels',
                'msgIntervention'=>"Gestion des Systèmes et logiciels informatiques",
                'affectedTo'=>'Equipe 2',
                'client'=>'Takatoukité',
                'state'=>'A faire'
            ],
            [
                'id'=>'8',
                'titre'=>'Sécurité',
                'msgIntervention'=>"Gestion de la sécurité informatique (état physique, sauvegardes et droits d'accès)",
                'affectedTo'=>'Equipe 3',
                'client'=>'Takatoukité',
                'state'=>'A faire'
            ],
            [
                'id'=>'9',
                'titre'=>'Maintenance',
                'msgIntervention'=>"Gestion de la maintenance informatique: préventive et corrective",
                'affectedTo'=>'Equipe 1',
                'client'=>'Takatoukité',
                'state'=>'A faire'
            ],
            [
                'id'=>'10',
                'titre'=>'Solutions',
                'msgIntervention'=>"Gestion de mise en place de nouvelles solutions informatiques: étude de besoin, réalisation, tests et mise en production",
                'affectedTo'=>'Equipe 3',
                'client'=>'Takatoukité',
                'state'=>'A faire'
            ],
            [
                'id'=>'11',
                'titre'=>'Budget / Planning',
                'msgIntervention'=>"Gestion du budget et planning",
                'affectedTo'=>'Equipe 4',
                'client'=>'Takatoukité',
                'state'=>'A faire'
            ],
            [
                'id'=>'12',
                'titre'=>'Formation',
                'msgIntervention'=>"Support et formation des utilisateurs relatifs aux applications métiers",
                'affectedTo'=>'Equipe 1',
                'client'=>'Takatoukité',
                'state'=>'A faire'
            ],
            [
                'id'=>'13',
                'titre'=>"Droits d'accès",
                'msgIntervention'=>"Droits d'accès informatique - Intervention et assistance",
                'affectedTo'=>'Equipe 4',
                'client'=>'Takatoukité',
                'state'=>'A faire'
            ]
        ];

        $contenu_json =json_encode($tableau_pour_json, JSON_UNESCAPED_UNICODE);

        // Nom du fichier à créer
        $nom_du_fichier = 'fichier.json';

        // Ouverture du fichier
        $fichier = fopen($nom_du_fichier, 'w+');

        // Ecriture dans le fichier
        fwrite($fichier, $contenu_json);

        // Fermeture du fichier
        fclose($fichier);


        ?>
    </body>
</html>


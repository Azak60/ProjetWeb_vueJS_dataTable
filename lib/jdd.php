<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ProjetWeb_vueJS_dataTable</title>
</head>
    <body>
        <?php

        $tableauNom = ["Durand", "Plot", "Alfred", "Villeneuf", "Boy", "Alain"];
        $tableauTitle = [
            "Définition et mise à jour de la stratégie et objectifs du S.I.",
            "Définition et mise à jour des processus IT de la société.",
            "Définition des besoins en formation pour l'équipe du S.S.I.",
            "Définition du plan de risque du S.I.",
            "Élaboration du plan d'action de réalisation des objectifs du S.I.",
            "Gestion des équipements informatiques et de communication.",
            "Gestion des Systèmes et logiciels informatiques.",
            "Gestion de la sécurité informatique (état physique, sauvegardes et droits d'accès.",
            "Gestion de la maintenance informatique: préventive et corrective.",
            "Gestion de mise en place de nouvelles solutions informatiques: étude de besoin, réalisation, tests et mise en production.",
            "Gestion du budget et planning.",
            "Support et formation des utilisateurs relatifs aux applications métiers.",
            "Droits d'accès informatique - Intervention et assistance."
        ];
        $tableauMsgIntervention = [
            "Développement",
            "TMA",
            "Conception",
            "Analyse"
        ];
        $tableauAffectedTo = [0, 1, 2];
        $tableauClient = [0, 1, 2, 3, 4, 5, 6];
        $tableauState = [0, 1, 2];

        $tableauData = [];

        for ($i = 1; $i <= 1000 ; $i++) {
            $valueTabTitle = rand(0, sizeof($tableauTitle) - 1);
            $valueTabMsgIntervention = rand(0, sizeof($tableauMsgIntervention) - 1);

            $title = $tableauTitle[$valueTabTitle];
            $msgIntervention = $tableauMsgIntervention[$valueTabMsgIntervention];
            $affectedTo = rand(0, sizeof($tableauNom));
            $client = rand(0, sizeof($tableauClient));
            $state = rand(0, sizeof($tableauState));

            $tableauData[] =  [
                    'id' => $i,
                    'title' => $title,
                    'msgIntervention' => $msgIntervention,
                    'affectedTo' => $affectedTo,
                    'client' => $client,
                    'state' => $state
            ];
        }
        //// Créer un tableau de données
        //$tableau_pour_json = ['prenom'=>'Alexandre', 'nom'=>'Chevalier'];
        //
        //// Convertir le tableau au format json
        //$contenu_json = json_encode($tableau_pour_json);
        //
        //var_dump($contenu_json);
        //// Affichera {"prenom":"Alexandre","nom":"Chevalier"}

        $contenu_json =json_encode($tableauData, JSON_UNESCAPED_UNICODE);

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


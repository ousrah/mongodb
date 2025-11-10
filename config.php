<?php
// Configuration générale du cours
define('COURSE_TITLE', 'Maîtrise de MongoDB : De la modélisation NoSQL au Framework d\'Agrégation');
define('COURSE_AUTHOR', 'Mme Widad Jakjoud');
define('COURSE_LAST_UPDATE', 'Novembre 2025');

// Structure du cours pour générer le sommaire dynamiquement
// Les 'id' correspondent aux ID des balises <section> dans le HTML.
$course_parts = [
    "Partie 1 : Fondamentaux de MongoDB et du NoSQL" => [
        ['id' => 'accueil', 'title' => "Chapitre 1 : Introduction aux bases de données NoSQL"],
        ['id' => 'modele-document', 'title' => "Chapitre 2 : Le modèle orienté document (JSON/BSON)"],
        ['id' => 'installation-outils', 'title' => "Chapitre 3 : Installation et Outils de l'écosystème"],
        ['id' => 'crud-insert', 'title' => "Chapitre 4 : Les opérations d'écriture (Insert, BulkWrite)"],
        ['id' => 'exercices-sommatifs-partie1', 'title' => "Ateliers Sommatifs (Partie 1)"]
    ],
    "Partie 2 : Interrogation Avancée des Données" => [
        ['id' => 'find-bases', 'title' => "Chapitre 5 : Lire les données avec find()"],
        ['id' => 'filtrage-avance', 'title' => "Chapitre 6 : Opérateurs de requête et filtrage avancé"],
        ['id' => 'projection-tri', 'title' => "Chapitre 7 : Projection, Tri et Pagination"],
        ['id' => 'exercices-sommatifs-partie2', 'title' => "Ateliers Sommatifs (Partie 2)"]
    ],
    "Partie 3 : Manipulation et Agrégation" => [
        ['id' => 'modification-donnees', 'title' => "Chapitre 8 : Mise à Jour et Suppression de données"],
        ['id' => 'aggregation-intro', 'title' => "Chapitre 9 : Introduction au Framework d'Agrégation"],
        ['id' => 'aggregation-group', 'title' => "Chapitre 10 : Regroupement avec \$group et \$match"],
        ['id' => 'aggregation-unwind', 'title' => "Chapitre 11 : Décomposer les tableaux avec \$unwind"],
        ['id' => 'exercices-sommatifs-partie3', 'title' => "Ateliers Sommatifs (Partie 3)"]
    ],
    "Partie 4 : Administration et Connexion Applicative" => [
        ['id' => 'backup-restore', 'title' => "Chapitre 12 : Sauvegarde et Restauration"],
        ['id' => 'securite', 'title' => "Chapitre 13 : Gestion des Utilisateurs et des Rôles"],
        ['id' => 'pymongo', 'title' => "Chapitre 14 : Interroger MongoDB avec Python (PyMongo)"],
        ['id' => 'exercices-sommatifs-partie4', 'title' => "Ateliers Sommatifs (Partie 4)"]
    ]
];
?>
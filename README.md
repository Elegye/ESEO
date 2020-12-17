# ESEO-Projets
Dépôt projet plateforme JPO ESEO.


## Mise en route

Il faut configurer la base de données dans le fichier `.env`, ou bien créer un fichier `.env.local`, pour enregistrer les paramètres en local.
Pour créer la base de données : `php bin/console doctrine:database:create` puis `php bin/console doctrine:schema:create` pour générer les tables liées aux entitées.
L'idéal serait de charger les fixtures avec la commande `php bin/console doctrine:fixtures:load` => Création des utilisateurs.

A la racine du projet : `symfony serve`, en ayant installé l'exécutable Symfony.
Le site est maintenant disponible sur http://127.0.0.1:8000


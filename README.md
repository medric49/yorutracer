# yorutracer
YoruTracer est une plate-forme de traçabilité des produits agroalimentaires basée sur la technologie des blockchains. Ce projet est couplé au projet yorublockchains, ce dernier est le système de blockchains integré.

## Prérequis
* php : version >= 7
* composer : version >= 1.6
* Créer et configurer le fichier .env à partir du fichier .env.example , et le placer à la racine du dossier du projet
* Créer un domaine virtuel sur votre machine (par exemple www.yorutracer.com) et assurer vous qu'il correspond au domaine dans le fichier .env
* Installer la couche de blockchains du projet se trouvant sur le dépot https://github.com/medric49/yorublockchains et lancer ce projet en suivant son procéssus d'installation

## Commande d'initialisation
    > composer install
    > npm install
    > php artisan storage:link


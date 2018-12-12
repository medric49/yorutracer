# yorutracer
YoruTracer est une plate-forme web (projet Laravel) de traçabilité des produits agroalimentaires basée sur la technologie des blockchains. Ce projet est couplé au projet yorublockchains, ce dernier est le système de blockchains integré.

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

## Attention
Ce projet et le projet se trouvant sur le dépot https://github.com/medric49/yorublockchains marchent de paire. Ainsi donc, il faut avoir les deux projets présents dans la machine. Certaines pages de ce site, notamment les pages en mode connecté, nécessite que le projet yorublockchains soit lancé ( 'npm start' pour le lancer le serveur de blockchains ) donc il faudrait lancer l'autre projet de préférence avant de visiter le site.

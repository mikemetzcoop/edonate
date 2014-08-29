# eCollecte Standard Edition by [Agence Ecedi](http://ecedi.fr)

eCollecte est une application Full Stack Symfony2 pour la production de formulaire de don

## Installation

### prerequis

  * un SGBDD mysql ou postgreSQL
  * php 5.5.\*
  * un serveur HTTP
  * les packages php5-gd php5-sundown (pecl), zend opcache,
  * node.js
  * bower pour node.js (gestion des dépendences JS)
  * uglifyjs2 pour node.js
  * uglifycss pour node.js
  * composer (gestion des dépendences PHP)

Optionnel
  * Une instance memcache pour la gestion des sessions php  


### récuperer le code source

depuis Github

    $ git clone git@github.com:ecedi/ecollecte.git ecollecte.loc


### régler les permissions

Sur les dossiers sur web/media web/uploads app/cache app/logs

    $ rm -rf app/cache/*
    $ rm -rf app/logs/*
    $ rm -rf web/media/*

    $ sudo chmod +a "www-data allow delete,write,append,file_inherit,directory_inherit" app/cache app/logs web/uploads web/media
    $ sudo chmod +a "`whoami` allow delete,write,append,file_inherit,directory_inherit" app/cache app/logs web/uploads web/media

ou si le `chmod +a` n'est pas supporté, avec `setfacl`

    $ sudo setfacl -R -m u:www-data:rwX -m u:`whoami`:rwX app/cache app/logs web/uploads web/media
    $ sudo setfacl -dR -m u:www-data:rwx -m u:`whoami`:rwx app/cache app/logs web/uploads web/media


### Installation des dépendences PHP et JS

    $ composer install

l'application utilise SpBowerBundle qui permet de gérér les dépendences JS via un handler de commande composer


### Initialisation

Création de la base de donnée:

    $ app/console doctrine:database:create

Création du schema de bdd:

    $ app/console doctrine:schema:create

Installation de resources public :

    $ app/console assets:install --symlink

Génération des resources dynamiques :

    $ app/console assetic:dump


### Creation du super_user

Création d'un utilisateur :

    $ app/console fos:user:create
    $ Please choose a username: root
    $ Please choose an email: xxxx@ecedi.fr
    $ Please choose a password: XXXXX
    $ Created user root

Promotion de l'utilisateur au role super admin:

    $ app/console fos:user:promote --super root


### Creation des layouts par défaut

    $ app/console donate:generate:layout

Maintenant vous pouvez aller voir le front office
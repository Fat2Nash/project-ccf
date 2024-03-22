<h1 align="center" >Thiriot Location</h1>
## Installation :
- installer php ( v8.2 )

- installer [Composer](https://getcomposer.org/)

- vérifier que `extension=fileinfo` dans C:\tools\php82\php.ini ( si windows ) est bien décommenté ( enlever le ; )

- pareil pour `extension=pdo_mysql` ( si vous êtes sur Ubuntu, à s'assurer que le driver php_mysql est bien installé )

- même manipulation pour `extension=zip`.

( NOTE: essayez de le lancer à chaque pull d'ailleurs)

  

### A faire lors d'un clone github :

```bash

composer install                          | Installe tout les packages laravel


composer update                           | A faire si besoin
  

yarn / npm install                        | Installe tout les packages nodes

```

Créé le ```.env```  a partire de ```.env.exemple```- installer php ( v8 )

- installer [Composer](https://getcomposer.org/)

- vérifier que `extension=fileinfo` dans C:\tools\php82\php.ini ( si windows ) est bien décommenté ( enlever le ; )

- pareil pour `extension=pdo_mysql` ( si vous êtes sur Ubuntu, à s'assurer que le driver php_mysql est bien installé )

- même manipulation pour `extension=zip`.

- Lancer le script d'installation dans le dossier vroomeco:

( NOTE: essayez de le lancer à chaque pull d'ailleurs)

  

### A faire lors d'un clone github :

```bash

composer install                          | Installe tout les packages laravel

  

yarn / npm install                        | Installe tout les packages nodes

```

Créé le ```.env```  a partir de ```.env.exemple``` (part default laravel 11 utilise SQLite)

```env
DB_CONNECTION=sqlite    # mettre mysql si besoin de mysql 

# DB_HOST=127.0.0.1

# DB_PORT=3306

# DB_DATABASE=laravel

# DB_USERNAME=root

# DB_PASSWORD=

# DB_COLLATION=utf8mb4_general_ci # pour mysql
```

Commande a faire : 

```bash
php artisan migrate        |  Crée le env et migres tout sur la Base de Donner 

php artisan key:generate   | génére une clé d\'application 

php artisan serve          |   lance le server laravel 

npm run dev                |   lance le server node             
```

## Ajouts des Seeder dans la base de donner 

Seeder Client : 
```
    php artisan db:seed --class=ClientSeeder
```

Seeder Engins : 
```
    php artisan db:seed --class=EnginSeeder
```

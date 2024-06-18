<a name="readme-top"></a>
<br />
<div align="center">
 <img src="https://thiriot-locations.com/charte/logo.png" alt="Logo">

  <p align="center">
 Panel de gestion Thiriot-Location
  </p>
</div>

### Prérequis

Afin de pouvoir pleinement utiliser le projet, il y a quelques prérequis : 
* Composer : [Installer Composer](https://getcomposer.org/) <br/>
Pour vérifier la bonne installation de Composer : 
  ```sh
  composer
  ```
* NodeJS : [Installer Composer](https://nodejs.org/en/download) <br/>
Pour vérifier la bonne installation de NodeJS : 
  ```sh
  npm -v
  ```

### Installation

1. Cloner le projet (remplacer ```your_username_``` et ```Project-Name``` par vos informations)"
```sh
git clone https://github.com/your_username_/Project-Name.git
```
OU
  *Télécharger le projet*

2. Installer les packages Composer
```sh
composer install
```
3. Installer les packages NodeJS
```sh
npm install
```
4. Créer une clé d'application 
```bash
cp .env.example .env # Créer le fichier .env

php artisan key:generate
```
5. Créer le fichier ```.env``` à partir du fichier ```.env.example``` et ajuster si besoin :
```env
DB_CONNECTION=sqlite # mettre mysql si besoin de mysql 
  
# DB_HOST=127.0.0.1 ##mettre l'ip du serveur SQL
  
# DB_PORT=3306 #mettre le port d'écoute du serveur SQL

# DB_DATABASE=projet #mettre le nom de la base de donnée souhaité
  
# DB_USERNAME=root #mettre le nom d'utilisateur souhaité
  
# DB_PASSWORD= #mettre le mot de passe pour se connecter
  
# DB_COLLATION=utf8mb4_general_ci # pour mysql
```
## Base de donées

```bash
php artisan migrate  #  Créer la BDD 
```
ou 
```bash
php artisan migrate:fresh  # Recréer la  BDD à vide  si existante
```

## Pré-remplir la base de données

```bash
php artisan db:seed     # Remplir la BDD avec des données de test
```
## Lancer le serveur

```bash
php artisan serve

npm run dev
```



## Avancée


### Globale
![100%](https://progress-bar.dev/100)

#### Quentin
![100%](https://progress-bar.dev/100).
- [x] Stocker les données de localisation/de fonctionnement des engins
- [x] Publier les donées de : 
   - [x] Localisation
   - [x] Fonctionnement
- [x] Déterminer les informations et les horodater
- [x] Gérer les alertes
  - [x] Baisse tension batterie
  
  #### Erwan
![100%](https://progress-bar.dev/100)
- [x] S'authentifier
- [x] Créer les fiches : 
   - [x] Client
   - [x] Engins
   - [x] Location
- [ ] Editer les fiches : 
   - [ ] Client
   - [ ] Engins
   - [ ] Location
- [x] Supprimer les fiches : 
   - [x] Client
   - [x] Engins
   - [x] Location
- [x] Visualiser les engins disponibles
- [x] Rôles et autorisations
 #### Antony
![100%](https://progress-bar.dev/100)
- [x] Visualiser les historiques :
   - [x] Par client
   - [x] Par engin
- [x] Visualiser les engins sur la carte
#### Kasim
![95%](https://progress-bar.dev/95)
- [x] Visualiser la liste des engin à :
  - [x] Livrer
  - [x] Récupérer
- [x] Gérer les maintenance

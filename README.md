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
Pour vérifier la bonne installation de Comoser : 
  ```sh
  composer
  ```
* NodeJS : [Installer Composer](https://nodejs.org/en/download) <br/>
Pour vérifier la bonne installation de NodeJS : 
  ```sh
  npm -v
  ```

### Installation

1. Cloner le projet
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
php artisan key:generate
```
5. Créer le fichier ```.env``` à partir du fichier ```.env.example``` et ajuster si besoin :
```env
DB_CONNECTION=mysql # mettre mysql si besoin de mysql 
  
# DB_HOST=127.0.0.1 ##mettre l'ip du serveur SQL
  
# DB_PORT=3306 #mettre le port d'écoute du serveur SQL

# DB_DATABASE=projet #mettre le nom de la base de donnée souhaité
  
# DB_USERNAME=root #mettre le nom d'utilisateur souhaité
  
# DB_PASSWORD= #mettre le mot de passe pour se connecter
  
# DB_COLLATION=utf8mb4_general_ci # pour mysql
```
## Base de donées

```bash
php artisan migrate  |  Créer la BDD 
```

## Pré-remplir la base de données

```
php artisan db:seed
```


## Avancée

### Personnelle

![70%](https://progress-bar.dev/70)

- [x] S'authentifier
- [x] Créer les fiches : 
   - [x] Client
   - [x] Engins
   - [ ] Location
- [ ] Editer les fiches : 
   - [ ] Client
   - [ ] Engins
   - [ ] Location
- [ ] Supprimer les fiches : 
   - [x] Client
   - [x] Engins
   - [ ] Location
- [x] Visualiser les engins disponibles

### Globale
![60%](https://progress-bar.dev/60)

#### Quentin
- [ ] Stocker les données de localisation/de fonctionnement des engins
- [x] Publier les donées de : 
   - [x] Localisation
   - [ ] Fonctionnement
- [x] Déterminer les informations et les horodater
#### Erwan
- [x] S'authentifier
- [x] Créer les fiches : 
   - [x] Client
   - [x] Engins
   - [ ] Location
- [ ] Editer les fiches : 
   - [ ] Client
   - [ ] Engins
   - [ ] Location
- [ ] Supprimer les fiches : 
   - [x] Client
   - [x] Engins
   - [ ] Location
- [ ] Visualiser les engins disponibles
#### Antony
- [x] Visualiser les historiques :
   - [x] Par client
   - [x] Par engin
- [ ] Visualiser les engins sur la carte
#### Kasim
- [x] Visualiser la liste des engin à :
  - [x] Livrer
  - [x] Récupérer
- [ ] Gérer les maintenance
### Tous
- [ ] Compatibilité téléphones

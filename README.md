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
4. Créer le fichier ```.env``` à partir du fichier ```.env.example``` et ajuster si besoin :
```env
  DB_CONNECTION=sqlite    # mettre mysql si besoin de mysql 
  
  # DB_HOST=127.0.0.1
  
  # DB_PORT=3306
  
  # DB_DATABASE=laravel
  
  # DB_USERNAME=root
  
  # DB_PASSWORD=
  
  # DB_COLLATION=utf8mb4_general_ci # pour mysql
```
## Base de donées

## Avancée

### Personnelle

![50%](https://progress-bar.dev/50)

- [x] S'authentifier
- [x] Créer les fiches : 
    - [x] Client
    - [x] Engins
    - [ ] Location
- [ ] Editer les fiches : 
    - [ ] Client
    - [ ] Engins
    - [ ] Location
- [ ] Visualiser les engins disponibles

### Globale
![40%](https://progress-bar.dev/40)

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
- [ ] Visualiser les engins disponibles
#### Antony
- [x] Visualiser les historiques :
  - [x] Par client
  - [x] Par engin
- [ ] Visualiser les engins sur la carte
#### Kasim
- [ ] Visualiser la liste des engin à :
  - [ ] Livrer
  - [ ] Récupérer
- [ ] Gérer les maintenance
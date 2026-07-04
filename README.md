# FitConnect

Application backend de gestion d'un réseau de salles de sport.

## Technologies

- PHP 8
- MySQL
- PDO
- HTML
- Architecture MVC


## Structure

Le projet utilise une séparation en couches :

- Entities
- Repositories
- Services
- Controllers
- Views


## Base de données

Base utilisée :

fitconnect


Tables :

- salle
- adherent
- abonnement
- seance



## Installation


1. Installer XAMPP

2. Copier le projet dans :

htdocs/fitconnect


3. Créer la base :

fitconnect


4. Importer :

database/fitconnect.sql



## Lancement


Dans le navigateur :

http://localhost/fitconnect/public/


## Règles métier


- Un adhérent appartient à une salle.
- Un adhérent possède un seul abonnement actif.
- Une séance nécessite un abonnement valide.
- Les données utilisent des clés étrangères.
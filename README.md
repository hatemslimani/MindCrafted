# Application de gestion d'examens en ligne, tests et ressources pédagogiques


## À propos

Une plateforme web moderne de gestion d'examens en ligne développée avec Laravel. Cette application permet aux enseignants de créer et gérer des examens, aux étudiants de passer des tests, et aux administrateurs de superviser l'ensemble du système.

## Démonstration

### interface commune

![Home](/screenshots/home.png)
- Interface d'accueil

![Login](/screenshots/login.png)
- Interface de connexion

![Register](/screenshots/register.png)
- Interface d'inscription

![Profile](/screenshots/profile.png)
- Interface de profil

![Reset-password](/screenshots/reset-password.png)
- Interface de réinitialisation de mot de passe

![404](/screenshots/404.png)
- Interface Page introuvable


### Interface Administrateur
![Dashboard Admin](/screenshots/admin/dashboard.png)
- Tableau de bord administrateur

![Gestion Utilisateurs](/screenshots/admin/gestion_des_utilisateurs.png)
- Interface de gestion des utilisateurs

![Ajouter un utilisateur](/screenshots/admin/ajouter_un_utilisateur.png)
- Interface Ajouter un utilisateur

![Modifier un utilisateur](/screenshots/admin/modifier_un_utilisateur.png)
- Interface Modifier un utilisateur

![Liste groupe](/screenshots/admin/liste_groupe.png)
- Interface Liste des groupes

![Nouveau groupe](/screenshots/admin/nouveau_groupe.png)
- Interface Nouveau groupe

![Modifier groupe](/screenshots/admin/modifier_groupe.png)
- Interface Modifier un groupe

![Informations du groupe](/screenshots/admin/informations_du_groupe.png)
- Interface Informations du groupe

![Ajouter etudiant](/screenshots/admin/ajouter_etudiant.png)
- Interface Ajouter un etudiant

![Ajouter une section](/screenshots/admin/ajouter_une_section.png)
- Interface Ajouter une section

![Confirmation de retrait etudiant](/screenshots/admin/Confirmation_de_retrait_etudiant.png)
- Interface Confirmation de retrait etudiant

![Confirmation de retrait section](/screenshots/admin/Confirmation_de_retrait_section.png)
- Interface Confirmation de retrait section

### Interface Enseignant

![Tableau de bord](/screenshots/teacher/dashboard.png)
- Tableau de bord personnalisé

![Mes Sections](/screenshots/teacher/Mes_Sections.png)
- Interface Mes Sections

![Détails de la section](/screenshots/teacher/Détails_de_la_section.png)
- Interface Détails de la section

![Ajouter un examen](/screenshots/teacher/Ajouter_un_examen.png)
- Interface Ajouter un examen

![Ajouter une question](/screenshots/teacher/Ajouter_une_question.png)
- Interface Ajouter une question

![Ajouter un test](/screenshots/teacher/Ajouter_un_test.png)
- Interface Ajouter un test

![Ajouter un cours](/screenshots/teacher/Ajouter_un_cours.png)
- Interface Ajouter un cours

![Passer un examen](/screenshots/teacher/examen.png)
- Interface Passer un examen

### Interface Étudiant

![Tableau de bord](/screenshots/student/dashboard.png)
- Tableau de bord personnalisé

![Mes Sections](/screenshots/student/Mes_Sections.png)
- Mes Sections

![Liste Examens](/screenshots/student/Contenu_du_cours.png)
- Contenu du cours

![Passage Examen](/screenshots/student/passer_examen.png)
- Interface de passage d'examen

![Passage Examen](/screenshots/student/passer_test.png)
- Interface de passage d'un test

![Historique Examens](/screenshots/student/Historique_des_résultats.png)
- Historique des examens, tests passés

## Fonctionnalités Principales

### Pour les Administrateurs
- Gestion complète des utilisateurs (enseignants et étudiants)
- Supervision globale du système
- Tableaux de bord analytiques
- Gestion des matières et des cours
- Création et gestion des départements/filières
- Attribution des enseignants aux cours
- Gestion des années académiques
- Génération de rapports statistiques

### Pour les Enseignants
- Création et gestion des examens
- Suivi des résultats des étudiants
- Gestion des questions et des réponses
- Création de différents types de questions
- Export des résultats
- Création et gestion des cours
- Gestion du contenu des cours
- Organisation des chapitres et leçons
- Ajout de ressources pédagogiques
- Suivi de la progression des étudiants par cours
- Création de quiz par chapitre

### Pour les Étudiants
- Passage des examens en ligne
- Consultation de l'historique des résultats
- Interface utilisateur intuitive
- Suivi de la progression
- Accès aux cours et ressources pédagogiques
- Téléchargement des supports de cours
- Participation aux quiz d'auto-évaluation
- Suivi de progression par matière
- Tableau de bord personnalisé

## Prérequis Techniques

- PHP >= 7.4
- Composer
- Node.js & NPM
- Bootstrap 4
- MySQL 5.7+
- Laravel 8.x
- Navigateur web moderne
## Installation

1. Cloner le dépôt
```bash
git clone https://github.com/votre-nom/systeme-examen.git
cd systeme-examen
```

2. Installer les dépendances PHP
```bash
composer install
```

3. Installer les dépendances JavaScript
```bash
npm install
npm run dev
```

4. Configurer l'environnement
```bash
cp .env.example .env
php artisan key:generate
```

5. Configurer la base de données dans le fichier .env
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=examen_db
DB_USERNAME=votre_utilisateur
DB_PASSWORD=votre_mot_de_passe
```

6. Exécuter les migrations
```bash
php artisan migrate --seed
```

7. Lancer l'application
```bash
php artisan serve
```

## Structure du Projet

- Admin : Gestion complète du système
- Enseignant : Création et gestion des examens, questions, ressources pédagogiques
- Étudiant : Passage des examens et consultation des résultats, accès aux cours et ressources pédagogiques

## Guide d'Utilisation

### Pour les Administrateurs
1. Se connecter
2. Accéder au panneau d'administration
3. Gérer les utilisateurs et les rôles
4. Gérer les sections et les groupes
5. Superviser les examens et les résultats

### Pour les Enseignants
1. S'inscrire/Se connecter
2. Créer un nouvel examen
3. Ajouter des questions
4. Définir les paramètres de l'examen
5. ajouter des ressources pédagogiques
6. Consulter les résultats

### Pour les Étudiants
1. S'inscrire/Se connecter
2. Accéder aux examens, tests et ressources pédagogiques disponibles
3. Passer les examens, tests
4. Consulter l'historique des résultats

## Maintenance

### Commandes Utiles
```bash
# Nettoyer le cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Mettre à jour les dépendances
composer update
npm update && npm run dev
```

## Sécurité
- Authentification sécurisée
- Système de rôles et permissions
- Protection CSRF
- Validation des données
- Sessions sécurisées

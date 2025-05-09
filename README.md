<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

# 📚 Application de Gestion des Réclamations Étudiantes

Ce projet est une application web développée avec Laravel, qui permet aux étudiants de soumettre leurs réclamations a propos leurs ntes d'examens et aux responsables de les consulter, les traiter et y répondre.

## ✨ Fonctionnalités

- Authentification (étudiants et administrateurs)
- Soumission de réclamations par les étudiants
- Suivi de l’état des réclamations (en attente, traitée, rejetée…)
- Réponse des administrateurs
- Réservation de rendez vous avec le professeur

## 🖼️ Aperçu

Voici quelques captures d'écran de l'application :
### Page d'acceuil
![acceuil](https://github.com/user-attachments/assets/a0c200ca-d708-4b9d-8c67-6a53264dd18a)

### 🔐 Page de Connexion
### Professeur
![Login]![prof](https://github.com/user-attachments/assets/fa379fc9-f2a1-4113-acc7-131ba6e3eb5f)

)
### Etudiant
![login étudiant](https://github.com/user-attachments/assets/c6d1b464-5e0f-4e0d-a570-35d1e1fa23f1)

### 📝 Interface Étudiant - Ajouter une réclamation
![Add Reclamation]![ajout rec](https://github.com/user-attachments/assets/e34ec80e-1393-4478-9f72-9d38750f9263)
### Prendre un rendez vous 
![reserve rdv](https://github.com/user-attachments/assets/d3ce28dc-66ec-4437-bac7-1282911b9d1e)


### 📋 Interface Admin - Liste des réclamations
![Admin Dashboard]![ajout rec](https://github.com/user-attachments/assets/7baa02f4-9e85-427c-8539-4e54846fd46b)




---

## ⚙️ À propos de Laravel

Laravel est un framework d'applications web avec une syntaxe expressive et élégante. Il vise à rendre le développement à la fois agréable et créatif pour les développeurs. Laravel simplifie de nombreuses tâches fréquentes dans le développement web, telles que :

-Un moteur de routage rapide et simple

-Un conteneur d'injection de dépendances puissant

-Plusieurs systèmes de stockage pour les sessions et le cache

-Un ORM de base de données intuitif (Eloquent)

-Des migrations de schéma de base de données indépendantes du SGBD

-Un traitement robuste des tâches en arrière-plan (jobs/queues)

-Une diffusion d’événements en temps réel

-Laravel est à la fois accessible et puissant, et offre tous les outils nécessaires au développement d'applications web modernes, évolutives et sécurisées.

## 🚀 Installation 

```bash
git clone https://github.com/ton-username/ton-projet.git
cd ton-projet
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve

<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

# 📚 Application de Gestion des Réclamations Étudiantes

Ce projet est une application web développée avec Laravel, qui permet aux étudiants de soumettre leurs réclamations (administratives, pédagogiques, etc.) et aux responsables de les consulter, les traiter et y répondre.

## ✨ Fonctionnalités

- Authentification (étudiants et administrateurs)
- Soumission de réclamations par les étudiants
- Suivi de l’état des réclamations (en attente, traitée, rejetée…)
- Réponse des administrateurs
- Statistiques des réclamations

## 🖼️ Aperçu

Voici quelques captures d'écran de l'application :

### 🔐 Page de Connexion
![Login](chemin/vers/ton/image-login.png)

### 📝 Interface Étudiant - Ajouter une réclamation
![Add Reclamation](chemin/vers/ton/image-ajout-reclamation.png)

### 📋 Interface Admin - Liste des réclamations
![Admin Dashboard](chemin/vers/ton/image-dashboard-admin.png)

> **Remarque** : remplace `chemin/vers/ton/image.png` par le vrai chemin de ton image (par exemple : `/public/images/login.png` ou un lien absolu GitHub)

---

## ⚙️ À propos de Laravel

Laravel is a web application framework with expressive, elegant syntax...

*Le texte Laravel d'origine suit ci-dessous... (tu peux laisser comme ça ou le raccourcir selon ton besoin)*

---

## 🚀 Installation (optionnel si tu veux le partager)

```bash
git clone https://github.com/ton-username/ton-projet.git
cd ton-projet
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve

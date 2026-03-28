# 📚 BiblioNational Djibouti — Système de Gestion de Bibliothèque Nationale 🇩🇯

---

## 📌 Description

Ce projet est une application web de gestion de bibliothèque nationale développée dans le cadre d'un projet universitaire à l'**Université de Djibouti**.

**BiblioNational Djibouti** est une plateforme SaaS (Software as a Service) conçue sur mesure pour les institutions académiques de la République de Djibouti (UD, UG, ISG, IUT). Elle centralise les ressources documentaires tout en offrant une autonomie totale à chaque établissement, permettant aux étudiants et enseignants d'accéder, réserver et emprunter des ouvrages en ligne, tandis que les bibliothécaires et administrateurs gèrent l'ensemble du système depuis une interface dédiée.

---

## 🎯 Objectifs

- Numériser et moderniser la gestion des bibliothèques universitaires djiboutiennes
- Centraliser les ressources documentaires de plusieurs institutions
- Éviter les conflits d'emprunts et assurer le suivi des retours
- Offrir un accès aux livres numériques (PDF) pour les membres actifs
- Automatiser la gestion des amendes en cas de retard
- Fournir une interface simple, intuitive et accessible à tous les utilisateurs

---

## 👥 Équipe

- **Bilan Souleiman**
- **Liban Ali**
- **Liban Abdourahman**
- **Hasna Mohamed**

Encadré par : **Dr. Moubarak**

---

## ⚙️ Technologies utilisées

- **HTML5**
- **CSS3** (Design Glassmorphism & Dark Mode)
- **JavaScript** (ES6+ / Fetch API)
- **PHP** 8.1+ (avec moteur PDO sécurisé)
- **MySQL** 8.0 (InnoDB)
- **WAMP Server** / **XAMPP**

---

## 🚀 Fonctionnalités

### 🎓 Côté Étudiant & Enseignant

- Consulter le catalogue des ouvrages disponibles
- Rechercher un livre par titre, auteur ou catégorie
- Réserver et emprunter un ouvrage en ligne
- Lire les livres numériques (PDF) via la liseuse intégrée
- Acheter des livres physiques ou numériques en FDJ
- Suivre ses dates de retour en temps réel
- Payer ses amendes en ligne
- Recevoir des notifications (retards, validations, messages)

### 📖 Côté Bibliothécaire

- Se connecter via une authentification sécurisée
- Gérer le catalogue de livres (CRUD + import en masse + scan ISBN)
- Valider les demandes d'emprunt et les paiements
- Suivre les stocks (exemplaires disponibles vs vendus)
- Envoyer des alertes pour les retours, amendes et demandes d'achat

### 🏛️ Côté Super-Administrateur

- Gérer toutes les universités depuis un tableau de bord unique
- Consulter les statistiques globales (emprunts, revenus, membres actifs)
- Administrer les comptes utilisateurs et les rôles de sécurité (RBAC)

---

## 🗂️ Structure du projet

```
bibliodj/
├── /frontend      → Interface utilisateur (HTML, CSS, JS)
├── /backend       → Logique serveur (PHP, PDO, API)
├── /database      → Scripts SQL (création + données de test)
└── /assets        → Images, feuilles de style, scripts JS
```

---

## 🛠️ Installation

1. Installer **WAMP Server** ou **XAMPP** sur votre machine.

2. Cloner le projet :

```bash
git clone https://github.com/votre-username/bibliodj.git
```

3. Placer le dossier `bibliodj` dans le répertoire `www` de WAMP.

4. Créer une base de données `bibliodj` dans **phpMyAdmin**.

5. Importer le fichier SQL :

```
database/bibliodj.sql
```

6. Configurer le fichier `backend/config.php` avec vos identifiants locaux.

7. Lancer le serveur et accéder à :

```
http://localhost/bibliodj
```

---

## 🧪 Tests

Les tests réalisés :

- **Tests unitaires** : vérification des fonctions PHP (calcul d'amendes, validation des rôles, etc.)
- **Tests fonctionnels** : simulation des parcours utilisateur (emprunt, retour, paiement)
- **Tests d'intégration** : vérification de la communication entre le frontend, le backend et la base de données

Résultat : ✔️ Application stable et fonctionnelle

---

## ⚠️ Limites

- Pas de paiement en ligne réel intégré (simulation uniquement)
- Hébergement local uniquement (WAMP Server)
- Pas encore de support mobile natif (application Android/iOS)
- Les notifications sont internes à la plateforme (pas d'email/SMS externe)

---

## 🔮 Améliorations futures

- Intégration d'un vrai système de paiement en ligne (mobile money, carte bancaire)
- Déploiement en ligne sur un hébergeur (ex : `https://biblio.dj`)
- Notifications externes par email et SMS
- Application mobile dédiée (Android & iOS)
- Gestion avancée des rôles et des permissions multi-institutions

---

## 📄 Licence

Projet académique – **Université de Djibouti**

---

## 🙏 Remerciements

Merci à notre encadrant **Dr. Moubarak** pour son accompagnement, ses précieux conseils et son soutien tout au long de ce projet.

Merci également à toutes les institutions académiques de Djibouti pour leur confiance et leur contribution à la réussite de ce travail.

---

*Développé avec passion pour l'excellence académique à Djibouti. 🇩🇯*

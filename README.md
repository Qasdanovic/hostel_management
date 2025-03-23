# Hotel Management System

## Description
Un système de gestion d'hôtel complet conçu pour simplifier les opérations hôtelières, gérer les réservations et améliorer l'interaction avec les clients.

## Fonctionnalités
- Gestion des réservations de chambres
- Enregistrement et départ des clients
- Système de facturation
- Gestion des services en chambre
- Gestion du personnel
- Rapports et analyses

## Étapes d'installation

1. **Cloner le dépôt**
    ```bash
    git clone https://github.com/Qasdanovic/hostel-management.git
    cd hotel-management
    ```

2. **Installer les dépendances**
    ```bash
    composer install
    npm install
    ```

3. **Configurer les variables d'environnement**
    - Copier le fichier `.env.example` en `.env`
    - Modifier les paramètres nécessaires dans `.env`
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. **Configurer la base de données**
    ```bash
    php artisan migrate --seed
    ```

5. **Démarrer l'application**
    ```bash
    php artisan serve
    npm run dev
    ```

## Prérequis
- PHP (>= 8.0)
- Laravel
- MySQL
- Node.js (>= 14)
- npm ou yarn

## Technologies utilisées
- **Backend :** Laravel
- **Base de données :** MySQL
- **Frontend :** Blade

## Contribution
Les pull requests sont les bienvenues. Pour des modifications majeures, veuillez ouvrir une issue d'abord pour discuter des changements proposés.


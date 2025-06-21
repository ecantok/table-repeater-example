## Requirements

- PHP version 8.2 or higher installed.
- MySQL 5.7+
- Composer
- Node.js (18+) and NPM

## Installation Steps

1. **Install Composer Dependencies**
    ```bash
    composer install
    ```
2. **Copy the Configuration File**
    ```bash
    cp .env.example .env
    ```
3. **Generate Application Key**
    ```bash
    php artisan key:generate
    ```
4. **Run Migrations**
    ```bash
     php artisan migrate
    ```
    ###### or, to refresh the database and re-run all migrations:
    ```bash
    php artisan migrate:fresh
    ```

5. **(OPTIONAL) Run Laravel Pint (cs-fixer)**
   Run pint (cs-fixer):
    ```bash
    vendor/bin/pint
    ```
6. **Install NPM Dependencies**
    ```bash
    npm install --no-save
    ```
    ###### or, to update existing dependencies:
    ```bash
    npm update
    ```
7. **Run Vite (for asset compilation & admin theme)**
    ```bash
    npm run build
    ```
8. **Start the Application**
    ```bash
    php artisan serve
    ```
    ## Output
    ```bash
    Laravel development server started: http://localhost:8000
    ```

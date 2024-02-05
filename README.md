# Alumni Records

This system has the following stack:
- No frontend framework
- Bootstrap for styling
- Laravel PHP as backend

### Requirements

- [Node.js >= 18](https://nodejs.org/en)
- [PHP >= 8.1.0](https://www.php.net/downloads.php)
- [Composer]

### Step-by-step Guide
- Open the terminal at laragon's `C:/laragon/www` xampp's `C:/xampp/htdocs` folder
- Clone this repository using ```gh repo clone blastenzo1/AlumniRecords```
- Open the repository using ```cd AlumniRecords```
- Download the PHP dependencies: `composer install --dev`
- Copy the `.env.example` to `.env` in the same directory
- Edit the `.env` file and fill up database credentials
- Generate the app key: `php artisan key:generate
- Before running migration: if using xampp or laragon ensure `mysql` and `apache` are active
- Run database migrations: `php artisan migrate`
- Download the JS dependencies: `npm install -D`

#### Windows

- Run the application: `php artisan serve`
- Open the application using `localhost` or `http://127.0.0.1:8000`

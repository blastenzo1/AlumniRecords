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

### How to Git

#### Create and Switch Branch

- To create a new branch `git branch -b <new-name>`
- To switch to new branch `git checkout <new-name>` or `git switch <new-name>`

#### Merge Branches

- To merge a branch (e.g., `<other-branch>`) into `main`:
  1. Switch to the `main` branch: `git switch main`
  2. Merge the other branch: `git merge --no-ff <other-branch>`

#### Add, Commit, and Push

- Add changes to the staging area: `git add .` (adds all changes)
- Commit changes with a meaningful message: `git commit -m "<your commit message>"`
- Push changes to a branch: `git push origin <your-branch>`
  - If tracking is set up: `git push`

#### Pulling Changes

- To fetch and merge changes from the remote: `git pull`
  - For a cleaner history: `git pull --rebase`

#### VsCode Github
- If you do not like to use the terminal, just use th source control provided in the sidebar of github, it looks like three nodes.

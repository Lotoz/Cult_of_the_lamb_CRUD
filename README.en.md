# 🐑 Cult of the Lamb CRUD

> ⚠️ This application is inspired by the video game **Cult of the Lamb** and is an educational project to practice **Laravel**, **Breeze**, and **Docker**.

## 🇪🇸 README en Español

Esta es la versión en inglés del proyecto. Si deseas ver la documentación en español, consulta el archivo [README.md](README.md).

## 📚 Description

An application developed with **Laravel** and **Laravel Sail** for deployment in containers. It uses **Breeze** for authentication and a custom "Dark/Void" aesthetic based on the video game to manage a CRUD of followers.

The project simulates the management of a cult, allowing you to recruit, edit, and sacrifice followers, with an interface that reacts dynamically depending on the leader who logs in.

## 🚀 Main Features

- ✅ **Secure CRUD**: Complete follower management (Create, Read, Update, Delete) with authorship protection (a leader cannot sacrifice other people's followers).
- 👤 **Dynamic Leaders**: Dashboard that changes aesthetics between **The Lamb** (Red Theme) and **The Goat** (Purple Theme).
- 🔐 **Authentication**: Thematic access and registration system via Laravel Breeze.
````markdown
# 🐑 Cult of the Lamb CRUD

> ⚠️ This application is inspired by the video game **Cult of the Lamb** and is an educational project to practice **Laravel**, **Breeze**, and **Docker**.

## 🇪🇸 Readme (Español)

This is the English version of the README. For the Spanish version, see [README.md](README.md).

## 📚 Description

An application developed with **Laravel** and **Laravel Sail** for containerized deployment. It uses **Breeze** for authentication and a custom "Dark/Void" aesthetic inspired by the game to manage a CRUD of followers.

The project simulates managing a cult: recruit, edit and sacrifice followers, with an interface that adapts depending on the leader that logs in.

## 🚀 Main Features

- ✅ **Secure CRUD**: Full follower management (Create, Read, Update, Delete) with authorship protection (a leader cannot sacrifice other leaders' followers).
- 👤 **Dynamic Leaders**: Dashboard switches between **The Lamb** (red theme) and **The Goat** (purple theme).
- 🔐 **Authentication**: Thematic login/register using Laravel Breeze.
- 🐳 **Containerization**: Development environment with Laravel Sail and Docker.
- 🎨 **Cult Interface**: Dark UI with Tailwind CSS, animations, custom inputs, and game assets.

## 🛠️ Technology Stack

- **Backend**: Laravel 11/12 (PHP 8.2+)
- **Frontend**: Blade templates, Tailwind CSS (Vite)
- **Database**: MySQL 8.0
- **Containers**: Docker & Laravel Sail
- **Authentication**: Laravel Breeze
- **Package managers**: Composer, NPM

---

## 📦 Prerequisites by Operating System

Make sure Docker is installed. You don't need PHP or Composer locally (Sail runs inside containers).

### 🪟 Windows

1. **Docker Desktop** installed and running.
2. **WSL2 (Windows Subsystem for Linux)** installed (Recommended: Debian/Ubuntu).
   - Note: using the WSL2 terminal is recommended for Linux-style commands. If you prefer PowerShell, follow the Windows instructions below.

### 🍎 macOS

1. **Docker Desktop** for Mac installed.
2. Standard terminal (zsh) available.

### 🐧 Linux (Debian/Ubuntu/Arch)

1. **Docker Engine** and **Docker Compose** installed.
2. Your user should be in the `docker` group to run commands without `sudo`.

---

## 🚀 Installation Ritual (Getting Started)

Follow these steps to bring the project up from scratch.

### 1. Clone the repository

```bash
git clone https://github.com/Lotoz/COTL_CRUD.git
cd Cult_of_the_lamb_CRUD/COTL-CRUD/
```

### 2. Install dependencies (generate `vendor`)

⚠️ Critical: The `vendor` directory is not included in the repo. Generate it using a temporary Docker container before using Sail.

#### Option A — Linux / macOS / WSL2 (recommended)

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php84-composer:latest \
    composer install --ignore-platform-reqs
```

#### Option B — Windows PowerShell (no WSL)

```powershell
docker run --rm `
    -v ${PWD}:/var/www/html `
    -w /var/www/html `
    laravelsail/php84-composer:latest `
    composer install --ignore-platform-reqs
```

### 3. Configure environment

```bash
cp .env.example .env
```

### 4. Start the cult (bring up Docker)

```bash
./vendor/bin/sail up -d
```

On Windows PowerShell, if you have PHP locally installed use `php vendor/bin/sail up -d`; otherwise run `docker compose up -d`.

### 5. Final configuration

Once containers are running (`./vendor/bin/sail ps`), finish setup:

```bash
# 1. Generate application key
./vendor/bin/sail artisan key:generate

# 2. Run migrations and seed initial leaders
./vendor/bin/sail artisan migrate --seed

# 3. Install frontend dependencies
./vendor/bin/sail npm install

# 4. Compile assets (dev)
./vendor/bin/sail npm run dev
```

Windows PowerShell equivalents using `docker compose run --rm laravel.test` are provided in the Spanish README.

### 6. Access the application

Open your browser at: http://localhost

## 🔐 Default credentials

| Email         | Password    |
|---------------|-------------|
| lamb@cult.com | password123 |
| goat@cult.com | password123 |

Note: You can register new users and choose your leader type (`Lamb` or `Goat`).

## 📁 Project structure

```text
📁 COTL-CRUD
├── 📁 app/
│   ├── 📁 Http/Controllers/   # FollowerController (secure CRUD logic)
│   └── 📁 Models/             # User and Follower models
├── 📁 database/
│   └── 📁 seeders/            # DatabaseSeeder (creates Lamb and Goat)
├── 📁 public/img/             # Assets (gifs and leader avatars)
├── 📁 resources/views/
│   ├── 📁 auth/               # Custom login/register (dark aesthetic)
│   ├── 📁 followers/          # CRUD views (index, create, edit)
│   ├── 📄 dashboard.blade.php # Dynamic main panel
│   └── 📄 welcome.blade.php   # Animated landing page
├── 📝 docker-compose.yml      # Sail services configuration
└── 📝 README.md               # Spanish README
```

## 🐳 Useful Sail commands

If you don't create an alias, prefix Sail commands with `./vendor/bin/sail`.

| Action | Command (alias) | Full command |
|---|---:|---|
| Start (background) | `sail up -d` | `./vendor/bin/sail up -d` |
| Stop | `sail stop` | `./vendor/bin/sail stop` |
| Remove volumes | `sail down -v` | `./vendor/bin/sail down -v` |
| View logs | `sail logs -f` | `./vendor/bin/sail logs -f` |
| Enter container | `sail shell` | `./vendor/bin/sail shell` |
| Run Artisan | `sail artisan <command>` | `./vendor/bin/sail artisan <command>` |
| Compile assets (dev) | `sail npm run dev` | `./vendor/bin/sail npm run dev` |

### Tip: create the `sail` alias

On Linux / macOS / WSL2:

```bash
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
```

On Windows PowerShell:

```powershell
function sail { sh vendor/bin/sail $args }
```

### Screenshots

Welcome page and dashboard GIFs/screenshots are in the `pictures/` folder and referenced in `README.md`.

## 📄 License

This project is licensed under MIT. See [LICENSE](LICENSE) for details.

---

Made with 🐑 by [Lotoz](https://github.com/Lotoz).
May your cult prosper!
Based on the video game Cult of the Lamb — educational project.

````


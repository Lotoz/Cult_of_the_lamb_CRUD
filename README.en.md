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
- 🐳 **Containerization**: Standardized development environment with Laravel Sail.
- 🎨 **Cult Interface**: Dark design with Tailwind CSS, animations, custom inputs, and game assets.

## 🛠️ Technology Stack

- **Backend**: Laravel 11/12 (PHP 8.2+)
- **Frontend**: Blade Templates, Tailwind CSS (Vite)
- **Database**: MySQL 8.0
- **Container**: Docker & Laravel Sail
- **Authentication**: Laravel Breeze
- **Package Managers**: Composer, NPM

---

## 📦 Prerequisites by Operating System

Before you start, make sure you have Docker installed. You don't need to install PHP or Composer on your local machine.

### 🪟 Windows

1. **Docker Desktop** installed and running.
2. **WSL2 (Windows Subsystem for Linux)** installed (Recommended: Ubuntu).
   - *Note:* It is highly recommended to use the **WSL2 (Ubuntu)** terminal to run Linux commands. If you prefer to use **PowerShell**, follow the specific instructions below.

### 🍎 Mac (macOS)

1. **Docker Desktop** for Mac installed.
2. Standard terminal (zsh).

### 🐧 Linux (Ubuntu/Debian/Arch)

1. **Docker Engine** and **Docker Compose** installed.
2. Your user must be in the `docker` group (to run without `sudo`).

---

## 🚀 Installation Ritual (Getting Started Guide)

Follow these steps to bring up the project from scratch.

### 1. Clone the Repository

```bash
git clone https://github.com/Lotoz/COTL_CRUD.git
cd COTL-CRUD
```

### 2. Install Dependencies (Generate vendor folder)

> ⚠️ Critical Step: Since the vendor folder is not uploaded to GitHub, we need to generate it using a temporary Docker container before we can use Sail.

#### 👉 Option A: Linux, macOS, or Windows (WSL2 Terminal - Ubuntu)
Copy and paste this block in your terminal

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php84-composer:latest \
    composer install --ignore-platform-reqs
```

#### 👉 Option B: Windows (PowerShell only)
If you are not using WSL and are in PowerShell, use this command

```powershell
docker run --rm `
    -v ${PWD}:/var/www/html `
    -w /var/www/html `
    laravelsail/php84-composer:latest `
    composer install --ignore-platform-reqs
```

### 3. Configure Environment

Copy the example environment file and generate an application key:

```bash
cp .env.example .env
```

### 4. Start the Cult (Start Docker)

Now that we have the dependencies, we can bring up the containers.

#### On Linux, Mac, and WSL2

```bash
./vendor/bin/sail up -d
```

#### On Windows PowerShell

```powershell
# If you have PHP installed locally:
php vendor/bin/sail up -d

# If you do NOT have PHP local, use docker compose directly:
docker compose up -d
```

### 5. Final Configuration

Once the containers are running (verify with ./vendor/bin/sail ps), run these commands to finish the ritual:

```bash
# 1. Generate the app encryption key
./vendor/bin/sail artisan key:generate

# 2. Run migrations and create the leaders (Seeders)
./vendor/bin/sail artisan migrate --seed

# 3. Install frontend dependencies (Tailwind/Vite)
./vendor/bin/sail npm install

# 4. Compile styles (Assets)
./vendor/bin/sail npm run dev
```

### 6. Access the Application

Open your browser and visit [http://localhost](http://localhost)

## 🔐 Cult Credentials

| Email         | Password    |
|---------------|-------------|
| lamb@cult.com | password123 |
| goat@cult.com | password123 |

> **Note:** You can register new users. When you do, you can choose whether your nature is "Lamb" or "Goat" in the registration form.

## 📁 Project Structure

```text
📁 COTL-CRUD
├── 📁 app/
│   ├── 📁 Http/Controllers/   # FollowerController (Secure CRUD Logic)
│   └── 📁 Models/             # User and Follower Models
├── 📁 database/
│   └── 📁 seeders/            # DatabaseSeeder (Creates Lamb and Goat)
├── 📁 public/img/             # Assets (Gifs and Leader Avatars)
├── 📁 resources/views/
│   ├── 📁 auth/               # Custom Login/Register (Dark Aesthetic)
│   ├── 📁 followers/          # CRUD Views (Index, Create, Edit)
│   ├── 📄 dashboard.blade.php # Dynamic main panel
│   └── 📄 welcome.blade.php   # Animated Landing Page
├── 📝 docker-compose.yml      # Sail services configuration
└── 📝 README.md               # Documentation
```

## 🐳 Useful Laravel Sail Commands

For ease of use, it is recommended to set up an alias (see below). If you don't use an alias, remember that you must write `./vendor/bin/sail` before each command (or `vendor\bin\sail` in Windows PowerShell).

| Action | Command (With Alias) | Full Command (Without Alias) |
| :--- | :--- | :--- |
| **Start** (Background) | `sail up -d` | `./vendor/bin/sail up -d` |
| **Stop** (Turn off) | `sail stop` | `./vendor/bin/sail stop` |
| **Delete everything** (Volumes) | `sail down -v` | `./vendor/bin/sail down -v` |
| **View Logs** | `sail logs -f` | `./vendor/bin/sail logs -f` |
| **Enter container** | `sail shell` | `./vendor/bin/sail shell` |
| **Run Artisan** | `sail artisan <command>` | `./vendor/bin/sail artisan <command>` |
| **Compile Assets (Dev)** | `sail npm run dev` | `./vendor/bin/sail npm run dev` |

### 💡 Tip: How to create the "sail" Alias

To avoid having to write `./vendor/bin/sail` all the time:

**On Linux / Mac / WSL2:**
Run this command in your terminal:

```bash
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
```

**On Windows PowerShell:**
Run this command in your PowerShell:

```powershell
function sail { sh vendor/bin/sail $args }
```

## 📄 License

This project is under the MIT License. See the [LICENSE](LICENSE) file for more details.

---

Made with 🐑 by [Lotoz](https://github.com/Lotoz).
May your cult prosper!
Based on the video game Cult of the Lamb - Educational Project

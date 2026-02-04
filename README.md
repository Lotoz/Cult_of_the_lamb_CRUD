# 🐑 Cult of the Lamb CRUD

> ⚠️ Esta aplicación está inspirada en el videojuego **Cult of the Lamb** y es un proyecto educativo para practicar **Laravel**, **Breeze** y **Docker**.

## 🇺🇸 Readme EN

This is the Spanish version of the README. For the English version, see the file [README.en.md](README.en.md).

## 📚 Descripción

Aplicación desarrollada con **Laravel** y **Laravel Sail** para su despliegue en contenedores. Utiliza **Breeze** para la autenticación y una estética personalizada "Dark/Void" basada en el videojuego para gestionar un CRUD de seguidores.

El proyecto simula la gestión de un culto, permitiendo reclutar, editar y sacrificar adeptos, con una interfaz que reacciona dinámicamente según el líder que inicie sesión.

## 🚀 Características Principales

- ✅ **CRUD Seguro**: Gestión completa de seguidores (Create, Read, Update, Delete) con protección de autoría (un líder no puede sacrificar adeptos ajenos).
- 🔐 **Autenticación**: Sistema de acceso y registro temático mediante Laravel Breeze.
- 🐳 **Containerización**: Entorno de desarrollo estandarizado con Laravel Sail.
- 🎨 **Interfaz de Culto**: Diseño oscuro con Tailwind CSS, animaciones, inputs personalizados y assets del juego.

## 🛠️ Stack Tecnológico

- **Backend**: Laravel 11/12 (PHP 8.2+)
- **Frontend**: Blade Templates, Tailwind CSS (Vite)
- **Base de Datos**: MySQL 8.0
- **Contenedor**: Docker & Laravel Sail
- **Autenticación**: Laravel Breeze
- **Gestor de Paquetes**: Composer, NPM

---

## 📦 Requisitos Previos por Sistema Operativo

Antes de empezar, asegúrate de tener instalada la base de Docker. No necesitas instalar PHP ni Composer en tu máquina local.

### 🪟 Windows

1. **Docker Desktop** instalado y corriendo.
2. **WSL2 (Windows Subsystem for Linux)** instalado (Recomendado: Ubuntu).
   - *Nota:* Se recomienda encarecidamente usar la terminal de **WSL2 (Ubuntu)** para ejecutar los comandos de Linux. Si prefieres usar **PowerShell**, sigue las instrucciones específicas más abajo.

### 🍎 Mac (macOS)

1. **Docker Desktop** para Mac instalado.
2. Terminal estándar (zsh).

### 🐧 Linux (Ubuntu/Debian/Arch)

1. **Docker Engine** y **Docker Compose** instalados.
2. Tu usuario debe estar en el grupo `docker` (para ejecutar sin `sudo`).

---

## 🚀 Ritual de Instalación (Guía de Arranque)

Sigue estos pasos para levantar el proyecto desde cero.

### 1. Clonar el Repositorio

```bash
git clone [https://github.com/Lotoz/COTL_CRUD.git](https://github.com/Lotoz/COTL_CRUD.git)
cd COTL_CRUD
```

### 2. Instalar Dependencias (Generar carpeta vendor)

> ⚠️ Paso Crítico: Como la carpeta vendor no se sube a GitHub, necesitamos generarla usando un contenedor temporal de Docker antes de poder usar Sail.

#### 👉 Opción A: Linux, macOS o Windows (Terminal WSL2 - Ubuntu) Copia y pega este bloque en tu terminal

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php84-composer:latest \
    composer install --ignore-platform-reqs
```

#### 👉 Opción B: Windows (Solo si usas PowerShell) Si no usas WSL y estás en PowerShell, usa este comando

```powershell
docker run --rm `
    -v ${PWD}:/var/www/html `
    -w /var/www/html `
    laravelsail/php84-composer:latest `
    composer install --ignore-platform-reqs
```

### 3. Configurar Entorno

Copia el archivo de entorno de ejemplo y genera una clave de aplicación:

```bash
cp .env.example .env
```

### 4. Arrancar el Culto (Levantar Docker)

Ahora que ya tenemos las dependencias, podemos levantar los contenedores.

#### En Linux, Mac y WSL2

```bash
./vendor/bin/sail up -d
```

#### En PowerShell de Windows

```powershell
# Si tienes PHP instalado localmente:
php vendor/bin/sail up -d

# Si NO tienes PHP local, usa directamente docker compose:
docker compose up -d
```

### 5. Configuración Final

Una vez los contenedores estén corriendo (verifícalo con ./vendor/bin/sail ps), ejecuta estos comandos para finalizar el ritual:

```bash
# 1. Generar la llave de encriptación de la app
./vendor/bin/sail artisan key:generate

# 2. Ejecutar migraciones y crear los líderes (Seeders)
./vendor/bin/sail artisan migrate --seed

# 3. Instalar dependencias de Frontend (Tailwind/Vite)
./vendor/bin/sail npm install

# 4. Compilar los estilos (Assets)
./vendor/bin/sail npm run dev
```

### 6. Acceder a la Aplicación

Abre tu navegador y visita [http://localhost](http://localhost)

## 🔐 Credenciales del Culto

| Email         | Contraseña  |
|---------------|-------------|
|<lamb@cult.com>| password123 |
|<goat@cult.com>| password123 |

> **Nota:** Puedes registrar nuevos usuarios. Al hacerlo, podrás elegir si tu naturaleza es "Lamb" o "Goat" en el formulario de registro.

## 📁 Estructura del Proyecto

```text
📁 COTL-CRUD
├── 📁 app/
│   ├── 📁 Http/Controllers/   # FollowerController (Lógica CRUD segura)
│   └── 📁 Models/             # Modelos User y Follower
├── 📁 database/
│   └── 📁 seeders/            # DatabaseSeeder (Crea a Lamb y Goat)
├── 📁 public/img/             # Assets (Gifs y Avatares de los líderes)
├── 📁 resources/views/
│   ├── 📁 auth/               # Login/Register personalizados (Estética Dark)
│   ├── 📁 followers/          # Vistas del CRUD (Index, Create, Edit)
│   ├── 📄 dashboard.blade.php # Panel principal dinámico
│   └── 📄 welcome.blade.php   # Landing Page animada
├── 📝 docker-compose.yml      # Configuración de servicios Sail
└── 📝 README.md               # Documentación
```

## 🐳 Comandos Laravel Sail Útiles

Para facilitar el uso, se recomienda configurar un alias (ver abajo). Si no usas alias, recuerda que debes escribir `./vendor/bin/sail` antes de cada comando (o `vendor\bin\sail` en Windows PowerShell).

| Acción | Comando (Con Alias) | Comando Completo (Sin Alias) |
| :--- | :--- | :--- |
| **Iniciar** (Segundo plano) | `sail up -d` | `./vendor/bin/sail up -d` |
| **Detener** (Apagar) | `sail stop` | `./vendor/bin/sail stop` |
| **Borrar todo** (Volúmenes) | `sail down -v` | `./vendor/bin/sail down -v` |
| **Ver Logs** | `sail logs -f` | `./vendor/bin/sail logs -f` |
| **Entrar al contenedor** | `sail shell` | `./vendor/bin/sail shell` |
| **Ejecutar Artisan** | `sail artisan <comando>` | `./vendor/bin/sail artisan <comando>` |
| **Compilar Assets (Dev)** | `sail npm run dev` | `./vendor/bin/sail npm run dev` |

### 💡 Tip: Cómo crear el Alias "sail"

Para no tener que escribir `./vendor/bin/sail` todo el tiempo:

**En Linux / Mac / WSL2:**
Ejecuta este comando en tu terminal:

```bash
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
```

**En Windows PowerShell:**
Ejecuta este comando en tu PowerShell:

```powershell
function sail { sh vendor/bin/sail $args }
```

## 📄 Licencia

Este proyecto está bajo la licencia MIT. Consulta el archivo [LICENSE](LICENSE) para más detalles.

---

<div align="center"> <sub>Hecho con 🐑 por <a href="https://github.com/Lotoz">Lotoz.</a></sub>
<br>
<sub>¡Que tu culto prospere!</sub>  
<br>
<sub>Basado en el videojuego Cult of the Lamb - Proyecto Educativo</sub> </div>
# 🐑 Cult of the Lamb CRUD

> ⚠️ Esta API está basada en el videojuego **Cult of the Lamb** y es un proyecto educativo para practicar **Laravel** y **Docker**.

## Readme EN

This is the Spanish version of the README. For the English version, see the file [README.en.md](README.en.md).

## 📚 Descripción

Aplicacion creada con lavarel sail para su despliegue, y usando breeze y blueprint. Para crear un crud basico.

## 🚀 Características Principales

- ✅ **CRUD Completo** de seguidores (Create, Read, Update, Delete)
- 👤 **Gestión de Perfiles** - Actualizar información de usuario
- 🔐 **Autenticación Segura** - Sistema de login y registro con Breeze
- 🐳 **Containerización con Docker** - Despliegue fácil con Laravel Sail
- 🎨 **Interfaz Responsiva** - Diseño moderno con Tailwind CSS
- 📱 **Vistas Blade** - Templates dinámicas con Laravel Blade

## 🛠️ Stack Tecnológico

- **Backend**: Laravel 11
- **Frontend**: Blade Templates, Tailwind CSS
- **Base de Datos**: MySQL 8.0
- **Contenedor**: Docker & Docker Compose
- **Autenticación**: Laravel Breeze
- **Build Tool**: Vite
- **Gestor de Paquetes**: Composer (PHP), NPM (JavaScript)

## 📦 Requisitos Previos

- **Docker Desktop** instalado en tu máquina (versión 20.10+)
- **Docker Compose** (incluido en Docker Desktop)
- **Git** para clonar el repositorio
- **Mínimo 2GB de RAM** disponible para los contenedores
- Puertos **80**, **3306** y **6379** disponibles en tu máquina local

## 🔐 Credenciales de Prueba

Después de ejecutar el setup, puedes usar estas credenciales para probar la API:

| Email         | Contraseña  |
|---------------|-------------|
|<lamb@cult.com>| password123 |
|<goat@cult.com>| password123 |

> **Nota:** Puedes crear nuevos usuarios en el registro.

## 📁 Estructura del Proyecto

```txt
📁 COTL-CRUD
├── 📁 app/ # Núcleo de la aplicación - Lógica empresarial
│   ├── 📁 Http/ # Componentes HTTP de Laravel
│   │   ├── 📁 Controllers/ # Controladores que manejan la lógica de negocio
│   │   │   ├── 📁 Auth/ # Controladores de autenticación de Breeze (Login, Registro, Verificación)
│   │   │   ├── 🐘 Controller.php # Clase base para todos los controladores
│   │   │   ├── 🐘 FollowerController.php # Controlador de seguidores - Maneja CRUD de followers
│   │   │   └── 🐘 ProfileController.php # Controlador de perfil - Gestiona datos del usuario
│   │   └── 📁 Requests/ # Form Requests - Validación de entrada de datos
│   ├── 📁 Models/ # Modelos Eloquent - Representan tablas de BD
│   │   ├── 🐘 Follower.php # Modelo de Followers - Relación Many-to-Many con Users
│   │   └── 🐘 User.php # Modelo de Usuario - Contiene información del usuario
│   ├── 📁 Providers/ # Service Providers - Registro de servicios de la aplicación
│   │   └── 🐘 AppServiceProvider.php # Proveedor principal de servicios
│   └── 📁 View/ # Componentes Vue o PHP para vistas
│       └── 🐘 Components/ # Componentes reutilizables (AppLayout, GuestLayout)
├── 📁 bootstrap/ # Archivos de arranque de la aplicación
│   ├── 🐘 app.php # Instancia principal de la aplicación
│   ├── 🐘 providers.php # Carga de proveedores de servicios
│   └── 📁 cache/ # Caché de arranque de la aplicación
├── 📁 config/ # Archivos de configuración de Laravel
├── 📁 database/ # Migraciones y seeds de base de datos
│   └── 📁 seeders/ # Seeds para llenar la BD con datos iniciales
│       └── 🐘 DatabaseSeeder.php # Seeder principal
├── 📁 public/ # Carpeta pública accesible desde el navegador
│   └── 📁 img/ # Imágenes específicas de la aplicación (iconos, logos, etc.)
├── 📁 resources/ # Recursos frontend (vistas, CSS, JavaScript)
│   └── 📁 views/ # Plantillas Blade de Laravel
│       ├── 📁 followers/ # Vistas del CRUD de followers
│       │   ├── 🐘 create.blade.php # Formulario para crear follower
│       │   ├── 🐘 edit.blade.php # Formulario para editar follower
│       │   └── 🐘 index.blade.php # Listado de followers
│       ├── 📁 layouts/ # Layouts principales de la aplicación
│       │   └── 🐘 app.blade.php # Layout principal para rutas autenticadas
│       ├── 📁 profile/ # Vistas de perfil de usuario
│       ├── 🐘 dashboard.blade.php # Página principal después del login
│       └── 🐘 welcome.blade.php # Página de bienvenida
├── 📁 routes/ # Definición de rutas de la aplicación
│   ├── 🐘 web.php # Rutas principales (GET, POST, etc.)
│   ├── 🐘 auth.php # Rutas de autenticación (Breeze)
│   └── 🐘 console.php # Comandos de consola Artisan personalizados
├── 📁 storage/ # Almacenamiento de archivos y logs
├── 📁 tests/ # Tests unitarios y funcionales
├── ⚙️ .env.example # Plantilla de variables de entorno (copiar a .env)
├── 📄 composer.json # Dependencias de PHP y configuración de Composer
├── 📄 package.json # Dependencias de Node.js (Tailwind, Vite, etc.)
├── 📄 phpunit.xml # Configuración de tests PHPUnit
├── 📄 postcss.config.js # Configuración de PostCSS
├── 📄 tailwind.config.js # Configuración de Tailwind CSS
├── 📄 vite.config.js # Configuración del bundler Vite
├── 📝 artisan # CLI de Laravel (comandos Artisan)
├── 📝 compose.yaml # Configuración de Docker Compose
└── 📝 README.md # Este archivo
```

## 📸 Referencias Visuales

En la carpeta `pictures/` encontrarás capturas de pantalla de la aplicación mostrando las diferentes vistas y funcionalidades del CRUD.

## 🐳 Comandos Laravel Sail Útiles

```bash
# Iniciar contenedores
./vendor/bin/sail up -d

# Ver logs en tiempo real
./vendor/bin/sail logs -f

# Ejecutar comandos artisan
./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan db:seed
./vendor/bin/sail artisan tinker

# Acceder a la shell del contenedor
./vendor/bin/sail shell

# Detener contenedores
./vendor/bin/sail down

# Parar y borrar información (base de datos, caché, etc.)
./vendor/bin/sail down -v

# Reiniciar contenedores
./vendor/bin/sail restart

# Instalar dependencias
./vendor/bin/sail composer install
./vendor/bin/sail npm install

# Compilar assets (CSS, JS)
./vendor/bin/sail npm run build
./vendor/bin/sail npm run dev
```

## 🚀 Guía de Instalación Rápida

1. **Clonar el repositorio:**

   ```bash
    git clone https://github.com/Lotoz/COTL_CRUD.git
    cd COTL_CRUD
   ```

2. **Copiar archivo de configuración:**

   ```bash
   cp .env.example .env
   ```

3. **Instalar dependencias (sin Docker):**

   ```bash
   composer install
   npm install
   ```

4. **Generar clave de aplicación:**

   ```bash
   php artisan key:generate
   ```

5. **Iniciar con Laravel Sail:**

   ```bash
   ./vendor/bin/sail up -d
   ```

6. **Ejecutar migraciones y seeders:**

   ```bash
   ./vendor/bin/sail artisan migrate --seed
   ```

7. **Acceder a la aplicación:**
   - Abre tu navegador en: `http://localhost`
   - Usa las credenciales de prueba para ingresar

## 📄 Licencia

Este proyecto está bajo la **Licencia MIT**. Consulta el archivo [LICENSE](LICENSE) para más detalles.

---

<div align="center">
  <sub>Desarrollado con ❤️ por <a href="https://github.com/Lotoz">Lotoz</a></sub>
  <br>
  <sub>Basado en el videojuego Cult of the Lamb - Proyecto Educativo</sub>
</div>

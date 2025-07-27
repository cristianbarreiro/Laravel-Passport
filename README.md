# Laravel Passport Auth API

Este proyecto es una API en Laravel que utiliza **Laravel Passport** para autenticación basada en tokens.
Además, incluye Laravel Breeze para manejo de autenticación básica con Blade.

## 🚀 Requisitos

- PHP >= 8.0
- Composer
- MySQL o PostgreSQL
- Node.js y NPM
- Laravel >= 8

## 🛠 Instalación

1. Clona el repositorio:

```bash
git clone https://github.com/tu-usuario/laravel-passport-auth.git
cd laravel-passport-auth
```

2. Instala las dependencias de Composer:

```bash
composer install
```

3. Copia el archivo `.env` y configura las variables:

```bash
cp .env.example .env
php artisan key:generate
```

4. Configura tu base de datos en el archivo `.env`.

5. Ejecuta las migraciones:

```bash
php artisan migrate
```

6. Instala Passport y genera las claves:

```bash
php artisan passport:install
```

7. Configura Passport en `AuthServiceProvider.php`:

```php
use Laravel\Passport\Passport;

public function boot()
{
    $this->registerPolicies();
    Passport::routes();
}
```

8. En `config/auth.php`, configura el driver:

```php
'api' => [
    'driver' => 'passport',
    'provider' => 'users',
],
```

9. Instala Laravel Breeze con Blade:

```bash
composer require laravel/breeze --dev
php artisan breeze:install blade
npm install && npm run dev
php artisan migrate
```

## 🧪 Endpoints de prueba

Puedes usar herramientas como [Postman](https://www.postman.com/) para probar los siguientes endpoints:

- **POST** `/api/register`: Registrar usuario
- **POST** `/api/login`: Login y obtener token
- **GET** `/api/user`: Obtener usuario autenticado (requiere token)

También puedes usar la interfaz web para registro e inicio de sesión desde el navegador.

## 📂 Estructura del proyecto

- `app/Models/User.php`: Usa el trait `HasApiTokens`.
- `routes/api.php`: Rutas públicas y protegidas para API.
- `routes/web.php`: Rutas para frontend (Breeze).
- `resources/views`: Contiene las vistas Blade generadas por Breeze.
- `app/Providers/AuthServiceProvider.php`: Registro de Passport.

## ✅ Comandos útiles

```bash
php artisan migrate:fresh --seed
php artisan passport:install
php artisan route:list
npm run dev
```

## 🧑‍💻 Autor

Cris Barreiro – [GitHub](https://github.com/cristianbarreiro)

## 📝 Licencia

Este proyecto está licenciado bajo la MIT License.

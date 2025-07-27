# Laravel Passport API Authentication

Este proyecto es un ejemplo básico para implementar autenticación API usando Laravel Passport.

---

## Contenido

- [Descripción](#descripción)
- [Requisitos](#requisitos)
- [Instalación](#instalación)
- [Configuración](#configuración)
- [Uso](#uso)
- [Recursos](#recursos)

---

## Descripción

Este repositorio contiene un proyecto Laravel que integra Passport para manejar autenticación basada en OAuth2 con tokens para APIs RESTful.

El proyecto está basado en el tutorial disponible en [YouTube - Laravel Passport Tutorial](https://www.youtube.com/watch?v=WmCltXsEHYk&list=PLuCubSrRSzHZKYeo9LFd7siI2sogpOvCX&index=3)

---

## Requisitos

- PHP >= 8.0
- Composer
- Laravel >= 9.x
- MySQL o cualquier otra base de datos soportada por Laravel
- Node.js y npm (para assets, opcional)
- Git

---

## Instalación

1. Clona el repositorio

```bash
git clone https://github.com/cristianbarreiro/Laravel-Passport.git
cd Laravel-Passport
```

2. Instala las dependencias de PHP con Composer

```bash
composer install
```

3. Copia el archivo de configuración de entorno

```bash
cp .env.example .env
```

4. Configura la base de datos en `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tu_base_de_datos
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña
```

5. Genera la clave de la aplicación

```bash
php artisan key:generate
```

6. Ejecuta las migraciones

```bash
php artisan migrate
```

7. Instala Laravel Passport

```bash
php artisan passport:install
```

8. (Opcional) Compila los assets

```bash
npm install
npm run dev
```

---

## Configuración

- En el modelo `User.php`, asegúrate de usar el trait `HasApiTokens`:

```php
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    ...
}
```

- En `AuthServiceProvider.php` registra Passport:

```php
use Laravel\Passport\Passport;

public function boot()
{
    $this->registerPolicies();
    Passport::routes();
}
```

- Configura el guard API en `config/auth.php` para usar `passport`:

```php
'guards' => [
    'api' => [
        'driver' => 'passport',
        'provider' => 'users',
    ],
],
```

---

## Uso

- Para registrar un usuario, envía un POST a:

```
POST /api/register
```

- Para iniciar sesión y obtener un token:

```
POST /api/login
```

- Para acceder a rutas protegidas, usa el token en el header:

```
Authorization: Bearer {token}
```

---

## Recursos

- [Laravel Passport Docs](https://laravel.com/docs/10.x/passport)
- [Tutorial YouTube completo](https://www.youtube.com/watch?v=WmCltXsEHYk&list=PLuCubSrRSzHZKYeo9LFd7siI2sogpOvCX&index=3)

---

## Autor

Cristian Barreiro  
[GitHub](https://github.com/cristianbarreiro)

---

## Licencia

Este proyecto es software libre bajo la licencia MIT.

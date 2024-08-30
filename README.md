# Proyecto Laravel

Este proyecto está desarrollado con Laravel y utiliza migraciones, seeders y roles básicos de usuarios para su administración.

## Instalación

1. **Clona el repositorio:**

    ```bash
    git clone <URL_DEL_REPOSITORIO>
    cd <NOMBRE_DEL_DIRECTORIO>
    ```

2. **Instala las dependencias del proyecto:**

    ```bash
    composer install
    ```

3. **Configura el archivo de entorno:**

    Copia el archivo de ejemplo y configúralo con tus datos:

    ```bash
    cp .env.example .env
    ```

    Luego, edita `.env` para configurar la conexión a la base de datos y otras variables de entorno según tus necesidades.

4. **Genera la clave de aplicación:**

    ```bash
    php artisan key:generate
    ```

5. **Ejecuta las migraciones y los seeders:**

    ```bash
    php artisan migrate:fresh --seed
    ```

    Esto recreará la base de datos y cargará datos iniciales en las tablas.

## Usuarios Predeterminados

Se crean dos usuarios predeterminados en la base de datos:

- **Usuario:**
  - **Email:** `usuario@gmail.com`
  - **Contraseña:** `123456`
  - **Permisos:** Solo puede acceder a visualizar tablas.

- **Administrador:**
  - **Email:** `admin@gmail.com`
  - **Contraseña:** `123456`
  - **Permisos:** Puede crear estudiantes, cursos y profesores.

## Uso

Inicia el servidor de desarrollo:

```bash
php artisan serve

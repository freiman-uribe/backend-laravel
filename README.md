# Proyecto de Gestión de Docentes y Materias

Este proyecto permite gestionar docentes y materias, incluyendo funcionalidades de registro, login, cierre de sesión, y operaciones CRUD (Crear, Leer, Actualizar, Eliminar) tanto para docentes como para materias. El sistema de autenticación utiliza JWT y la base de datos está en MariaDB. El proyecto sigue el patrón de diseño DDD (Domain-Driven Design) con las rutas `Application/Services`, `Domain/Models`, `Infrastructure/Repositories`, `Interfaces/Http/Controllers`.

## Funcionalidades

- Registro de usuarios
- Login de usuarios
- Cierre de sesión
- Crear docentes
- Listar docentes (completo o paginado)
- Editar docentes
- Eliminar docentes
- Asignar materias a docentes
- Crear materias
- Listar materias (completo o paginado)
- Editar materias
- Eliminar materias

## Rutas de la API

### Autenticación

- **Registro**: `POST /api/register`
  - Cuerpo de la solicitud:
    ```json
    {
      "name": "Nombre del Usuario",
      "email": "usuario@example.com",
      "password": "password123",
      "password_confirmation": "password123"
    }
    ```

- **Login**: `POST /api/login`
  - Cuerpo de la solicitud:
    ```json
    {
      "email": "usuario@example.com",
      "password": "password123"
    }
    ```

- **Logout**: `POST /api/logout` (Requiere autenticación)
  - Encabezado:
    ```
    Authorization: Bearer {token}
    ```

### Docentes

- **Crear docente**: `POST /api/docentes` (Requiere autenticación)
  - Encabezado:
    ```
    Authorization: Bearer {token}
    ```
  - Cuerpo de la solicitud:
    ```json
    {
      "nombre": "Nombre del Docente",
      "email": "docente@example.com",
      "password": "password123",
      "password_confirmation": "password123"
    }
    ```

- **Listar docentes**: `GET /api/docentes` (Requiere autenticación)
  - Encabezado:
    ```
    Authorization: Bearer {token}
    ```
  - Parámetros de consulta (opcional):
    ```
    page: número de página (para paginación)
    ```

- **Mostrar docente**: `GET /api/docentes/{id}` (Requiere autenticación)
  - Encabezado:
    ```
    Authorization: Bearer {token}
    ```

- **Editar docente**: `PUT /api/docentes/{id}` (Requiere autenticación)
  - Encabezado:
    ```
    Authorization: Bearer {token}
    ```
  - Cuerpo de la solicitud:
    ```json
    {
      "nombre": "Nuevo Nombre del Docente",
      "email": "nuevoemail@example.com"
    }
    ```

- **Eliminar docente**: `DELETE /api/docentes/{id}` (Requiere autenticación)
  - Encabezado:
    ```
    Authorization: Bearer {token}
    ```

- **Asignar materias a docente**: `POST /api/docentes/{id}/materias` (Requiere autenticación)
  - Encabezado:
    ```
    Authorization: Bearer {token}
    ```
  - Cuerpo de la solicitud:
    ```json
    {
      "materia_ids": [1, 2, 3]
    }
    ```

### Materias

- **Crear materia**: `POST /api/materias` (Requiere autenticación)
  - Encabezado:
    ```
    Authorization: Bearer {token}
    ```
  - Cuerpo de la solicitud:
    ```json
    {
      "nombre": "Nombre de la Materia",
      "descripcion": "Descripción de la Materia"
    }
    ```

- **Listar materias**: `GET /api/materias` (Requiere autenticación)
  - Encabezado:
    ```
    Authorization: Bearer {token}
    ```
  - Parámetros de consulta (opcional):
    ```
    page: número de página (para paginación)
    ```

- **Mostrar materia**: `GET /api/materias/{id}` (Requiere autenticación)
  - Encabezado:
    ```
    Authorization: Bearer {token}
    ```

- **Editar materia**: `PUT /api/materias/{id}` (Requiere autenticación)
  - Encabezado:
    ```
    Authorization: Bearer {token}
    ```
  - Cuerpo de la solicitud:
    ```json
    {
      "nombre": "Nuevo Nombre de la Materia",
      "descripcion": "Nueva Descripción de la Materia"
    }
    ```

- **Eliminar materia**: `DELETE /api/materias/{id}` (Requiere autenticación)
  - Encabezado:
    ```
    Authorization: Bearer {token}
    ```

## Estructura del Proyecto

El proyecto sigue el patrón de diseño DDD (Domain-Driven Design) y está organizado en las siguientes capas:

- **Application/Services**: Contiene la lógica de negocio y los servicios de la aplicación.
- **Domain/Models**: Contiene los modelos de dominio.
- **Infrastructure/Repositories**: Contiene los repositorios para la interacción con la base de datos.
- **Interfaces/Http/Controllers**: Contiene los controladores que manejan las solicitudes HTTP.

## Sistema de Autenticación

El sistema de autenticación utiliza JWT (JSON Web Tokens) para manejar la autenticación de usuarios. Los tokens JWT se generan durante el login y se utilizan para autenticar las solicitudes protegidas.

## Base de Datos

La base de datos utilizada es MariaDB. Asegúrate de configurar correctamente la conexión a la base de datos en el archivo `.env`.

## Requisitos

- PHP >= 8.0
- Laravel 11
- MariaDB

## Instalación

1. Clona el repositorio:
`git clone https://github.com/tu-usuario/tu-repositorio.git`

2. Instala las dependencias:
`composer install`
3. Configura el archivo .env con tus credenciales de base de datos y otras configuraciones necesarias.

4. Ejecuta las migraciones:
`php artisan migrate`

5. Genera la clave de la aplicación:
`php artisan key:generate`

6. Inicia el servidor de desarrollo:
`php artisan serve`

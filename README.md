# Nombre del Proyecto

Descripción del Proyecto: Este proyecto integra dos APIs: Trello API y Weather API, para proporcionar diversas funcionalidades.

## Trello API

### Obtener Tableros

- **Endpoint:** `/trello/boards`
- **Método HTTP:** GET
- **Descripción:** Obtiene la lista de tableros.
- **Parámetros:** Ninguno
- **Respuesta:** Devuelve una lista de tableros.

### Crear Tablero

- **Endpoint:** `/trello/boards`
- **Método HTTP:** POST
- **Descripción:** Crea un nuevo tablero.
- **Parámetros:** Ninguno
- **Respuesta:** Devuelve el tablero recién creado.

### Actualizar Tablero

- **Endpoint:** `/trello/boards/{boardId}`
- **Método HTTP:** PUT
- **Descripción:** Actualiza el tablero especificado.
- **Parámetros:**
  - `boardId` (obligatorio): ID del tablero a actualizar.
- **Respuesta:** Devuelve el tablero actualizado.

## Weather API

### Obtener Tiempo Actual

- **Endpoint:** `/weather/current`
- **Método HTTP:** GET
- **Descripción:** Obtiene la información del tiempo actual para una ciudad específica.
- **Parámetros:**
  - `city` (obligatorio): Nombre de la ciudad.
- **Respuesta:** Devuelve los detalles del tiempo actual, incluyendo temperatura, humedad y descripción.

### Obtener Pronóstico del Tiempo

- **Endpoint:** `/weather/forecast`
- **Método HTTP:** GET
- **Descripción:** Obtiene el pronóstico del tiempo para una ciudad específica.
- **Parámetros:**
  - `city` (obligatorio): Nombre de la ciudad.
- **Respuesta:** Devuelve el pronóstico del tiempo para varios días, incluyendo temperatura, humedad y descripción.

### Obtener Temperatura

- **Endpoint:** `/weather/temperature`
- **Método HTTP:** GET
- **Descripción:** Obtiene la temperatura actual para una ciudad específica.
- **Parámetros:**
  - `city` (obligatorio): Nombre de la ciudad.
- **Respuesta:** Devuelve la temperatura actual en grados Celsius.

### Obtener Humedad

- **Endpoint:** `/weather/humidity`
- **Método HTTP:** GET
- **Descripción:** Obtiene la humedad actual para una ciudad específica.
- **Parámetros:**
  - `city` (obligatorio): Nombre de la ciudad.
- **Respuesta:** Devuelve el porcentaje de humedad actual.

## Requisitos Previos

- Claves API para Trello API y Weather API.
- Laravel framework instalado.

## Instalación

1. Clonar el repositorio: `git clone <repository-url>`
2. Instalar las dependencias: `composer install`
3. Configurar las claves API en el archivo `.env`.
4. Ejecutar las migraciones: `php artisan migrate`
5. Iniciar el servidor de desarrollo: `php artisan serve`
6. Acceder a la aplicación en el navegador: `http://localhost:8000`

## Uso

1. Utilizar los endpoints proporcionados para interactuar con la Trello API y Weather API.
2. Consultar la documentación de la API para obtener información detallada sobre cada endpoint.
3. Personalizar y ampliar la funcionalidad según sea necesario

# 🥇 API Mundial de Bateo – Navelgas

API REST desarrollada en **Laravel** para gestionar una competición del mundial de bateo de Navelgas.  
Permite administrar participantes, tandas, resultados y penalizaciones, además de consultar clasificaciones.

---

## 📌 Tecnologías utilizadas

- PHP 8+
- Laravel
- Laravel Breeze (API tokens)
- MySQL

---

## ⚙️ Instalación del proyecto

### 1. Clonar el repositorio

```bash
git clone https://github.com/TU_USUARIO/laravel_bateo_TUNOMBRE.git
cd laravel_bateo_TUNOMBRE
```

---

### 2. Instalar dependencias

```bash
composer install
```

---

### 3. Configurar entorno

Copiar el archivo `.env`:

```bash
cp .env.example .env
```

Editar los datos de la base de datos:

```env
DB_DATABASE=dwes_laravel_bateo
DB_USERNAME=root
DB_PASSWORD=
```

---

### 4. Generar clave de aplicación

```bash
php artisan key:generate
```

---

### 5. Ejecutar migraciones y seeders

```bash
php artisan migrate --seed
```

---

### 6. Iniciar el servidor

```bash
php artisan serve
```

La API estará disponible en:

```
http://localhost:8000/api
```

---

## 📚 Endpoints principales

---

### Obtener penalizaciones

```
GET /api/penalizaciones
```

Devuelve todas las penalizaciones con los participantes afectados.

**Respuesta:**
```json
{
  "data": [
    {
      "nombre": "Fuera de zona",
      "tiempo": 10.500,
      "participantes": [
        {
          "id": 1,
          "nombre": "Juan",
          "apellidos": "Pérez",
          "slug": "juan-perez"
        }
      ]
    }
  ]
}
```

---

### Clasificación – Mejores de una tanda

```
GET /api/clasificacion/{tanda}/mejores
```

Devuelve los participantes que han encontrado el **máximo número de pepitas** en una tanda.

**Ejemplo:**
```
GET /api/clasificacion/1/mejores
```

**Respuesta:**
```json
{
  "data": [
    {
      "participante": "Juan Pérez",
      "pepitas_encontradas": 12
    },
    {
      "participante": "Ana Gómez",
      "pepitas_encontradas": 12
    }
  ]
}
```

## Clasificación completa de una tanda

```
GET /api/clasificacion/{tanda}
```

Devuelve la clasificación completa de los participantes ordenada por tiempo final.

El tiempo final se calcula como:

tiempo final =
tiempo resultado +
penalización por pepitas no encontradas +
tiempo de penalizaciones

**Ejemplo:**
```
GET /api/clasificacion/1/mejores
```

**Respuesta:**
```json
{
  "data": [
    {
      "participante": "Juan Pérez",
      "tiempo_final": 264.000,
      "tiempo_resultado": 129.000,
      "pepitas_encontradas": 6,
      "tiempo_penalizacion_pepitas": 120.000,
      "tiempo_penalizaciones": 15.000
    }
  ]
}
```

---

## 🗄️ Estructura de datos

### Participante
- id
- nombre
- apellidos
- slug (único)

### Tanda
- id
- competidores (por defecto 30)
- penalizacion_pepita_no_encontrada
- numero_pepitas

### Penalización
- id
- nombre
- tiempo

### Resultado
- id
- tanda_id
- participante_id
- tiempo
- pepitas_encontradas

Relación:
- Resultado ↔ Penalización → many-to-many

---

## 👨‍💻 Autor

Proyecto desarrollado por:

**Luis Rodriguez**  
GitHub: https://github.com/LuiisR

---

## 📄 Licencia

Proyecto educativo sin fines comerciales.

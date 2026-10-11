# php-api-tareas

![stack: PHP 8](https://img.shields.io/badge/stack--PHP%208-0d9488?style=flat-square) ![stack: PDO](https://img.shields.io/badge/stack--PDO-0d9488?style=flat-square) ![stack: SQLite](https://img.shields.io/badge/stack--SQLite-0d9488?style=flat-square)
![IA: asistido](https://img.shields.io/badge/IA--asistido-6366f1?style=flat-square)

API REST minima de tareas en PHP con PDO y SQLite (crear, listar y alternar estado).

> **Transparencia sobre IA:** este proyecto se desarrollo con asistencia de inteligencia artificial (generacion de codigo, revision y documentacion). El codigo fue leido, ejecutado y probado manualmente antes de publicarse. No declara clientes, metricas ni resultados que no puedan verificarse.

## Problema que resuelve

Exponer un CRUD de tareas sin instalar un motor de base de datos ni dependencias externas (Composer).

## Solucion implementada

API REST en PHP puro sobre SQLite mediante PDO: rutas, validacion de entrada, respuestas JSON y codigos de estado HTTP.

### Funcionalidades principales

- CRUD completo (GET/POST/PUT/DELETE)
- PDO con consultas preparadas
- Validacion y saneamiento de entrada
- Respuestas JSON con codigos HTTP

## Stack

- PHP 8
- PDO
- SQLite

## Estructura

```
public/index.php   # router y endpoints
public/.htaccess   # opcional en Apache
data/              # base SQLite (ignorada en git)
```

## Puesta en marcha

```bash
php -S localhost:8000 -t public
# luego: curl localhost:8000/tareas
```

## Complejidad del proyecto

**Nivel: Intermedio** — Servicio con capa de persistencia, validacion y contrato HTTP; requiere un servidor con PHP.

El nivel describe la complejidad tecnica del proyecto, no el grado de dominio de quien lo escribio.

## Despliegue

Necesita ejecutar PHP y escribir en SQLite; GitHub Pages solo sirve archivos estaticos.  
El codigo fuente si esta disponible en este repositorio.

## Autor

**Luis Felipe Zuniga Leon** — Desarrollador de software asistido por IA

- GitHub: <https://github.com/Luisf2020>

---

_Proyecto de portafolio. El desarrollo se apoyo en herramientas de IA bajo revision tecnica humana._

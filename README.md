# php-api-tareas

API REST minima de tareas en PHP con PDO y SQLite (crear, listar y alternar estado).

> Proyecto de portafolio de Luis Felipe Zuniga Leon. Desarrollado con asistencia de IA
> (generacion de codigo, revision y documentacion); el codigo fue revisado y probado manualmente.
> No declara clientes, metricas ni resultados no verificables.

## Stack

- PHP 8
- PDO
- SQLite

## Como ejecutar

```bash
php -S localhost:8000 -t public
# luego: curl localhost:8000/tareas
```

## Estructura

```
public/index.php   # router y endpoints
public/.htaccess   # opcional en Apache
data/              # base SQLite (ignorada en git)
```

## Estado

Muestra tecnica de portafolio. Sin datos de produccion.

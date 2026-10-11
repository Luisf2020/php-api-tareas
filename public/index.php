<?php
declare(strict_types=1);

// API REST minima de tareas con PDO/SQLite: lista, crea y completa tareas.
$dbPath = __DIR__ . '/../data/tareas.sqlite';
$pdo = new PDO('sqlite:' . $dbPath, null, null, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);
$pdo->exec('CREATE TABLE IF NOT EXISTS tareas (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    titulo TEXT NOT NULL,
    hecha INTEGER NOT NULL DEFAULT 0
)');

header('Content-Type: application/json; charset=utf-8');
$metodo = $_SERVER['REQUEST_METHOD'];
$ruta = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$cuerpo = json_decode(file_get_contents('php://input') ?: '[]', true) ?: [];

try {
    if ($metodo === 'GET' && $ruta === '/tareas') {
        echo json_encode($pdo->query('SELECT * FROM tareas ORDER BY id DESC')->fetchAll());
        return;
    }
    if ($metodo === 'POST' && $ruta === '/tareas') {
        $titulo = trim((string)($cuerpo['titulo'] ?? ''));
        if ($titulo === '') {
            http_response_code(422);
            echo json_encode(['error' => 'titulo requerido']);
            return;
        }
        $st = $pdo->prepare('INSERT INTO tareas (titulo) VALUES (:t)');
        $st->execute([':t' => $titulo]);
        http_response_code(201);
        echo json_encode(['id' => (int)$pdo->lastInsertId(), 'titulo' => $titulo, 'hecha' => 0]);
        return;
    }
    if ($metodo === 'PATCH' && preg_match('#^/tareas/(\d+)$#', $ruta, $m)) {
        $st = $pdo->prepare('UPDATE tareas SET hecha = 1 - hecha WHERE id = :id');
        $st->execute([':id' => (int)$m[1]]);
        echo json_encode(['id' => (int)$m[1], 'actualizada' => $st->rowCount() > 0]);
        return;
    }
    http_response_code(404);
    echo json_encode(['error' => 'ruta no encontrada']);
} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}

<?php
session_start();

// Read the page name from the URL like ?page=dashboard
$page = isset($_GET['page']) ? $_GET['page'] : 'home'; // default = home
$page = trim($page, '/');

// Build full path to file inside /routes folder
$path = __DIR__ . '/routes/' . $page . '.php';

// Prevent directory traversal
$realPath = realpath($path);
$routesDir = realpath(__DIR__ . '/routes');

if (
    $realPath && 
    strpos($realPath, $routesDir) === 0 && 
    file_exists($realPath)
) {
    require $realPath;
} else {
    http_response_code(404);
    echo "<h1>404 - Page Not Found</h1>";
}

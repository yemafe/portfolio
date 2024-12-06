<?php
require_once __DIR__ . '/vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/templates');
$twig = new \Twig\Environment($loader);

$route = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$routes = [
    '/' => 'index.twig',
    '/landing' => 'landing.twig',
    '/generic' => 'generic.twig',
    '/elements' => 'elements.twig',
];

if (array_key_exists($route, $routes)) {
    if ($route === '/landing' && isset($_GET['item'])) {
        echo $twig->render($routes[$route], ['item' => $_GET['item']]);
    } else {
        echo $twig->render($routes[$route]);
    }
} else {
    echo $twig->render('errorPage.twig', []);
}

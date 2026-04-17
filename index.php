<?php
$urls = [
    '/',
    '/products',
    '/products/list',
    '/products/show/12',
    '/products/show/999',
    '/products/edit/5',
    '/users',
    '/users/show/3',
    '/users/edit/42',
    '/unknown/test',
];

require_once 'url_parser.php';

$parser = new UrlParser();

foreach ($urls as $url) {
    $result = $parser->parse($url);
    printf("URL: %s\n", $url);
    printf("Controller: %s, Action: %s, ID: %s\n", $result['controller'], $result['action'], $result['id']);
    printf("-------------------------\n");


    $controller = $result['controller'];
    $action = $result['action'];
    $id = $result['id'];


    if ($controller === 'home' && $action === 'index') {
        printf("Homepage\n");
    } elseif ($controller === 'products' && $action === 'index') {
        printf("Liste des produits\n");
    } elseif ($controller === 'products' && $action === 'show' && $id) {
        printf("Produit %d\n", $id);
    } elseif ($controller === 'users' && $action === 'edit' && $id) {
        printf("Edition utilisateur %d\n", $id);
    } else {
        printf("404\n");
    }
    printf("========================<br>");
}
?>
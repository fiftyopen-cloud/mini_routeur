<?php
$urls = [
    '/',
    '/home',
    '/home/index',

    '/products',
    '/products/index',
    '/products/list',
    '/products/show/12',
    '/products/show/999',
    '/products/show/abc',
    '/products/edit/5',
    '/products/delete/8',
    '/products/create',

    '/users',
    '/users/index',
    '/users/show/3',
    '/users/show',
    '/users/edit/42',
    '/users/delete/7',
    '/users/create',

    '/admin',
    '/admin/index',
    '/admin/dashboard',
    '/admin/products',
    '/admin/users',

    '/orders',
    '/orders/list',
    '/orders/show/15',

    '/blog',
    '/blog/show/4',
    '/blog/edit/2',

    '/unknown',
    '/unknown/test',
    '/nothing/here/123',

    '//products//show//12//',
    '/products/show/12/',
    '/products/show/12?sort=asc',
    '/users/edit/42?debug=true',

    '/PRODUCTS/SHOW/12',
    '/Users/Edit/5',

    '/products/show',
    '/products//edit',
    '/products/show/12/extra',
    '/users/edit/42/now',
];

require_once 'url_parser.php';

$parser = new UrlParser();

echo "URL demandée : $url<br>";
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
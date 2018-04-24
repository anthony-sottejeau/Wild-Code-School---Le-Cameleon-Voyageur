<?php
/**
 * This file hold all routes definitions.
 *
 * PHP version 7
 *
 * @author   WCS <contact@wildcodeschool.fr>
 *
 * @link     https://github.com/WildCodeSchool/simple-mvc
 */

$routes = [
    'Main' => [ // Controller
        ['index', '/', 'GET'], // action, url, method    ],
    ],
    'Place' => [
        ['index', '/lieux','GET'],
    ],
    'Admin' => [
        ['index', '/admin','GET'],
    ],
    'PlaceAdmin' => [
        ['index', '/admin/place','GET'],
        ['edit', '/admin/place/edit','POST'],
        ['edit', '/admin/place/edit','GET'],
    ],
    'Food' => [
        ['index', '/menu', 'GET'],
    ],
    'FoodAdmin' => [
        ['index', '/admin/menu', 'GET'],
        ['showProduct', '/admin/menu/showProduct/{id}', 'GET'],
        ['showCategory', '/admin/menu/showCategory/{id}', 'GET'],
        ['editCategory', '/admin/menu/editCategory', 'POST'],
        ['editProduct', '/admin/menu/editProduct', 'POST'],
        ['deleteProduct', '/admin/menu/deleteProduct', 'POST'],
        ['deleteCategory', '/admin/menu/deleteCategory', 'POST'],
        ['insertProduct', '/admin/menu/insertProduct', 'POST'],
        ['insertCategory', '/admin/menu/insertCategory', 'POST'],
        ['showNewProduct', '/admin/menu/showNewProduct', 'GET'],
        ['showNewCategory', '/admin/menu/showNewCategory', 'GET'],
    ],
    'Gallery' => [
        ['index','/gallery', 'GET'],
    ],
];

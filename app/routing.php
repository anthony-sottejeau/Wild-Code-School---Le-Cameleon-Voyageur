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
        ['update', '/admin/place/update','POST'],
    ],
    'Food' => [
        ['index', '/menu', 'GET'],
    ]
];

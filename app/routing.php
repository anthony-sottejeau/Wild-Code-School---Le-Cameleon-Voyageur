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
    'CompanyAdmin' => [
        ['index', '/admin/company','GET'],
        ['edit', '/admin/company/edit','POST'],
        ['edit', '/admin/company/edit','GET'],
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
    'Gallery' => [
        ['index','/gallery', 'GET'],
    ],
];

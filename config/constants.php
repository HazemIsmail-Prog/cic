<?php

/* 
run the following command lines after update this file

php artisan config:clear
php artisan config:cache



*/

return [

    'users' => [
        'roles' => [
            'admin',
            'accountant',
            'operation',
        ],
    ],

    'suppliers' => [
        'Trufflez',
        'Wasak',
    ],

    'items' => [
        'categories' => [
            'NON FOOD',
            'Food items',
            'Production',
            'ZNon Food',
            'Packaging',
        ],

        'units' => [
            'Grams',
            'ML',
            'Pcs',
        ],
    ],

    'recipes' => [
        'categories' => [
            'NON FOOD',
            'Food items',
            'Production',
            'ZNon Food',
            'Packaging',
        ],

        'units' => [
            'Grams',
            'ML',
            'Pcs',
        ],
    ],


];

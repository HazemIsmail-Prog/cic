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
        'Supplier 1',
        'Supplier 2',
        'Supplier 3',
        'Supplier 4',
        'Supplier 5',
    ],

    'items' => [
        'categories' => [
            'Category 1',
            'Category 2',
            'Category 3',
            'Category 4',
            'Category 5',
        ],

        'units' => [
            'Unit 1',
            'Unit 2',
            'Unit 3',
            'Unit 4',
            'Unit 5',

        ],
    ],

    'recipes' => [
        'categories' => [
            'Category 1',
            'Category 2',
            'Category 3',
            'Category 4',
            'Category 5',
        ],

        'units' => [
            'Unit 1',
            'Unit 2',
            'Unit 3',
            'Unit 4',
            'Unit 5',

        ],
    ],


];


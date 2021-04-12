<?php

declare(strict_types=1);

return [
    /**
     * Default route to use when nothing is matched (index or home page).
     * ['ControllerName', 'methodName', ['arg1', 'arg2']],
     */
    'default_route' => ['App', 'home', []],
    /**
     * Custom route aliases.
     * Do not add the dummy extension here.
     */
    'routes' => [
        'dashboard' => 'App/home',
    ],
];

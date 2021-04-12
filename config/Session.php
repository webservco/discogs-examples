<?php declare(strict_types = 1);

return [
    /**
     * Session expire time in seconds.
     * Default 60 * 60 * 24 * 30 (30 days)
     */
    'expire' => 60 * 60 * 24 * 30,
    'cookie' => [
        /**
         * Session cookie persistance in seconds.
         * Default 60 * 60 * 24 * 30 (30 days)
         */
        'lifetime' => 60 * 60 * 24 * 30,
        /**
         * Domain path where session cookie will work.
         * Use a single slash for all paths on the domain.
         */
        'path' => '/',
        /**
         * Cookie domain.
         */
        'domain' => '',
        /**
         * Send cookie only over secure connections.
         */
         'secure' => true,
        /**
         * Set httponly flag
         */
        'httponly' => true,
    ],
];

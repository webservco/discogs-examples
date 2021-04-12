<?php declare(strict_types = 1);

return [
    'api' => [
        'auth' => [
            'type' => 'oauth', // user, app, oauth
            // App credentials
            'app' => [
                'consumerKey' => 'CscauQRrLGkTtzOqynss',
                'consumerSecret' => 'tmJKoYmMGbDFGpnveZWcwCgPISikgsFG',
            ],
            'oauth' => [
                // Temporary OAuth credentials
                'flow' => [
                    'callback' => 'https://discogs.examples/Oauth/callback',
                    'oauthToken' => 'nkBLjpIRFEtxBYwXDxpOkkNGxIDMaGklleKtChim',
                    'oauthTokenSecret' => 'ZvPLUFXDwVNeTkmPFiPkITwgEkCSDYdAVdlFeqYa',
                    'oauthVerifier' => 'oFRZcCpfOQ',
                ],
                // Permanent OAuth credentials
                'access' => [
                    'oauthToken' => 'aJKMjemLdlIKjVNPFFIwlrfHoCxcsgDIGHUhVDMK',
                    'oauthTokenSecret' => 'URomZihdQYGtxaBtPYnFnbclTHzXMTNHLNHnvTjx',
                ],
            ],
            // User credentials
            'user' => [
                'personalAccessToken' => '',
            ],
        ],
        'settings' => [
            'debug' => true,
            'rateLimiting' => true,
            'userAgent' => 'DiscogsExamples/0.1 +https://github.com/webservco/discogs-examples',
        ],
        'username' =>'radum',
        //'username' =>'mst1958',
    ],
    'data' => [
    ],
];

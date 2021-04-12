<?php

declare(strict_types=1);

return [
    /**
     * If superglobals (_GET, _POST, _REQUEST)
     * should be cleared after processing.
     */
    'clear_globals' => false, // needed for Facebook SDK
    /**
     * Dummy extensions to remove from URL.
     */
    'suffixes' => ['.htm','.html','.php'],
];

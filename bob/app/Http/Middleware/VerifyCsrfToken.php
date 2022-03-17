<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'login-form-save',
        'add-store-save',
        'add-user',
        'add-vendor',
        'add-sale-save',
        'edit-sale-save',
        'add-scr-off',
        'receive-order',
        'activate-scr-off',
        'edit-scr-off-save',
        'edit-receive-order-save'
        
        //
    ];
}

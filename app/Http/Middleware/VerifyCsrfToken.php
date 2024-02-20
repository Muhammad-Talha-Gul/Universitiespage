<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'https://universitiespage.com/list_update_students',
        'https://universitiespage.com/list_update_consultations',
        'https://universitiespage.com/assign_complaints',
        'https://universitiespage.com/assign_students',
        'https://universitiespage.com/assign_consultations',
        'https://universitiespage.com/assign_discount_offer'
    ];
}

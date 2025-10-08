<?php

namespace App\Models;

use Illuminate\Notifications\DatabaseNotification;

class Notification extends DatabaseNotification
{
    /**
     * Cast the stored payload to an array.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'data' => 'array',
    ];
}

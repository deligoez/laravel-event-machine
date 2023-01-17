<?php

namespace Deligoez\EventMachine\Tests\Stubs\Models;

use Deligoez\EventMachine\Tests\Stubs\Database\Factories\UserFactory;
use Deligoez\EventMachine\Tests\Stubs\EventMachines\EmailVerificationMachine2;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'email_verified',
    ];

    protected $casts = [
        'email' => 'string',
        'email_verified' => EmailVerificationMachine2::class,
    ];

    protected static function newFactory(): UserFactory
    {
        return UserFactory::new();
    }
}

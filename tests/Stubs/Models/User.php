<?php

namespace Deligoez\EventMachine\Tests\Stubs\Models;

use Deligoez\EventMachine\Tests\Stubs\Database\Factories\UserFactory;
use Deligoez\EventMachine\Tests\Stubs\EventMachines\EmailVerificationEventMachine;
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
        'email_verified' => EmailVerificationEventMachine::class,
    ];

    protected static function newFactory(): UserFactory
    {
        return UserFactory::new();
    }
}

<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Auth\User as Authenticatable;
use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{
    public function test_user_model_is_authenticatable(): void
    {
        $this->assertTrue(is_subclass_of(User::class, Authenticatable::class));
    }
}

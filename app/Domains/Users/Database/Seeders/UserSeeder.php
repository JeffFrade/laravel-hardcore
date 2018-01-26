<?php

namespace Confee\Domains\Users\Database\Seeders;

use Illuminate\Database\Seeder;
use Confee\Domains\Users\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        factory(User::class, 30)->create();
    }
}
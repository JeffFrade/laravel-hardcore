<?php

namespace Confee\Domains\Users\Database\Factories;

use Confee\Domains\Users\User;
use Confee\Support\Database\ModelFactory;

class UserFactory extends ModelFactory
{
    protected $model = User::class;

    /**
     * @return array
     */
    protected function fields()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
        ];
    }

}
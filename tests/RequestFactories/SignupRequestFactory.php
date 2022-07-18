<?php

namespace Tests\RequestFactories;

use Worksome\RequestFactories\RequestFactory;

class SignupRequestFactory extends RequestFactory
{
    public function definition(): array
    {
        return [
          // 'email' => $this->faker->email,
//            'phone' => '01234567890',
            'email' => $this->faker->unique()->safeEmail(),
            'name' => $this->faker->name(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'password_confirmation' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
//            'accepts_terms_and_conditions' => true,
        ];
    }
}

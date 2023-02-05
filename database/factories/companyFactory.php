<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\company>
 */
class companyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
        'orgnizationName'=> fake()->name(), 
        'website'=> fake()->url(), 
        'SupervisorName'=> fake()->name(), 
        'orgnizationEmail'=>fake()->unique()->safeEmail(), 
        'Registration'=> fake()->name(),
        'OrganizationPhone'=> '966123456789',
        'description'=> fake()->name(),
        'country'=> fake()->name(),
        'SupervisorPhone'=>'966123456789',
        'SupervisorEmail'=>fake()->unique()->safeEmail(),
        'SupervisorName'=> fake()->name(),
        'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        'status'=>'pending',
        'SupervisorFax'=>'966123456789',
        'Address'=> fake()->name(),
        'logoImage'=> fake()->name().'png'
        ];
    }
}

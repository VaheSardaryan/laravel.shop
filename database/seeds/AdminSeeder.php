<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_email = 'admin@email.com';
        $admin_user = User::query()->where('email', '=', $admin_email)->first();
        if($admin_user) {
            echo ("Admin user already created \n");
            return;
        }
        User::query()->create([
            'name' => 'Admin',
            'email' => $admin_email,
            'is_admin' => 1,
            'password' => Hash::make('secret123')
        ]);
    }
}

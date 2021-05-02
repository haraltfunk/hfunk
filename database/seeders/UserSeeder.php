<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Crear usuario principal
        $user = User::create([
                    'name' => 'Haralt',
                    'email' => 'haraltfunk@gmail.com',
                    'password' => bcrypt('321654987'),
                    'profile_photo_path' => 'profile-photos/GAOExLv8bDr9THXWXbPFtIBZF9SMV2hDSfKsJpcO.jpg'
                ]);
        
        $user->assignRole('Admin');

        User::factory(99)->create();
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Elimina el directorio cursos (se usa en fase de diseño) crea un directorio
        Storage::deleteDirectory('courses');
        //Crea directorio cursos (no esta funcionando en FORGE)
        Storage::makeDirectory('courses');

        //Llamar todos los seeder que quiero ejecutar (importante el orden para no alterar la creacion de otros campos)
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PriceSeeder::class);
        $this->call(PlatformSeeder::class);
        $this->call(CourseSeeder::class);
        
    }
}

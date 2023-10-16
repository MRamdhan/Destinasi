<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Destinasi;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
            $user = new User();
            $user->username='admin';
            $user->email='admin@a.com';
            $user->password= bcrypt('admin');
            $user->save();

            $user = new Destinasi();
            $user->foto = 'img/candi.jpg';
            $user->nama = 'Candi Borobudur';
            $user->alamat = 'Jl. Badrawati, Kw. Candi Borobudur, Borobudur, Kec. Borobudur, Kabupaten Magelang, Jawa Tengah';
            $user->link = 'https://maps.app.goo.gl/NPL69xyKMHCu3PgL6';
            $user->deskripsi = 'Candi Borobudur adalah sebuah candi Buddha yang terletak di Borobudur, Magelang, Jawa Tengah, Indonesia. Candi ini terletak kurang lebih 100 km di sebelah barat daya Semarang, 86 km di sebelah barat Surakarta, dan 40 km di sebelah barat laut Yogyakarta.';
            $user->save();
            
    }
}

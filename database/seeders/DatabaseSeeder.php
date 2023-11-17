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
            $user->email='admin2@a.com';
            $user->role='admin';
            $user->password= bcrypt('admin');
            $user->save();

            $destinasi = new Destinasi();
            $destinasi->foto = 'img/candi.jpg';
            $destinasi->nama = 'Candi Borobudur';
            $destinasi->alamat = 'Jl. Badrawati, Kw. Candi Borobudur, Borobudur, Kec. Borobudur, Kabupaten Magelang, Jawa Tengah';
            $destinasi->link = 'https://maps.app.goo.gl/NPL69xyKMHCu3PgL6';
            $destinasi->deskripsi = 'Candi Borobudur adalah sebuah candi Buddha yang terletak di Borobudur, Magelang, Jawa Tengah, Indonesia. Candi ini terletak kurang lebih 100 km di sebelah barat daya Semarang, 86 km di sebelah barat Surakarta, dan 40 km di sebelah barat laut Yogyakarta.';
            $destinasi->user_id = $user->id;
            $destinasi->save();

            $destinasi = new Destinasi();
            $destinasi->foto = 'img/bromo.jpg';
            $destinasi->nama = 'Gunung Bromo';
            $destinasi->alamat = 'Cemoro Lawang, Desa Ngadisari, Kec. Sukapura, Kabupaten Probolinggo,Prop. Jawa Timur. 7° 56 30 LS dan 112° 57 BT.';
            $destinasi->link = 'https://maps.app.goo.gl/GTpy8P3nDwECwB2o6';
            $destinasi->deskripsi = 'Gunung Bromo atau dalam bahasa Tengger dieja "Brama", juga disebut Kaldera Tengger, adalah sebuah gunung berapi aktif di Jawa Timur, Indonesia. Gunung ini memiliki ketinggian 2.329 meter di atas permukaan laut dan berada dalam empat wilayah kabupaten, yakni Kabupaten Probolinggo, Kabupaten Pasuruan, Kabupaten Lumajang, dan Kabupaten Malang. Gunung Bromo terkenal sebagai objek wisata utama di Jawa Timur. Sebagai sebuah objek wisata, Bromo menjadi menarik karena statusnya sebagai gunung berapi yang masih aktif. Gunung Bromo termasuk dalam kawasan Taman Nasional Bromo Tengger Semeru.';
            $destinasi->user_id = $user->id;
            $destinasi->save();
    }
}

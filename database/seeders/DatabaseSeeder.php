<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        //Role
        Role::create([
                'name' => 'admin'
        ]);

        Role::create([
                'name' => 'user'
        ]);

        //User
        User::create([
            'role_id' => 1,
            'name' => 'Admin Satu',
            'avatar' => '1686278465.jpg',
            'email' => 'adminsatu@gmail.com',
            'password' => bcrypt('adminsatu@gmail.com'),
            'phone' => '081111111111',
            'address' => 'Jl. Jati Adabiah No.17C, Alai Parak Kopi, Kec. Padang Tim., Kota Padang, Sumatera Barat 25129',
            'birth' => "2000-06-15",
            'gender' => 'L'
        ]);

        User::create([
            'role_id' => 1,
            'name' => 'Admin Dua',
            'avatar' => '1519821482.jpg',
            'email' => 'admindua@gmail.com',
            'password' => bcrypt('admindua@gmail.com'),
            'phone' => '082222222222',
            'address' => 'Jl. Jati Adabiah No.17C, Alai Parak Kopi, Kec. Padang Tim., Kota Padang, Sumatera Barat 25129',
            'birth' => "2000-06-15",
            'gender' => 'P'
        ]);

        User::create([
            'role_id' => 2,
            'name' => 'User Satu',
            'avatar' => '1686279075.jpg',
            'email' => 'usersatu@gmail.com',
            'password' => bcrypt('usersatu@gmail.com'),
            'phone' => '083333333333',
            'address' => 'Jl. Jati Adabiah No.17C, Alai Parak Kopi, Kec. Padang Tim., Kota Padang, Sumatera Barat 25129',
            'birth' => "2000-06-15",
            'gender' => 'L'
        ]);

        User::create([
            'role_id' => 2,
            'name' => 'User Dua',
            'avatar' => '1686279008.jpg',
            'email' => 'userdua@gmail.com',
            'password' => bcrypt('userdua@gmail.com'),
            'phone' => '084444444444',
            'address' => 'Jl. Jati Adabiah No.17C, Alai Parak Kopi, Kec. Padang Tim., Kota Padang, Sumatera Barat 25129',
            'birth' => "2000-06-15",
            'gender' => 'P'
        ]);

        //category
        Category::create([
            'name' => 'Fiksi'
        ]);

        Category::create([
            'name' => 'Non-fiksi'
        ]);

        Category::create([
            'name' => 'Sains dan Teknologi'
        ]);

        Category::create([
            'name' => 'Seni dan Sastra'
        ]);

        Category::create([
            'name' => 'Sejarah dan Budaya'
        ]);

        Category::create([
            'name' => 'Agama dan Spiritualitas'
        ]);

        Category::create([
            'name' => 'Pendidikan'
        ]);

        Category::create([
            'name' => 'Bisnis dan Ekonomi'
        ]);

        Category::create([
            'name' => 'Kesehatan dan Kedokteran'
        ]);

        Category::create([
            'name' => 'Teknologi Informasi dan Komputer'
        ]);

        Category::create([
            'name' => 'Pariwisata dan Perjalanan'
        ]);

        Category::create([
            'name' => 'Hobi dan Keterampilan'
        ]);

        //books
        Book::create([
            'title' => 'Buku satu',
            'category_id' => 1,
            'description' => 'Sunt blanditiis facilis perspiciatis sed totam vel odit. Voluptatem aut optio exercitationem dignissimos enim consequatur. Repellendus eveniet ipsam facere est est quidem recusandae. Aut exercitationem vitae dolores corrupti autem.',
            'amount' => '100',
            'book' => 'dummyone.pdf',
            'cover' => 'coverone.jpeg',
            'created_by' => 3
        ]);

        Book::create([
            'title' => 'Buku dua',
            'category_id' => 2,
            'description' => 'Sunt blanditiis facilis perspiciatis sed totam vel odit. Voluptatem aut optio exercitationem dignissimos enim consequatur. Repellendus eveniet ipsam facere est est quidem recusandae. Aut exercitationem vitae dolores corrupti autem.',
            'amount' => '200',
            'book' => 'dummytwo.pdf',
            'cover' => 'covertwo.jpg',
            'created_by' => 3
        ]);

        Book::create([
            'title' => 'Buku tiga',
            'category_id' => 3,
            'description' => 'Sunt blanditiis facilis perspiciatis sed totam vel odit. Voluptatem aut optio exercitationem dignissimos enim consequatur. Repellendus eveniet ipsam facere est est quidem recusandae. Aut exercitationem vitae dolores corrupti autem.',
            'amount' => '300',
            'book' => 'dummyone.pdf',
            'cover' => 'coverone.jpeg',
            'created_by' => 4
        ]);

        Book::create([
            'title' => 'Buku empat',
            'category_id' => 4,
            'description' => 'Sunt blanditiis facilis perspiciatis sed totam vel odit. Voluptatem aut optio exercitationem dignissimos enim consequatur. Repellendus eveniet ipsam facere est est quidem recusandae. Aut exercitationem vitae dolores corrupti autem.',
            'amount' => '400',
            'book' => 'dummytwo.pdf',
            'cover' => 'covertwo.jpg',
            'created_by' => 4
        ]);

        Book::factory(25)->create();

        User::factory(10)->create();

    }
}

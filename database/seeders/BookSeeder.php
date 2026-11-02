<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Book::create([
            'title' => 'Pemrograman Web Lanjut dengan Laravel',
            'author' => 'Bapak Edwin'
        ]);
        Book::create([
            'title' => 'Implementasi Spatie Permission dan Breeze',
            'author' => 'Tim Developer'
        ]);
        Book::create([
            'title' => 'Belajar Algoritma dan Pemrograman Dasar',
            'author' => 'Dosen Pengampu'
        ]);
    }
}
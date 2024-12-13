<?php

namespace Database\Seeders;

use App\Models\Artist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArtistTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $a = new Artist;
        $a->name = "Jpegmafia";
        $a->monthly_listeners = "1000048";
       
        $a->save();

        Artist::factory()->count(10)->create();
    }
}

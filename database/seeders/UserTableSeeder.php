<?php
namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create or ensure a profile exists
        $profile = Profile::firstOrCreate([
            'id' => 1,
        ], [
            'name' => 'Default Profile', 
        ]);

        $u = new User;
        $u->name = "Tony";
        $u->profile_id = $profile->id;  
        $u->email = "tonytony@gmail.com";
        $u->password = bcrypt("123");  
        $u->save();

        User::factory()->count(5)->create();
    }
}

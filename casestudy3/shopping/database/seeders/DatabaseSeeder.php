<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = new User();
        $users->id   = 1;
        $users->name = "phanphucan";
        $users->email = "admin30@gmail.com";
        $users->password = bcrypt('12345678');
        $users->save();
    }
}

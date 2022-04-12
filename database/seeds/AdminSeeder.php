<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::where('email', '=', 'admin@thenftdoor.com')->first();
        if($admin === null){
            DB::table('users')->insert([
                'first_name' => 'NFTDoor',
                'last_name' => 'Admin',
                'admin' => 1,
                'api_token' => Str::random(80),
                'email' => 'admin@thenftdoor.com',
                'email_verified_at' => \Carbon\Carbon::now(),
                'password' => Hash::make('&paNa20XiM4diKm'),

            ]);
        }
    }

}

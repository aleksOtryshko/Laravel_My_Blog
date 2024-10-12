<?php


namespace Database\Seeders;

/*

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     
    public function run(): void
    {
        //
    }
}
 */

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
	    public function run()
		        {
				        User::create([
						            'name' => 'Admin',
							                'email' => 'admin@example.com',
									            'password' => Hash::make('12345678'),
										                'role' => 'admin', // если есть поле для роли
												        ]);
					    }
}

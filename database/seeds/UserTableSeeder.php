		<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use App\Caja;



class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   

		public function run()
    {

	

    DB::table('users')->insert([
        'name'  => 'Logistica',
        'Tipo'  => 'Logistica',
        'email'     => 'logistica@transportelavalle.com',
        'password'  => bcrypt('logistica8733'),
    ]);

    

		$user=User::find(8);
		$user->assignRole('Logistica');
	}

}
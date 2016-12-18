<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Model::unguard();

            // $this->call('UserTableSeeder');
            User::create([
            'email'=>'admin@ns.com',
            'name'=>'admin',
            'password'=> bcrypt('admin'),
            'level'=>1]);
           Model::reguard();
    }
}

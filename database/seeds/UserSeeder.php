<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('users')->insert([
      [
        'name' => 'John Doe',
        'email' => 'john@mail.com',
        'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'password' => Hash::make('pass1234'),
        'remember_token' => Arr::random([0, 1]),
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ],
    ]);
  }
}

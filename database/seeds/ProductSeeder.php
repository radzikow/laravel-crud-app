<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;

class ProductSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $names = ['Car', 'Bike', 'Book', 'Ball', 'Shoes', 'T-shirt'];
    $descriptions = ['Lorem ipsum dolor sit amet consectetur.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'Lorem ipsum dolor sit amet consectetur.', 'Lorem ipsum dolor sit amet consectetur adipisicing.', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet.'];
    $prices = [1.99, 2.50, 3.89, 4.00, 5.10, 6.99, 7.10, 8.00];

    DB::table('products')->insert([
      [
        'name' => Arr::random($names),
        'description' => Arr::random($descriptions),
        'price1' => Arr::random($prices),
        'price2' => Arr::random($prices),
        'status' => Arr::random([0, 1]),
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ],
      [
        'name' => Arr::random($names),
        'description' => Arr::random($descriptions),
        'price1' => Arr::random($prices),
        'price2' => Arr::random($prices),
        'status' => Arr::random([0, 1]),
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ],
      [
        'name' => Arr::random($names),
        'description' => Arr::random($descriptions),
        'price1' => Arr::random($prices),
        'price2' => Arr::random($prices),
        'status' => Arr::random([0, 1]),
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ],
      [
        'name' => Arr::random($names),
        'description' => Arr::random($descriptions),
        'price1' => Arr::random($prices),
        'price2' => Arr::random($prices),
        'status' => Arr::random([0, 1]),
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ],
      [
        'name' => Arr::random($names),
        'description' => Arr::random($descriptions),
        'price1' => Arr::random($prices),
        'price2' => Arr::random($prices),
        'status' => Arr::random([0, 1]),
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ],
    ]);
  }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
  use Sortable;

  protected $fillable = [
    'name', 'description', 'price1', 'price2', 'status',
  ];

  protected $hidden = [
    'remember_token',
  ];

  // protected $casts = [
  //     'prices' => 'array',
  // ];

  protected $attributes = [
    'status' => 1,
  ];

  public $sortable = [
    'name',
    'description',
    'price1',
    'price2',
    'status',
  ];
}

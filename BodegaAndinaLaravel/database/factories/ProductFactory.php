<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {

	// Ruta en donde queremos subir las imágenes
	$filePath = storage_path('app/public/products');

	return [
    'name' => $faker->sentence(8, true),
    'price' => $faker->randomFloat(2, 100, 999999),
    // 'image' => $faker->imageUrl(300, 200, 'cats'),
		'image' => $faker->image($filePath, 400, 300, null, false),
    'varietal_id' => $faker->randomDigit(2, 100, 999999),

  ];
});
//
// $table->bigIncrements('id');
// $table->string('name', 50); // varchar(100)
// $table->decimal('price', 6, 2); // 9.999.99
// $table->string('image', 100); // varchar(100)
// $table->unsignedBigInteger('varietal_id')->nullable();
// $table->foreign('varietal_id')->references('id')->on('varietal');
// $table->timestamps();

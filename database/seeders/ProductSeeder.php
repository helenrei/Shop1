<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the seeder.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Product 1',
            'description' => 'This is the description for Product 1',
            'price' => 9.99,
        ]);

        Product::create([
            'name' => 'Product 2',
            'description' => 'This is the description for Product 2',
            'price' => 3.20,
        ]);
        
        Product::create([
            'name' => 'Product 3',
            'description' => 'This is the description for Product 3',
            'price' => 4.60,
        ]);

        Product::create([
            'name' => 'Product 4',
            'description' => 'This is the description for Product 4',
            'price' => 7.50,
        ]);

        Product::create([
            'name' => 'Product 5',
            'description' => 'This is the description for Product 5',
            'price' => 8.10,
        ]);

        Product::create([
            'name' => 'Product 6',
            'description' => 'This is the description for Product 6',
            'price' => 1.10,
        ]);

        Product::create([
            'name' => 'Product 7',
            'description' => 'This is the description for Product 7',
            'price' => 9.10,
        ]);

        Product::create([
            'name' => 'Product 8',
            'description' => 'This is the description for Product 8',
            'price' => 12.20,
        ]);

        Product::create([
            'name' => 'Product 9',
            'description' => 'This is the description for Product 9',
            'price' => 9.20,
        ]);

        Product::create([
            'name' => 'Product 10',
            'description' => 'This is the description for Product 10',
            'price' => 10.20,
        ]);
        // Add more dummy data as needed
    }
}

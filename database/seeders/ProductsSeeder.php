<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('products')->insert([
            [
                'name'=>'Apple Watch',
                'price'=>'1450',
                'category'=>'Watch',
                'description'=>'Pro-class GPU with 25 cores.',
                'gallery'=>'https://www.istreetkenya.com/wp-content/uploads/2023/04/45mm-Sprout-Green-Solo-Loop-Size-6-2-450x450.webp'
            ],
            [
                'name'=>'AirPods Pro',
                'price'=>'1150',
                'category'=>'HeadPhones',
                'description'=>'Pro-class GPU with 25 cores.',
                'gallery'=>'https://www.istreetkenya.com/wp-content/uploads/2023/04/Apple-Airpods-Pro-4-450x450.webp'
            ],
            [
                'name'=>'Iphone 8',
                'price'=>'1100',
                'category'=>'Mobile Phones',
                'description'=>'Pro-class GPU with 6 cores',
                'gallery'=>'https://www.apple.com/v/iphone-se/k/images/overview/hero/pocket_size__flkz7teo7j2i_large.jpg'
            ],
            [
                'name'=>'Ipad Pro',
                'price'=>'2230',
                'category'=>'WorkStation',
                'description'=>'The Ultimate Ipad experience with the most advanced technology',
                'gallery'=>'https://www.apple.com/v/ipad-pro/am/images/overview/apps/ipados_vertical_3__ctxoloddz5me_large.png'
            ],
            
           
        ]);





    }
}

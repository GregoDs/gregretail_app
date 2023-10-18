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
                'name'=>'Iphone 15 Pro',
                'price'=>'1450',
                'category'=>'Mobile Phone',
                'description'=>'Pro-class GPU with 25 cores.',
                'gallery'=>'https://www.apple.com/v/iphone-15-pro/a/images/overview/closer-look/white_titanium__b3fwwp6zrrhy_small.jpg'
            ],
            [
                'name'=>'MacBook Air 15',
                'price'=>'1150',
                'category'=>'Laptops',
                'description'=>'Pro-class GPU with 25 cores.',
                'gallery'=>'https://www.apple.com/v/macbook-pro-14-and-16/e/images/overview/shared/m2_laptop_hw__c84jsepabw2u_large.jpg'
            ],
            [
                'name'=>'Airpods Pro',
                'price'=>'400',
                'category'=>'Headphones',
                'description'=>'Pro-class GPU with 6 cores',
                'gallery'=>'https://www.apple.com/v/airpods-pro/i/images/overview/magical_case__epo6duhktocy_small.png'
            ],
            [
                'name'=>'Ipad Pro',
                'price'=>'200',
                'category'=>'WorkStation',
                'description'=>'The Ultimate Ipad experience with the most advanced technology',
                'gallery'=>'https://www.apple.com/105/media/us/ipad-pro/2022/08087f4b-7539-4b1e-ae8a-adc18f4242ae/anim/hero/large.mp4'
            ],
            [
                'name'=>'Vision Pro',
                'price'=>'3789',
                'category'=>'Headset',
                'description'=>'Powerful M2 chip  running visionOS',
                'gallery'=>'https://www.apple.com/v/apple-vision-pro/a/images/overview/hero/portrait_base__bwsgtdddcl7m_small.jpg',
    
            ],
            [
                'name'=>'Iphone SE',
                'price'=>'1290',
                'category'=>'Mobile Phone',
                'description'=>'Powerful M2 chip  running visionOS',
                'gallery'=>'https://www.apple.com/v/iphone-se/k/images/overview/hero/pocket_size__flkz7teo7j2i_small.jpg',
    
            ],
        ]);





    }
}

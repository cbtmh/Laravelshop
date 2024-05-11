<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_product')->insert([
            'product_name'=> 'ROG Zephyrus',
            'category_id'=> '1',
            'brand_id'=> '1',
            'productStatus'=> '1',
            'product_desc'=> 'NVIDIA® GeForce RTX™ 3070 Ti Laptop GPU
                                Windows 11 Home
                                12th Gen Intel® Core™ i9-12900H
                                ROG Nebula Display
                                16 inch, QHD+ 16:10 (2560 x 1600, WQXGA), Tần số làm mới:165Hz
                                1TB PCIe® 4.0 NVMe™ M.2 Performance SSD',
            'product_content'=>'Chơi game siêu mượt',
            'img'=>'https://lzd-img-global.slatic.net/g/p/543d7be238bdd9fb6eec5cbdb0d970ca.jpg_360x360q75.jpg_.webp',
            'product_price'=>'XL',
            'color'=>'Trắng',
            'status'=>'thành công',
            'payment_method'=>'viettel pay',
            'userId'=> '21',
            'created_at'=> '1998-12-31 18:30:28',
            'update_at'=> '1998-12-31 18:30:56',
            'shiptime_start_at'=> '1999-01-01 01:30:28',
            'completed_at'=> '1999-01-01 01:45:00',
            'paytime'=>'1999-01-01 02:50:28',
            'order_time'=>'1998-12-31 18:40:00',
            'DistrictId'=>'D01',
            'ProvinceID'=>'P04',
            'detailAddress'=>'hai ba trung ha noi',
            'WardCode'=>'W25',
            'ship_price'=> '20000',
            'total_price'=>'185000',
            'comment'=>'',
            'rate'=>''
        ]);
    }
}

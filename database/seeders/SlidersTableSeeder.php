<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SlidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Slider::insert(
            [
                [ 
                    'id' => 1,
                    'title'      => 'مركز الخدمات الفنية المحدودة', 
                    'body'      => 'نسعى للوصول لبيئة صحية بما نملك من الموارد البشرية
                    نعمل في مجال مكافحة الحشرات والتطهير منذ عام 1982', 
                    'button_name'      => 'المزيد',  
                    'link' => '#',
                    'publish' => 1,
                ],
                [ 
                    'id' => 2,
                    'title'      => 'مركز الخدمات الفنية المحدودة', 
                    'body'      => 'نسعى للوصول لبيئة صحية بما نملك من الموارد البشرية
                    نعمل في مجال مكافحة الحشرات والتطهير منذ عام 1982', 
                    'button_name'      => 'المزيد',  
                    'link' => '#',
                    'publish' => 1,
                ],
                [ 
                    'id' => 3,
                    'title'      => 'مركز الخدمات الفنية المحدودة', 
                    'body'      => 'نسعى للوصول لبيئة صحية بما نملك من الموارد البشرية
                    نعمل في مجال مكافحة الحشرات والتطهير منذ عام 1982', 
                    'button_name'      => 'المزيد',  
                    'link' => '#',
                    'publish' => 1,
                ],
            ]
        );   
    }
}

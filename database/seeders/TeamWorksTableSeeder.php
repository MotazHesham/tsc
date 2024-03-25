<?php

namespace Database\Seeders;

use App\Models\TeamWork;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamWorksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TeamWork::insert(
            [
                [
                    'name' => 'عبد الله حسين',
                    'job' => 'رئيس مجلس الإدارة',
                    'twitter' => 'https://twitter.com/',
                    'linkedin' => 'https://linkedin.com/',
                    'facebook' => 'https://www.facebook.com/',
                ],
                [
                    'name' => 'أحمد ياسين',
                    'job' => 'مدير',
                    'twitter' => 'https://twitter.com/',
                    'linkedin' => 'https://linkedin.com/',
                    'facebook' => 'https://www.facebook.com/',
                ],
                [
                    'name' => 'عبد العزيز عبد الله',
                    'job' => 'محاسب',
                    'twitter' => 'https://twitter.com/',
                    'linkedin' => 'https://linkedin.com/',
                    'facebook' => 'https://www.facebook.com/',
                ],
                [
                    'name' => 'محمد عبد العزيز',
                    'job' => 'محاسب',
                    'twitter' => 'https://twitter.com/',
                    'linkedin' => 'https://linkedin.com/',
                    'facebook' => 'https://www.facebook.com/',
                ],
            ]
        );
    }
}

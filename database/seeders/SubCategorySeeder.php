<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subCategories = [
            [
                'category_id'   => '1',
                'name'          => 'Fixed income',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'category_id'   => '2',
                'name'          => 'FnB',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ]
        ];

        SubCategory::insert($subCategories);
    }
}

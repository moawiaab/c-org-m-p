<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Country;
use App\Models\Ctiy;
use Illuminate\Database\Seeder;

class CountryAndCity extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $conutry = [
            [
                'id'    => 1,
                'name'  => 'سودان',
                'code'  => 'SD',
            ],
            [
                'id'    => 2,
                'name'  => 'مصر',
                'code'  => 'Eg',
            ],
        ];

        $city = [
            [
                'id'   => 1,
                'name'   => 'ولاية الخرطوم',
                'country_id'   => 1,
            ],
            [
                'id'   => 2,
                'name'   => 'ولاية الجزيرة',
                'country_id'   => 1,
            ],
            [
                'id'   => 3,
                'name'   => 'ولاية البحر الأحمر',
                'country_id'   => 1,
            ],
            [
                'id'   => 4,
                'name'   => 'ولاية كسلا',
                'country_id'   => 1,
            ],
            [
                'id'   => 5,
                'name'   => 'ولاية القضارف',
                'country_id'   => 1,
            ],
            [
                'id'   => 6,
                'name'   => 'ولاية جنوب دارفور',
                'country_id'   => 1,
            ],
        ];

        $aera = [
            [
                'id'             => 1,
                'name'           => 'الوحدة جنوب',
                'city_id'        => 6,
                'country_id'     => 1,
            ],
            [
                'id'             => 2,
                'name'           => 'الوحدة غرب',
                'city_id'        => 6,
                'country_id'     => 1,
            ],
            [
                'id'             => 3,
                'name'           => 'السلام شمال',
                'city_id'        => 6,
                'country_id'     => 1,
            ],
            [
                'id'             => 4,
                'name'           => 'السلام شمال',
                'city_id'        => 6,
                'country_id'     => 1,
            ],
            [
                'id'             => 5,
                'name'           => 'المهندسين',
                'city_id'        => 1,
                'country_id'     => 1,
            ],
            [
                'id'             => 6,
                'name'           => 'ام بدة',
                'city_id'        => 1,
                'country_id'     => 1,
            ],
            [
                'id'             => 7,
                'name'           => 'جبرة',
                'city_id'        => 1,
                'country_id'     => 1,
            ],

        ];
        Country::insert($conutry);
        Ctiy::insert($city);
        Area::insert($aera);
    }
}

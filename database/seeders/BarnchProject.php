<?php

namespace Database\Seeders;

use App\Models\ProjectBranch;
use App\Models\ProjectDepartment;
use Illuminate\Database\Seeder;

class BarnchProject extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dev = [
            [
                'id'       => 1,
                'name'     => 'الايتام',
                'details'  => 'الايتام',
                'user_id'  => 1,
                'br_id'    => 1,
            ],
            [
                'id'       => 2,
                'name'     => 'المساجد',
                'details'  => 'المساجد',
                'user_id'  => 1,
                'br_id'    => 1,
            ],
            [
                'id'       => 3,
                'name'     => 'المياه',
                'details'  => 'المياه',
                'user_id'  => 1,
                'br_id'    => 1,
            ],
            [
                'id'       => 4,
                'name'     => 'الإغاثية',
                'details'  => 'الإغاثية',
                'user_id'  => 1,
                'br_id'    => 1,
            ],
        ];

        $branch = [
            [
                'id'       => 1,
                'name'     => 'كفالة',
                'details'  => 'كفالة',
                'proj_id'  => 1,
                'user_id'  => 1,
                'br_id'    => 1,
            ],
            [
                'id'       => 2,
                'name'     => 'رحلة ترفهية',
                'details'  => 'رحلة ترفهية',
                'proj_id'  => 1,
                'user_id'  => 1,
                'br_id'    => 1,
            ],
            [
                'id'       => 3,
                'name'     => 'مشاريع تنموية',
                'details'  => 'مشاريع تنموية',
                'proj_id'  => 1,
                'user_id'  => 1,
                'br_id'    => 1,
            ],
            [
                'id'       => 4,
                'name'     => 'مسجد ثابت',
                'details'  => 'مسجد ثابت',
                'proj_id'  => 2,
                'user_id'  => 1,
                'br_id'    => 1,
            ],
            [
                'id'       => 5,
                'name'     => 'مسجد زنك',
                'details'  => 'مسجد زنك',
                'proj_id'  => 2,
                'user_id'  => 1,
                'br_id'    => 1,
            ],
            [
                'id'       => 6,
                'name'     => 'ماسورة',
                'details'  => 'ماسورة',
                'proj_id'  => 3,
                'user_id'  => 1,
                'br_id'    => 1,
            ],
            [
                'id'       => 7,
                'name'     => 'سلة رمضان',
                'details'  => 'سلة رمضان',
                'proj_id'  => 4,
                'user_id'  => 1,
                'br_id'    => 1,
            ],
        ];

        ProjectDepartment::insert($dev);
        ProjectBranch::insert($branch);
    }
}

<?php

namespace Database\Seeders;

use App\Models\ProjectStage;
use Illuminate\Database\Seeder;

class ProjectPhasesItem extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $proj = [
            [
                'id'          => 1,
                'name'        => 'شراء مواد',
                'details'     => 'شراء مواد',
                'status'      => 1,
                'br_id'       => 1,
            ],
            [
                'id'          => 2,
                'name'        => 'التننفيذ',
                'details'     => 'التننفيذ',
                'status'      => 1,
                'br_id'       => 1,
            ],
            [
                'id'          => 3,
                'name'        => 'التقرير',
                'details'     => 'التقرير',
                'status'      => 1,
                'br_id'       => 1,
            ],
            [
                'id'          => 4,
                'name'        => 'ارسال التقرير',
                'details'     => 'ارسال',
                'status'      => 1,
                'br_id'       => 1,
            ],
        ];

        ProjectStage::insert($proj);
    }
}

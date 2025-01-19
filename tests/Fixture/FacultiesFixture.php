<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FacultiesFixture
 */
class FacultiesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'faculty_id' => 1,
                'faculty_department' => 'Lorem ipsum dolor sit amet',
                'faculty_name' => 'Lorem ipsum dolor sit amet',
                'status' => 1,
                'created' => '2025-01-18 14:21:14',
                'modified' => '2025-01-18 14:21:14',
            ],
        ];
        parent::init();
    }
}

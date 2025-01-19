<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LecturersFixture
 */
class LecturersFixture extends TestFixture
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
                'lecturer_id' => 1,
                'lecturer_email' => 'Lorem ipsum dolor sit amet',
                'lecturer_name' => 'Lorem ipsum dolor sit amet',
                'lecturer_department' => 'Lorem ipsum dolor sit amet',
                'faculty_id' => 1,
                'status' => 1,
                'created' => '2025-01-18 19:29:43',
                'modified' => '2025-01-18 19:29:43',
            ],
        ];
        parent::init();
    }
}

<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SemestersFixture
 */
class SemestersFixture extends TestFixture
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
                'semester_id' => 1,
                'semester_name' => 'Lorem ipsum dolor sit amet',
                'semester_startdate' => '2025-01-18',
                'semester_enddate' => '2025-01-18',
                'course_id' => 'Lorem ip',
                'status' => 1,
                'created' => '2025-01-18 14:24:54',
                'modified' => '2025-01-18 14:24:54',
            ],
        ];
        parent::init();
    }
}

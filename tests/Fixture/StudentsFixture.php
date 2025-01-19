<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StudentsFixture
 */
class StudentsFixture extends TestFixture
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
                'student_id' => 1,
                'student_name' => 'Lorem ipsum dolor sit amet',
                'student_email' => 'Lorem ipsum dolor sit amet',
                'student_phone' => 1,
                'student_address1' => 'Lorem ipsum dolor sit amet',
                'status' => 1,
                'created' => '2025-01-19 17:36:29',
                'modified' => '2025-01-19 17:36:29',
                'student_address2' => 'Lorem ipsum dolor sit amet',
                'student_postcode' => 'Lorem ipsum dolor sit amet',
                'student_city' => 'Lorem ipsum dolor sit amet',
                'student_state' => 'Lorem ipsum dolor sit amet',
                'faculty_id' => 1,
                'semester_id' => 1,
            ],
        ];
        parent::init();
    }
}

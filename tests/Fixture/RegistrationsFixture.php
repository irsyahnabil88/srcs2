<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RegistrationsFixture
 */
class RegistrationsFixture extends TestFixture
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
                'registration_id' => 1,
                'student_id' => 1,
                'subject_id' => 1,
                'registration_date' => '2025-01-18 19:30:41',
            ],
        ];
        parent::init();
    }
}

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
                'registration_date' => '2025-01-20',
                'status' => 1,
                'created' => '2025-01-20 13:09:17',
                'modified' => '2025-01-20 13:09:17',
            ],
        ];
        parent::init();
    }
}

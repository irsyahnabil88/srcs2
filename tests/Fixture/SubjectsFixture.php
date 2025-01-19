<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SubjectsFixture
 */
class SubjectsFixture extends TestFixture
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
                'subject_id' => 1,
                'subject_name' => 'Lorem ipsum dolor sit amet',
                'subject_description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'subject_credits' => 1,
                'lecturer_id' => 1,
                'status' => 1,
                'created' => '2025-01-19 20:02:23',
                'modified' => '2025-01-19 20:02:23',
                'subject_code' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}

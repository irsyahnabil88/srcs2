<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Semester Entity
 *
 * @property int $semester_id
 * @property string $semester_name
 * @property \Cake\I18n\Date $semester_startdate
 * @property \Cake\I18n\Date $semester_enddate
 * @property string $course_id
 * @property int $status
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 */
class Semester extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'semester_name' => true,
        'semester_startdate' => true,
        'semester_enddate' => true,
        'course_id' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
    ];
}

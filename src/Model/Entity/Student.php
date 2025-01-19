<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Student Entity
 *
 * @property int $student_id
 * @property string $student_name
 * @property string $student_email
 * @property int $student_phone
 * @property string $student_address1
 * @property int|null $status
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 * @property string $student_address2
 * @property string $student_postcode
 * @property string $student_city
 * @property string $student_state
 * @property int $faculty_id
 * @property int $semester_id
 */
class Student extends Entity
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
        'student_name' => true,
        'student_email' => true,
        'student_phone' => true,
        'student_address1' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'student_address2' => true,
        'student_postcode' => true,
        'student_city' => true,
        'student_state' => true,
        'faculty_id' => true,
        'semester_id' => true,
    ];
}

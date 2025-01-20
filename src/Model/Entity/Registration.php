<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Registration Entity
 *
 * @property int $registration_id
 * @property int $student_id
 * @property int $subject_id
 * @property \Cake\I18n\Date $registration_date
 * @property int|null $status
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Student $student
 * @property \App\Model\Entity\Subject $subject
 */
class Registration extends Entity
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
        'student_id' => true,
        'subject_id' => true,
        'registration_date' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'student' => true,
        'subject' => true,
    ];
}

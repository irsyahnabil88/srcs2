<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Lecturer Entity
 *
 * @property int $lecturer_id
 * @property string $lecturer_name
 * @property string $lecturer_email
 * @property string $lecturer_department
 * @property int $faculty_id
 * @property int $status
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Faculty $faculty
 */
class Lecturer extends Entity
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
        'lecturer_name' => true,
        'lecturer_email' => true,
        'lecturer_department' => true,
        'faculty_id' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'faculty' => true,
    ];
}

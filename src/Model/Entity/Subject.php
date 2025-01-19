<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Subject Entity
 *
 * @property int $subject_id
 * @property string $subject_name
 * @property string $subject_description
 * @property int $subject_credits
 * @property int $lecturer_id
 * @property int|null $status
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 * @property string $subject_code
 *
 * @property \App\Model\Entity\Lecturer $lecturer
 */
class Subject extends Entity
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
        'subject_name' => true,
        'subject_description' => true,
        'subject_credits' => true,
        'lecturer_id' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'subject_code' => true,
        'lecturer' => true,
    ];
}

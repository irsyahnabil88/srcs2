<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Lecturers Model
 *
 * @property \App\Model\Table\FacultiesTable&\Cake\ORM\Association\BelongsTo $Faculties
 *
 * @method \App\Model\Entity\Lecturer newEmptyEntity()
 * @method \App\Model\Entity\Lecturer newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Lecturer> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Lecturer get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Lecturer findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Lecturer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Lecturer> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Lecturer|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Lecturer saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Lecturer>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Lecturer>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Lecturer>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Lecturer> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Lecturer>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Lecturer>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Lecturer>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Lecturer> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LecturersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('lecturers');
        $this->setDisplayField('lecturer_email');
        $this->setPrimaryKey('lecturer_id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Faculties', [
            'foreignKey' => 'faculty_id',
            'joinType' => 'INNER',
        ]);
		$this->addBehavior('AuditStash.AuditLog');
		$this->addBehavior('Search.Search');
		$this->searchManager()
			->value('id')
				->add('search', 'Search.Like', [
					//'before' => true,
					//'after' => true,
					'fieldMode' => 'OR',
					'multiValue' => true,
					'multiValueSeparator' => '|',
					'comparison' => 'LIKE',
					'wildcardAny' => '*',
					'wildcardOne' => '?',
					'fields' => ['id'],
				]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('lecturer_name')
            ->maxLength('lecturer_name', 50)
            ->requirePresence('lecturer_name', 'create')
            ->notEmptyString('lecturer_name');

        $validator
            ->scalar('lecturer_email')
            ->maxLength('lecturer_email', 50)
            ->requirePresence('lecturer_email', 'create')
            ->notEmptyString('lecturer_email');

        $validator
            ->scalar('lecturer_department')
            ->maxLength('lecturer_department', 50)
            ->requirePresence('lecturer_department', 'create')
            ->notEmptyString('lecturer_department');

        $validator
            ->integer('faculty_id')
            ->notEmptyString('faculty_id');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['faculty_id'], 'Faculties'), ['errorField' => 'faculty_id']);

        return $rules;
    }
}

<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Students Model
 *
 * @method \App\Model\Entity\Student newEmptyEntity()
 * @method \App\Model\Entity\Student newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Student> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Student get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Student findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Student patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Student> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Student|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Student saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Student>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Student>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Student>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Student> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Student>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Student>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Student>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Student> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StudentsTable extends Table
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

        $this->setTable('students');
        $this->setDisplayField('student_name');
        $this->setPrimaryKey('student_id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Faculties', [
            'foreignKey' => 'faculty_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Semesters', [
            'foreignKey' => 'semester_id',
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
            ->scalar('student_name')
            ->maxLength('student_name', 50)
            ->requirePresence('student_name', 'create')
            ->notEmptyString('student_name');

        $validator
            ->scalar('student_email')
            ->maxLength('student_email', 50)
            ->requirePresence('student_email', 'create')
            ->notEmptyString('student_email');

        $validator
            ->integer('student_phone')
            ->requirePresence('student_phone', 'create')
            ->notEmptyString('student_phone');

        $validator
            ->scalar('student_address1')
            ->maxLength('student_address1', 255)
            ->requirePresence('student_address1', 'create')
            ->notEmptyString('student_address1');

        $validator
            ->integer('status')
            ->allowEmptyString('status');

        $validator
            ->scalar('student_address2')
            ->maxLength('student_address2', 255)
            ->requirePresence('student_address2', 'create')
            ->notEmptyString('student_address2');

        $validator
            ->scalar('student_postcode')
            ->maxLength('student_postcode', 255)
            ->requirePresence('student_postcode', 'create')
            ->notEmptyString('student_postcode');

        $validator
            ->scalar('student_city')
            ->maxLength('student_city', 255)
            ->requirePresence('student_city', 'create')
            ->notEmptyString('student_city');

        $validator
            ->scalar('student_state')
            ->maxLength('student_state', 255)
            ->requirePresence('student_state', 'create')
            ->notEmptyString('student_state');

        $validator
            ->integer('faculty_id')
            ->notEmptyString('faculty_id');

        $validator
            ->integer('semester_id')
            ->notEmptyString('semester_id');

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
        $rules->add($rules->existsIn(['semester_id'], 'Semesters'), ['errorField' => 'semester_id']);

        return $rules;
    }
}

<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Semesters Model
 *
 * @method \App\Model\Entity\Semester newEmptyEntity()
 * @method \App\Model\Entity\Semester newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Semester> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Semester get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Semester findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Semester patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Semester> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Semester|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Semester saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Semester>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Semester>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Semester>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Semester> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Semester>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Semester>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Semester>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Semester> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SemestersTable extends Table
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

        $this->setTable('semesters');
        $this->setDisplayField('semester_name');
        $this->setPrimaryKey('semester_id');

        $this->addBehavior('Timestamp');
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
            ->scalar('semester_name')
            ->maxLength('semester_name', 50)
            ->requirePresence('semester_name', 'create')
            ->notEmptyString('semester_name');

        $validator
            ->date('semester_startdate')
            ->requirePresence('semester_startdate', 'create')
            ->notEmptyDate('semester_startdate');

        $validator
            ->date('semester_enddate')
            ->requirePresence('semester_enddate', 'create')
            ->notEmptyDate('semester_enddate');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        return $validator;
    }
}

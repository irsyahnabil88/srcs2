<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Faculties Model
 *
 * @method \App\Model\Entity\Faculty newEmptyEntity()
 * @method \App\Model\Entity\Faculty newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Faculty> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Faculty get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Faculty findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Faculty patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Faculty> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Faculty|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Faculty saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Faculty>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Faculty>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Faculty>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Faculty> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Faculty>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Faculty>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Faculty>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Faculty> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FacultiesTable extends Table
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

        $this->setTable('faculties');
        $this->setDisplayField('faculty_department');
        $this->setPrimaryKey('faculty_id');
        $this->hasMany('Lecturers', [
            'foreignKey' => 'faculty_id',
        ]);

        $this->addBehavior('Timestamp');
		$this->addBehavior('AuditStash.AuditLog');
		$this->addBehavior('Search.Search');
		$this->searchManager()
			->value('faculty_name')
				->add('search', 'Search.Like', [
					//'before' => true,
					//'after' => true,
					'fieldMode' => 'OR',
					'multiValue' => true,
					'multiValueSeparator' => '|',
					'comparison' => 'LIKE',
					'wildcardAny' => '*',
					'wildcardOne' => '?',
					'fields' => ['faculty_name'],
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
            ->scalar('faculty_department')
            ->maxLength('faculty_department', 55)
            ->requirePresence('faculty_department', 'create')
            ->notEmptyString('faculty_department');

        $validator
            ->scalar('faculty_name')
            ->maxLength('faculty_name', 50)
            ->requirePresence('faculty_name', 'create')
            ->notEmptyString('faculty_name');

        $validator
            ->integer('status')
            ->notEmptyString('status');

        return $validator;
    }
}

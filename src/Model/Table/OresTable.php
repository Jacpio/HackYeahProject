<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ores Model
 *
 * @method \App\Model\Entity\Ore newEmptyEntity()
 * @method \App\Model\Entity\Ore newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Ore> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ore get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Ore findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Ore patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Ore> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ore|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Ore saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Ore>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ore>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ore>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ore> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ore>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ore>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ore>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ore> deleteManyOrFail(iterable $entities, array $options = [])
 */
class OresTable extends Table
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

        $this->setTable('ores');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
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
            ->scalar('name')
            ->maxLength('name', 11)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->dateTime('request_date')
            ->requirePresence('request_date', 'create')
            ->notEmptyDateTime('request_date');

        $validator
            ->date('measurment_date')
            ->requirePresence('measurment_date', 'create')
            ->notEmptyDate('measurment_date');

        return $validator;
    }
}

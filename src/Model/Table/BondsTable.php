<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Bonds Model
 *
 * @method \App\Model\Entity\Bond newEmptyEntity()
 * @method \App\Model\Entity\Bond newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Bond> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Bond get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Bond findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Bond patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Bond> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Bond|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Bond saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Bond>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Bond>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Bond>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Bond> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Bond>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Bond>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Bond>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Bond> deleteManyOrFail(iterable $entities, array $options = [])
 */
class BondsTable extends Table
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

        $this->setTable('bonds');
        $this->setDisplayField('id');
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
            ->numeric('series')
            ->requirePresence('series', 'create')
            ->notEmptyString('series');

        $validator
            ->numeric('price')
            ->requirePresence('price', 'create')
            ->notEmptyString('price');

        $validator
            ->numeric('interest')
            ->requirePresence('interest', 'create')
            ->notEmptyString('interest');

        return $validator;
    }
}

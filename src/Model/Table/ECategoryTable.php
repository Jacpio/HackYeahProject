<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ECategory Model
 *
 * @property \App\Model\Table\ExpensesTable&\Cake\ORM\Association\HasMany $Expenses
 *
 * @method \App\Model\Entity\ECategory newEmptyEntity()
 * @method \App\Model\Entity\ECategory newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\ECategory> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ECategory get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\ECategory findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\ECategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\ECategory> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ECategory|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\ECategory saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\ECategory>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ECategory>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ECategory>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ECategory> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ECategory>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ECategory>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ECategory>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ECategory> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ECategoryTable extends Table
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

        $this->setTable('e_category');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Expenses', [
            'foreignKey' => 'category_id',
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
            ->scalar('name')
            ->maxLength('name', 15)
            ->allowEmptyString('name');

        return $validator;
    }
}

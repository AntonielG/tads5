<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tipos Model
 *
 * @property \App\Model\Table\VeiculosTable&\Cake\ORM\Association\HasMany $Veiculos
 *
 * @method \App\Model\Entity\Tipo newEmptyEntity()
 * @method \App\Model\Entity\Tipo newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Tipo> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tipo get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Tipo findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Tipo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Tipo> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tipo|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Tipo saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Tipo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tipo>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Tipo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tipo> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Tipo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tipo>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Tipo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tipo> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TiposTable extends Table
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

        $this->setTable('tipos');
        $this->setDisplayField('tipo');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Veiculos', [
            'foreignKey' => 'tipo_id',
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
            ->scalar('tipo')
            ->maxLength('tipo', 100)
            ->requirePresence('tipo', 'create')
            ->notEmptyString('tipo');

        $validator
            ->scalar('ativo')
            ->maxLength('ativo', 1)
            ->allowEmptyString('ativo');

        return $validator;
    }
}

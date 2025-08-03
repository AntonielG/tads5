<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Fabricantes Model
 *
 * @property \App\Model\Table\VeiculosTable&\Cake\ORM\Association\HasMany $Veiculos
 *
 * @method \App\Model\Entity\Fabricante newEmptyEntity()
 * @method \App\Model\Entity\Fabricante newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Fabricante> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Fabricante get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Fabricante findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Fabricante patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Fabricante> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Fabricante|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Fabricante saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Fabricante>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Fabricante>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Fabricante>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Fabricante> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Fabricante>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Fabricante>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Fabricante>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Fabricante> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FabricantesTable extends Table
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

        $this->setTable('fabricantes');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Veiculos', [
            'foreignKey' => 'fabricante_id',
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
            ->scalar('nome')
            ->maxLength('nome', 180)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome');

        $validator
            ->scalar('abreviado')
            ->maxLength('abreviado', 18)
            ->requirePresence('abreviado', 'create')
            ->notEmptyString('abreviado');

        $validator
            ->scalar('ativo')
            ->maxLength('ativo', 1)
            ->allowEmptyString('ativo');

        return $validator;
    }
}

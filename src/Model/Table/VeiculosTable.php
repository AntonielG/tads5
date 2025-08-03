<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Veiculos Model
 *
 * @property \App\Model\Table\FabricantesTable&\Cake\ORM\Association\BelongsTo $Fabricantes
 * @property \App\Model\Table\TiposTable&\Cake\ORM\Association\BelongsTo $Tipos
 * @property \App\Model\Table\ManutencaosTable&\Cake\ORM\Association\HasMany $Manutencaos
 *
 * @method \App\Model\Entity\Veiculo newEmptyEntity()
 * @method \App\Model\Entity\Veiculo newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Veiculo> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Veiculo get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Veiculo findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Veiculo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Veiculo> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Veiculo|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Veiculo saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Veiculo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Veiculo>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Veiculo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Veiculo> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Veiculo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Veiculo>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Veiculo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Veiculo> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class VeiculosTable extends Table
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

        $this->setTable('veiculos');
        $this->setDisplayField('modelo');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Fabricantes', [
            'foreignKey' => 'fabricante_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Tipos', [
            'foreignKey' => 'tipo_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Manutencaos', [
            'foreignKey' => 'veiculo_id',
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
            ->scalar('modelo')
            ->maxLength('modelo', 160)
            ->requirePresence('modelo', 'create')
            ->notEmptyString('modelo');

        $validator
            ->integer('ano')
            ->requirePresence('ano', 'create')
            ->notEmptyString('ano');

        $validator
            ->scalar('placa')
            ->maxLength('placa', 8)
            ->requirePresence('placa', 'create')
            ->notEmptyString('placa');

        $validator
            ->scalar('ativo')
            ->maxLength('ativo', 1)
            ->allowEmptyString('ativo');

        $validator
            ->integer('fabricante_id')
            ->notEmptyString('fabricante_id');

        $validator
            ->integer('tipo_id')
            ->notEmptyString('tipo_id');

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
        $rules->add($rules->existsIn(['fabricante_id'], 'Fabricantes'), ['errorField' => 'fabricante_id']);
        $rules->add($rules->existsIn(['tipo_id'], 'Tipos'), ['errorField' => 'tipo_id']);

        return $rules;
    }
}

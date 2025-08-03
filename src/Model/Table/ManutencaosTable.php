<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Manutencaos Model
 *
 * @property \App\Model\Table\FornecedorsTable&\Cake\ORM\Association\BelongsTo $Fornecedors
 * @property \App\Model\Table\VeiculosTable&\Cake\ORM\Association\BelongsTo $Veiculos
 * @property \App\Model\Table\ManupecasTable&\Cake\ORM\Association\HasMany $Manupecas
 *
 * @method \App\Model\Entity\Manutencao newEmptyEntity()
 * @method \App\Model\Entity\Manutencao newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Manutencao> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Manutencao get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Manutencao findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Manutencao patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Manutencao> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Manutencao|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Manutencao saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Manutencao>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Manutencao>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Manutencao>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Manutencao> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Manutencao>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Manutencao>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Manutencao>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Manutencao> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ManutencaosTable extends Table
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

        $this->setTable('manutencaos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Fornecedors', [
            'foreignKey' => 'fornecedor_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Veiculos', [
            'foreignKey' => 'veiculo_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Manupecas', [
            'foreignKey' => 'manutencao_id',
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
            ->decimal('valor')
            ->requirePresence('valor', 'create')
            ->notEmptyString('valor');

        $validator
            ->date('data')
            ->requirePresence('data', 'create')
            ->notEmptyDate('data');

        $validator
            ->integer('numntfiscal')
            ->allowEmptyString('numntfiscal');

        $validator
            ->scalar('ativo')
            ->maxLength('ativo', 1)
            ->allowEmptyString('ativo');

        $validator
            ->integer('fornecedor_id')
            ->notEmptyString('fornecedor_id');

        $validator
            ->integer('veiculo_id')
            ->notEmptyString('veiculo_id');

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
        $rules->add($rules->existsIn(['fornecedor_id'], 'Fornecedors'), ['errorField' => 'fornecedor_id']);
        $rules->add($rules->existsIn(['veiculo_id'], 'Veiculos'), ['errorField' => 'veiculo_id']);

        return $rules;
    }
}

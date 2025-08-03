<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pecas Model
 *
 * @property \App\Model\Table\FornecedorsTable&\Cake\ORM\Association\BelongsTo $Fornecedors
 * @property \App\Model\Table\ManupecasTable&\Cake\ORM\Association\HasMany $Manupecas
 *
 * @method \App\Model\Entity\Peca newEmptyEntity()
 * @method \App\Model\Entity\Peca newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Peca> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Peca get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Peca findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Peca patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Peca> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Peca|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Peca saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Peca>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Peca>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Peca>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Peca> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Peca>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Peca>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Peca>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Peca> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PecasTable extends Table
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

        $this->setTable('pecas');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Fornecedors', [
            'foreignKey' => 'fornecedor_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Manupecas', [
            'foreignKey' => 'peca_id',
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
            ->decimal('valor')
            ->requirePresence('valor', 'create')
            ->notEmptyString('valor');

        $validator
            ->integer('garantia')
            ->allowEmptyString('garantia');

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

        return $rules;
    }
}

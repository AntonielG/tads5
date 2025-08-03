<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Manupecas Model
 *
 * @property \App\Model\Table\ManutencaosTable&\Cake\ORM\Association\BelongsTo $Manutencaos
 * @property \App\Model\Table\PecasTable&\Cake\ORM\Association\BelongsTo $Pecas
 *
 * @method \App\Model\Entity\Manupeca newEmptyEntity()
 * @method \App\Model\Entity\Manupeca newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Manupeca> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Manupeca get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Manupeca findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Manupeca patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Manupeca> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Manupeca|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Manupeca saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Manupeca>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Manupeca>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Manupeca>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Manupeca> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Manupeca>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Manupeca>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Manupeca>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Manupeca> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ManupecasTable extends Table
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

        $this->setTable('manupecas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Manutencaos', [
            'foreignKey' => 'manutencao_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Pecas', [
            'foreignKey' => 'peca_id',
            'joinType' => 'INNER',
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
            ->scalar('ativo')
            ->maxLength('ativo', 1)
            ->allowEmptyString('ativo');

        $validator
            ->integer('manutencao_id')
            ->notEmptyString('manutencao_id');

        $validator
            ->integer('peca_id')
            ->notEmptyString('peca_id');

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
        $rules->add($rules->existsIn(['manutencao_id'], 'Manutencaos'), ['errorField' => 'manutencao_id']);
        $rules->add($rules->existsIn(['peca_id'], 'Pecas'), ['errorField' => 'peca_id']);

        return $rules;
    }
}

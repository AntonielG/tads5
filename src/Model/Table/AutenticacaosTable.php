<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Autenticacaos Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Autenticacao newEmptyEntity()
 * @method \App\Model\Entity\Autenticacao newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Autenticacao> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Autenticacao get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Autenticacao findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Autenticacao patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Autenticacao> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Autenticacao|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Autenticacao saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Autenticacao>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Autenticacao>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Autenticacao>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Autenticacao> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Autenticacao>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Autenticacao>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Autenticacao>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Autenticacao> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AutenticacaosTable extends Table
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

        $this->setTable('autenticacaos');
        $this->setDisplayField('hash');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
            ->scalar('hash')
            ->maxLength('hash', 255)
            ->requirePresence('hash', 'create')
            ->notEmptyString('hash');

        $validator
            ->date('expira')
            ->requirePresence('expira', 'create')
            ->notEmptyDate('expira');

        $validator
            ->scalar('ativo')
            ->maxLength('ativo', 1)
            ->allowEmptyString('ativo');

        $validator
            ->integer('user_id')
            ->notEmptyString('user_id');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}

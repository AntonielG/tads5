<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Fornecedors Model
 *
 * @property \App\Model\Table\ServicosTable&\Cake\ORM\Association\BelongsTo $Servicos
 * @property \App\Model\Table\ManutencaosTable&\Cake\ORM\Association\HasMany $Manutencaos
 * @property \App\Model\Table\PecasTable&\Cake\ORM\Association\HasMany $Pecas
 *
 * @method \App\Model\Entity\Fornecedor newEmptyEntity()
 * @method \App\Model\Entity\Fornecedor newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Fornecedor> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Fornecedor get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Fornecedor findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Fornecedor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Fornecedor> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Fornecedor|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Fornecedor saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Fornecedor>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Fornecedor>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Fornecedor>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Fornecedor> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Fornecedor>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Fornecedor>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Fornecedor>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Fornecedor> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FornecedorsTable extends Table
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

        $this->setTable('fornecedors');
        $this->setDisplayField('cnpj');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Servicos', [
            'foreignKey' => 'servico_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Manutencaos', [
            'foreignKey' => 'fornecedor_id',
        ]);
        $this->hasMany('Pecas', [
            'foreignKey' => 'fornecedor_id',
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
            ->scalar('cnpj')
            ->maxLength('cnpj', 18)
            ->requirePresence('cnpj', 'create')
            ->notEmptyString('cnpj');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 200)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome');

        $validator
            ->scalar('telefone')
            ->maxLength('telefone', 15)
            ->requirePresence('telefone', 'create')
            ->notEmptyString('telefone');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('logradouro')
            ->maxLength('logradouro', 180)
            ->requirePresence('logradouro', 'create')
            ->notEmptyString('logradouro');

        $validator
            ->scalar('numero')
            ->maxLength('numero', 20)
            ->allowEmptyString('numero');

        $validator
            ->scalar('bairro')
            ->maxLength('bairro', 150)
            ->allowEmptyString('bairro');

        $validator
            ->scalar('complemento')
            ->maxLength('complemento', 100)
            ->allowEmptyString('complemento');

        $validator
            ->scalar('cidade')
            ->maxLength('cidade', 200)
            ->requirePresence('cidade', 'create')
            ->notEmptyString('cidade');

        $validator
            ->scalar('estado')
            ->maxLength('estado', 2)
            ->requirePresence('estado', 'create')
            ->notEmptyString('estado');

        $validator
            ->scalar('cep')
            ->maxLength('cep', 10)
            ->requirePresence('cep', 'create')
            ->notEmptyString('cep');

        $validator
            ->scalar('ativo')
            ->maxLength('ativo', 1)
            ->allowEmptyString('ativo');

        $validator
            ->integer('servico_id')
            ->notEmptyString('servico_id');

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
        $rules->add($rules->existsIn(['servico_id'], 'Servicos'), ['errorField' => 'servico_id']);

        return $rules;
    }
}

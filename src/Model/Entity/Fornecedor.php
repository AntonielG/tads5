<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Fornecedor Entity
 *
 * @property int $id
 * @property string $cnpj
 * @property string $nome
 * @property string $telefone
 * @property string $email
 * @property string $logradouro
 * @property string|null $numero
 * @property string|null $bairro
 * @property string|null $complemento
 * @property string $cidade
 * @property string $estado
 * @property string $cep
 * @property string|null $ativo
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 * @property int $servico_id
 *
 * @property \App\Model\Entity\Servico $servico
 * @property \App\Model\Entity\Manutencao[] $manutencaos
 * @property \App\Model\Entity\Peca[] $pecas
 */
class Fornecedor extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'cnpj' => true,
        'nome' => true,
        'telefone' => true,
        'email' => true,
        'logradouro' => true,
        'numero' => true,
        'bairro' => true,
        'complemento' => true,
        'cidade' => true,
        'estado' => true,
        'cep' => true,
        'ativo' => true,
        'created' => true,
        'modified' => true,
        'servico_id' => true,
        'servico' => true,
        'manutencaos' => true,
        'pecas' => true,
    ];
}

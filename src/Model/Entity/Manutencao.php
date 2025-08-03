<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Manutencao Entity
 *
 * @property int $id
 * @property string $valor
 * @property \Cake\I18n\Date $data
 * @property int|null $numntfiscal
 * @property string|null $ativo
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 * @property int $fornecedor_id
 * @property int $veiculo_id
 *
 * @property \App\Model\Entity\Fornecedor $fornecedor
 * @property \App\Model\Entity\Veiculo $veiculo
 * @property \App\Model\Entity\Manupeca[] $manupecas
 */
class Manutencao extends Entity
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
        'valor' => true,
        'data' => true,
        'numntfiscal' => true,
        'ativo' => true,
        'created' => true,
        'modified' => true,
        'fornecedor_id' => true,
        'veiculo_id' => true,
        'fornecedor' => true,
        'veiculo' => true,
        'manupecas' => true,
    ];
}

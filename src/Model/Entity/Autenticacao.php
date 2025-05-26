<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Autenticacao Entity
 *
 * @property int $id
 * @property string $autenticacao
 * @property int $user_id
 * @property \Cake\I18n\Date $expiracao
 * @property string $ativo
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\User $user
 */
class Autenticacao extends Entity
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
        'autenticacao' => true,
        'user_id' => true,
        'expiracao' => true,
        'ativo' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
    ];
}

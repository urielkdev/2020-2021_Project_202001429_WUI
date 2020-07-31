<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RelCarteirasOperaco Entity
 *
 * @property int $carteiras_investimento_id
 * @property int $operacoes_financeira_id
 *
 * @property \App\Model\Entity\CarteirasInvestimento $carteiras_investimento
 * @property \App\Model\Entity\OperacoesFinanceira $operacoes_financeira
 */
class RelCarteirasOperaco extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'carteiras_investimento' => true,
        'operacoes_financeira' => true,
    ];
}

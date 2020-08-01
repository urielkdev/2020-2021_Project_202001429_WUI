<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OperacoesFinanceira Entity
 *
 * @property int $id
 * @property int $usuario_id
 * @property int $cnpj_fundo_id
 * @property int|null $distribuidor_fundo_id
 * @property int $tipo_operacoes_financeira_id
 * @property bool $por_valor
 * @property float $valor_total
 * @property float $valor_cota
 * @property int $quantidade_cotas
 * @property \Cake\I18n\FrozenDate $data
 *
 * @property \App\Model\Entity\Usuario $usuario
 * @property \App\Model\Entity\CnpjFundo $cnpj_fundo
 * @property \App\Model\Entity\DistribuidorFundo $distribuidor_fundo
 * @property \App\Model\Entity\TipoOperacoesFinanceira $tipo_operacoes_financeira
 * @property \App\Model\Entity\RelCarteirasOperaco[] $rel_carteiras_operacoes
 */
class OperacoesFinanceira extends Entity
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
        'usuario_id' => true,
        'cnpj_fundo_id' => true,
        'distribuidor_fundo_id' => true,
        'tipo_operacoes_financeira_id' => true,
        'por_valor' => true,
        'valor_total' => true,
        'valor_cota' => true,
        'quantidade_cotas' => true,
        'data' => true,
        'usuario' => true,
        'cnpj_fundo' => true,
        'distribuidor_fundo' => true,
        'tipo_operacoes_financeira' => true,
        'rel_carteiras_operacoes' => true,
    ];
}

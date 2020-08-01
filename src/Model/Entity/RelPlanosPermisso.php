<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RelPlanosPermisso Entity
 *
 * @property int $tipo_plano_id
 * @property int $permissao_id
 *
 * @property \App\Model\Entity\TipoPlano $tipo_plano
 * @property \App\Model\Entity\Permissao $permissao
 */
class RelPlanosPermisso extends Entity
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
        'tipo_plano' => true,
        'permissao' => true,
    ];
}

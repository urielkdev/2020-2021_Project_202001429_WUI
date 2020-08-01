<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RelPlanosPermissoes Model
 *
 * @property \App\Model\Table\TipoPlanosTable&\Cake\ORM\Association\BelongsTo $TipoPlanos
 * @property \App\Model\Table\PermissaosTable&\Cake\ORM\Association\BelongsTo $Permissaos
 *
 * @method \App\Model\Entity\RelPlanosPermisso newEmptyEntity()
 * @method \App\Model\Entity\RelPlanosPermisso newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\RelPlanosPermisso[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RelPlanosPermisso get($primaryKey, $options = [])
 * @method \App\Model\Entity\RelPlanosPermisso findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\RelPlanosPermisso patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RelPlanosPermisso[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\RelPlanosPermisso|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RelPlanosPermisso saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RelPlanosPermisso[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\RelPlanosPermisso[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\RelPlanosPermisso[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\RelPlanosPermisso[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class RelPlanosPermissoesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('rel_planos_permissoes');
        $this->setDisplayField('tipo_plano_id');
        $this->setPrimaryKey(['tipo_plano_id', 'permissao_id']);

        $this->belongsTo('TipoPlanos', [
            'foreignKey' => 'tipo_plano_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Permissaos', [
            'foreignKey' => 'permissao_id',
            'joinType' => 'INNER',
        ]);
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
        $rules->add($rules->existsIn(['tipo_plano_id'], 'TipoPlanos'));
        $rules->add($rules->existsIn(['permissao_id'], 'Permissaos'));

        return $rules;
    }
}

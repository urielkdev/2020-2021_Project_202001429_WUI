<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RelCarteirasOperacoes Model
 *
 * @property \App\Model\Table\CarteirasInvestimentosTable&\Cake\ORM\Association\BelongsTo $CarteirasInvestimentos
 * @property \App\Model\Table\OperacoesFinanceirasTable&\Cake\ORM\Association\BelongsTo $OperacoesFinanceiras
 *
 * @method \App\Model\Entity\RelCarteirasOperaco newEmptyEntity()
 * @method \App\Model\Entity\RelCarteirasOperaco newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\RelCarteirasOperaco[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RelCarteirasOperaco get($primaryKey, $options = [])
 * @method \App\Model\Entity\RelCarteirasOperaco findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\RelCarteirasOperaco patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RelCarteirasOperaco[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\RelCarteirasOperaco|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RelCarteirasOperaco saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RelCarteirasOperaco[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\RelCarteirasOperaco[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\RelCarteirasOperaco[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\RelCarteirasOperaco[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class RelCarteirasOperacoesTable extends Table
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

        $this->setTable('rel_carteiras_operacoes');
        $this->setDisplayField('carteiras_investimento_id');
        $this->setPrimaryKey(['carteiras_investimento_id', 'operacoes_financeira_id']);

        $this->belongsTo('CarteirasInvestimentos', [
            'foreignKey' => 'carteiras_investimento_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('OperacoesFinanceiras', [
            'foreignKey' => 'operacoes_financeira_id',
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
        $rules->add($rules->existsIn(['carteiras_investimento_id'], 'CarteirasInvestimentos'));
        $rules->add($rules->existsIn(['operacoes_financeira_id'], 'OperacoesFinanceiras'));

        return $rules;
    }
}

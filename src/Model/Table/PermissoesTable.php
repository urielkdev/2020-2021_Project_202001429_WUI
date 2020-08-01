<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Permissoes Model
 *
 * @method \App\Model\Entity\Permisso newEmptyEntity()
 * @method \App\Model\Entity\Permisso newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Permisso[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Permisso get($primaryKey, $options = [])
 * @method \App\Model\Entity\Permisso findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Permisso patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Permisso[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Permisso|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Permisso saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Permisso[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Permisso[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Permisso[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Permisso[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PermissoesTable extends Table
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

        $this->setTable('permissoes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->boolean('supor_fck_root')
            ->requirePresence('supor_fck_root', 'create')
            ->notEmptyString('supor_fck_root');

        $validator
            ->boolean('administrador_mng')
            ->requirePresence('administrador_mng', 'create')
            ->notEmptyString('administrador_mng');

        $validator
            ->boolean('carteiras_mng')
            ->requirePresence('carteiras_mng', 'create')
            ->notEmptyString('carteiras_mng');

        $validator
            ->boolean('logs_mng')
            ->requirePresence('logs_mng', 'create')
            ->notEmptyString('logs_mng');

        $validator
            ->boolean('operacoes_mng')
            ->requirePresence('operacoes_mng', 'create')
            ->notEmptyString('operacoes_mng');

        $validator
            ->boolean('usuarios_mng')
            ->requirePresence('usuarios_mng', 'create')
            ->notEmptyString('usuarios_mng');

        $validator
            ->boolean('tipos_mng')
            ->requirePresence('tipos_mng', 'create')
            ->notEmptyString('tipos_mng');

        $validator
            ->boolean('rel_mng')
            ->requirePresence('rel_mng', 'create')
            ->notEmptyString('rel_mng');

        return $validator;
    }
}

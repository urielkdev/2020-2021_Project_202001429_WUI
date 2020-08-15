<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Usuarios Model
 *
 * @property \App\Model\Table\TipoPlanosTable&\Cake\ORM\Association\BelongsTo $TipoPlanos
 * @property \App\Model\Table\TipoEtapasRegistrosTable&\Cake\ORM\Association\BelongsTo $TipoEtapasRegistros
 * @property \App\Model\Table\CarteirasInvestimentosTable&\Cake\ORM\Association\HasMany $CarteirasInvestimentos
 * @property \App\Model\Table\OperacoesFinanceirasTable&\Cake\ORM\Association\HasMany $OperacoesFinanceiras
 *
 * @method \App\Model\Entity\Usuario newEmptyEntity()
 * @method \App\Model\Entity\Usuario newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Usuario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Usuario get($primaryKey, $options = [])
 * @method \App\Model\Entity\Usuario findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Usuario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Usuario[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Usuario|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Usuario saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Usuario[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Usuario[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Usuario[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Usuario[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsuariosTable extends Table {

	/**
	 * Initialize method
	 *
	 * @param array $config The configuration for the Table.
	 * @return void
	 */
	public function initialize(array $config): void {
		parent::initialize($config);

		$this->setTable('usuarios');
		$this->setDisplayField('nome');
		$this->setPrimaryKey('id');

		$this->addBehavior('Timestamp');

		$this->belongsTo('TipoPlanos', [
			'foreignKey' => 'tipo_plano_id',
			'joinType' => 'INNER',
		]);
		$this->belongsTo('TipoEtapasRegistros', [
			'foreignKey' => 'tipo_etapas_registro_id',
			'joinType' => 'INNER',
		]);
		$this->hasMany('CarteirasInvestimentos', [
			'foreignKey' => 'usuario_id',
		]);
		$this->hasMany('OperacoesFinanceiras', [
			'foreignKey' => 'usuario_id',
		]);
	}

	/**
	 * Default validation rules.
	 *
	 * @param \Cake\Validation\Validator $validator Validator instance.
	 * @return \Cake\Validation\Validator
	 */
	public function validationDefault(Validator $validator): Validator {
		$validator
				->integer('id')
				->allowEmptyString('id', null, 'create');

		$validator
				->scalar('cpf')
				->minLength('cpf', 11, __('O CPF deve ter 11 números'))
				->maxLength('cpf', 11, __('O CPF deve ter 11 números'))
				->requirePresence('cpf', 'create')
				->notEmptyString('cpf');

		$validator
				->scalar('nome')
				->minLength('nome', 20, __('Você precisa informar o nome completo (mínimo 20 caracteres)'))
				->maxLength('nome', 200)
				->requirePresence('nome', 'create')
				->notEmptyString('nome');

		$validator
				->email('email')
				->requirePresence('email', 'create')
				->notEmptyString('email');

		$validator
				->date('dt_nasc')
				->requirePresence('dt_nasc', 'create')
				->notEmptyDate('dt_nasc');

		$validator
				->scalar('senha')
				->minLength('senha', 6, __('A senha deve ter no mínimo 6 caracteres'))
				->maxLength('senha', 64, __('A senha deve ter no máximo 64 caracteres'))
				->requirePresence('senha', 'create')
				->notEmptyString('senha');

		$validator
				->date('dt_reg')
				->requirePresence('dt_reg', 'create')
				->notEmptyDate('dt_reg');

		$validator
				->scalar('coment')
				->maxLength('coment', 100)
				->allowEmptyString('coment');

		$validator
				->sameAs('senha2', 'senha', __('As duas senhas devem coindidir'))
				->equals('concordaTermos', true, __('Você precisa concordar com os termos e condições de uso para se registrar'));

		$validator->add('cpf', ["custom" => [
				"rule" => [$this, "validaCPF"], //add the new rule 'customFunction' to cedula field
				"message" => __('O CPF digitado não é válido')
		]]);

		$validator->add('dt_nasc', ["custom" => [
				"rule" => [$this, "maior18anos"], //add the new rule 'customFunction' to cedula field
				"message" => __('Você precisa ter pelo menos 18 anos para se registrar, piá')
		]]);

		return $validator;
	}

	/**
	 * Returns a rules checker object that will be used for validating
	 * application integrity.
	 *
	 * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
	 * @return \Cake\ORM\RulesChecker
	 */
	public function buildRules(RulesChecker $rules): RulesChecker {
		$rules->add($rules->existsIn(['tipo_plano_id'], 'TipoPlanos'));
		$rules->add($rules->existsIn(['tipo_etapas_registro_id'], 'TipoEtapasRegistros'));

		return $rules;
	}

	/*
	 * *************************************************************************************************
	 */

	function maior18anos($dt_nasc) {
		$datetime1 = date_create($dt_nasc);
		$datetime2 = date_create(date('y-m-d'));
		$interval = date_diff($datetime1, $datetime2);
		return $interval->y >= 18; //->format($differenceFormat);
	}

	function validaCPF($cpf) {
		// Extrai somente os números
		$cpf = preg_replace('/[^0-9]/is', '', $cpf);
		// Verifica se foi informado todos os digitos corretamente
		if (strlen($cpf) != 11) {
			return false;
		}
		// Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
		if (preg_match('/(\d)\1{10}/', $cpf)) {
			return false;
		}
		// Faz o calculo para validar o CPF
		for ($t = 9; $t < 11; $t++) {
			for ($d = 0, $c = 0; $c < $t; $c++) {
				$d += $cpf[$c] * (($t + 1) - $c);
			}
			$d = ((10 * $d) % 11) % 10;
			if ($cpf[$c] != $d) {
				return false;
			}
		}
		return true;
	}

}

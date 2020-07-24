<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;

class BuscaFundosForm extends Form {

	protected function _buildSchema(Schema $schema): Schema {
		return $schema->addField('nome', 'string')
						->addField('emOperacao', ['type' => 'boolean'])
						->addField('tipo', ['type' => 'string'])
						->addField('classe', ['type' => 'string'])
						->addField('aplicMin', ['type' => 'string'])
				;
	}

	public function validationDefault(Validator $validator): Validator {
		$validator->minLength('nome', 0)
				//->email('email')
				;
		return $validator;
	}

	protected function _execute(array $data): bool {
		// Send an email.
		return true;
	}

}

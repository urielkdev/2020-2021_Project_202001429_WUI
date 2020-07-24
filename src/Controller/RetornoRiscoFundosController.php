<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * RetornoRiscoFundos Controller
 *
 * @property \App\Model\Table\RetornoRiscoFundosTable $RetornoRiscoFundos
 * @method \App\Model\Entity\RetornoRiscoFundo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RetornoRiscoFundosController extends AppController {
	/* public function getProximosPesos($pesos, $countRecords, $passoPeso, $maxPeso) {
	  $ok = false;
	  $countRecords--;
	  while (!$ok || $countRecords < 0) {
	  if ($pesos[$countRecords] < $maxPeso) {
	  $pesos[$countRecords] += $passoPeso;
	  echo($pesos[$countRecords]);
	  $ok = true;
	  } else {
	  $countRecords--;
	  }
	  }
	  return $pesos;
	  } */

	private $tolerancia = 1e-5;

	function fatorial($n) {
		$prod = 1;
		for ($i = 1; $i <= $n; $i++) {
			$prod *= $i;
		}
		return $prod;
	}

	function equals($x, $y) {
		$dif = abs((float) $x - (float) $y) < $this->tolerancia;
		return $dif;
	}

	/**
	 * Markovitz method
	 *
	 * @return \Cake\Http\Response|null|void Renders view
	 */
	public function markovitz() {
		$this->paginate = [
			'contain' => ['CnpjFundos' => ['CadastroFundos' => ['TipoClasseFundos']]],
		];
		$retornoRiscoFundos = $this->paginate($this->RetornoRiscoFundos);
		$this->set(compact('retornoRiscoFundos'));

		foreach ($this->RetornoRiscoFundos->find() as $fundo) {
			$rentabFundos[] = $fundo->rentab_media;
			$desviosFundos[] = $fundo->desvio_padrao;
			$idFundos[] = $fundo->cnpj_fundo_id;
		}
		for ($i = 0; $i < count($desviosFundos); $i++) {
			for ($j = 0; $j < count($desviosFundos); $j++) {
				$covar[$i][$j] = $desviosFundos[$i] * $desviosFundos[$j];
			}
		}

		$countRec = $this->RetornoRiscoFundos->find()->count();
		switch ($countRec) {
			case 1:
			case 2:$compensador = 8;
				break;
			case 3:$compensador = 6;
				break;
			case 4:$compensador = 2;
				break;
			default:$compensador = 2;
				break;
		}
		$p = 1.0 / $countRec / $compensador;
		$min = $p; //0.0
		$max = 1.0 - $p; //1.0;
		$pos = $countRec - 1;
		$pesos = array_fill(0, $pos, $min);
		$pesos[$pos] = 1 - $min * $pos;
		$iteracoes = 0;
		//echo("count:".$countRec.", p:".$p.", min:".$min.", max:".$max.", total:".array_sum($pesos).", p's:".($pesos[$pos]/$p)."<br/>");
		$alocacoes = ['fundos_id' => $idFundos, 'alocacoes' =>[]];
		do {
			// possui um arranjo válido. Calcula resultados da carteira
			$rentabAlocacao = 0.0;
			$i = 0;
			foreach ($rentabFundos as $rentabFundo) {
				$rentabAlocacao += $rentabFundo * $pesos[$i++];
			}
			$riscoAlocacao = 0.0;
			for ($i = 0; $i < $countRec; $i++) {
				for ($j = 0; $j < $countRec; $j++) {
					$riscoAlocacao += $pesos[$i]*$pesos[$j]*$covar[$i][$j];
				}
			}

			$alocacoes['alocacoes'][] = ['id' => $iteracoes, 'pesos' => $pesos, 'rentabilidade' => $rentabAlocacao, 'risco' => $riscoAlocacao, 'numFundos' => $countRec];
			// calcula próximo arranjo
			$iteracoes++;
			$pos = $countRec - 2;
			$done = false;
			while (!$done && $pos >= 0) {
				$sum = 0;
				for ($i = 0; $i < $pos; $i++) {
					$sum += $pesos[$i];
				}
				$esteMax = $max - $sum - ($min * ($countRec - $pos - 2));
				//echo("pos:".$pos.", sum:".$sum.", pes[]:".$pesos[$pos].", comp:".$esteMax."<br/>");
				if ($this->equals($pesos[$pos], $esteMax)) { //, $max - $sum)) {
					$pesos[$pos] = $min;
					$pos--;
				} else {
					$pesos[$pos] += $p;
					$done = true;
				}
			}
			$sum = 0;
			for ($i = 0; $i <= $countRec - 2; $i++) {
				$sum += $pesos[$i];
			}
			$pesos[$countRec - 1] = 1 - $sum;
			//echo("peso total:".array_sum($pesos)." último peso:".$pesos[$countRec-1].", p's:".($pesos[$countRec-1]/$p)."<br/>");
		} while ($pos >= 0 && $iteracoes < 1e6);
		//echo("Fundos:".$countRec.", Arranjos:".$iteracoes);
		$this->set(compact('alocacoes'));
	}

	/**
	 * Index method
	 *
	 * @return \Cake\Http\Response|null|void Renders view
	 */
	public function index() {
		$this->paginate = [
			'contain' => ['CnpjFundos'],
		];
		$retornoRiscoFundos = $this->paginate($this->RetornoRiscoFundos);

		$this->set(compact('retornoRiscoFundos'));
	}

	/**
	 * View method
	 *
	 * @param string|null $id Retorno Risco Fundo id.
	 * @return \Cake\Http\Response|null|void Renders view
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function view($id = null) {
		$retornoRiscoFundo = $this->RetornoRiscoFundos->get($id, [
			'contain' => ['CnpjFundos'],
		]);

		$this->set(compact('retornoRiscoFundo'));
	}

	/**
	 * Add method
	 *
	 * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
	 */
	public function add() {
		$retornoRiscoFundo = $this->RetornoRiscoFundos->newEmptyEntity();
		if ($this->request->is('post')) {
			$retornoRiscoFundo = $this->RetornoRiscoFundos->patchEntity($retornoRiscoFundo, $this->request->getData());
			if ($this->RetornoRiscoFundos->save($retornoRiscoFundo)) {
				$this->Flash->success(__('The retorno risco fundo has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The retorno risco fundo could not be saved. Please, try again.'));
		}
		$cnpjFundos = $this->RetornoRiscoFundos->CnpjFundos->find('list', ['limit' => 200]);
		$this->set(compact('retornoRiscoFundo', 'cnpjFundos'));
	}

	/**
	 * Edit method
	 *
	 * @param string|null $id Retorno Risco Fundo id.
	 * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function edit($id = null) {
		$retornoRiscoFundo = $this->RetornoRiscoFundos->get($id, [
			'contain' => [],
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$retornoRiscoFundo = $this->RetornoRiscoFundos->patchEntity($retornoRiscoFundo, $this->request->getData());
			if ($this->RetornoRiscoFundos->save($retornoRiscoFundo)) {
				$this->Flash->success(__('The retorno risco fundo has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The retorno risco fundo could not be saved. Please, try again.'));
		}
		$cnpjFundos = $this->RetornoRiscoFundos->CnpjFundos->find('list', ['limit' => 200]);
		$this->set(compact('retornoRiscoFundo', 'cnpjFundos'));
	}

	/**
	 * Delete method
	 *
	 * @param string|null $id Retorno Risco Fundo id.
	 * @return \Cake\Http\Response|null|void Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function delete($id = null) {
		$this->request->allowMethod(['post', 'delete']);
		$retornoRiscoFundo = $this->RetornoRiscoFundos->get($id);
		if ($this->RetornoRiscoFundos->delete($retornoRiscoFundo)) {
			$this->Flash->success(__('The retorno risco fundo has been deleted.'));
		} else {
			$this->Flash->error(__('The retorno risco fundo could not be deleted. Please, try again.'));
		}

		return $this->redirect(['action' => 'index']);
	}

}

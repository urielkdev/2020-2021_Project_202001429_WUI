<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CadastroFundosFixture
 */
class CadastroFundosFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'cnpj_fundo_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'DT_CONST' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'tipo_classe_fundo_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'DT_INI_CLASSE' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'tipo_rentabilidade_fundo_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'CONDOM_ABERTO' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'FUNDO_COTAS' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'FUNDO_EXCLUSIVO' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'INVEST_QUALIF' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'gestor_fundo_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'administrador_fundo_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'DT_REG_CVM' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'IDX_ID_FUNDO' => ['type' => 'index', 'columns' => ['cnpj_fundo_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['cnpj_fundo_id', 'tipo_classe_fundo_id', 'DT_INI_CLASSE', 'tipo_rentabilidade_fundo_id', 'CONDOM_ABERTO', 'FUNDO_COTAS', 'FUNDO_EXCLUSIVO', 'INVEST_QUALIF', 'gestor_fundo_id', 'administrador_fundo_id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_general_ci'
        ],
    ];
    // phpcs:enable
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'cnpj_fundo_id' => 1,
                'DT_CONST' => '2020-07-15',
                'tipo_classe_fundo_id' => 1,
                'DT_INI_CLASSE' => '2020-07-15',
                'tipo_rentabilidade_fundo_id' => 1,
                'CONDOM_ABERTO' => 1,
                'FUNDO_COTAS' => 1,
                'FUNDO_EXCLUSIVO' => 1,
                'INVEST_QUALIF' => 1,
                'gestor_fundo_id' => 1,
                'administrador_fundo_id' => 1,
                'DT_REG_CVM' => '2020-07-15',
            ],
        ];
        parent::init();
    }
}

<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RetornoRiscoFundosFixture
 */
class RetornoRiscoFundosFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'cnpj_fundo_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'periodo_meses' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'data_final' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => 'current_timestamp()', 'comment' => '', 'precision' => null],
        'rentab_media' => ['type' => 'float', 'length' => 24, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'desvio_padrao' => ['type' => 'float', 'length' => 24, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'num_valores' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'rentab_min' => ['type' => 'float', 'length' => 24, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'rentab_max' => ['type' => 'float', 'length' => 24, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'meses_abaixo_bench' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'meses_acima_bench' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'IDX_DATA_FINAL' => ['type' => 'index', 'columns' => ['data_final'], 'length' => []],
            'IDX_CNPJ' => ['type' => 'index', 'columns' => ['cnpj_fundo_id'], 'length' => []],
        ],
        '_constraints' => [
            'UNIQUE_VALS' => ['type' => 'unique', 'columns' => ['cnpj_fundo_id', 'num_valores', 'periodo_meses', 'data_final'], 'length' => []],
            'cnpj_fundo_id' => ['type' => 'foreign', 'columns' => ['cnpj_fundo_id'], 'references' => ['cnpj_fundos', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'periodo_meses' => 1,
                'data_final' => '2020-07-22',
                'rentab_media' => 1,
                'desvio_padrao' => 1,
                'num_valores' => 1,
                'rentab_min' => 1,
                'rentab_max' => 1,
                'meses_abaixo_bench' => 1,
                'meses_acima_bench' => 1,
            ],
        ];
        parent::init();
    }
}

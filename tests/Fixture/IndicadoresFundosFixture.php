<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * IndicadoresFundosFixture
 */
class IndicadoresFundosFixture extends TestFixture
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
        'rentabilidade' => ['type' => 'decimal', 'length' => 27, 'precision' => 12, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'desvio_padrao' => ['type' => 'decimal', 'length' => 27, 'precision' => 12, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'num_valores' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'rentab_min' => ['type' => 'decimal', 'length' => 27, 'precision' => 12, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'rentab_max' => ['type' => 'decimal', 'length' => 27, 'precision' => 12, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'max_drawdown' => ['type' => 'decimal', 'length' => 27, 'precision' => 12, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'tipo_benchmark_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'meses_acima_bench' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'sharpe' => ['type' => 'decimal', 'length' => 27, 'precision' => 12, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'beta' => ['type' => 'decimal', 'length' => 27, 'precision' => 12, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        '_indexes' => [
            'IDX_DATA_FINAL' => ['type' => 'index', 'columns' => ['data_final'], 'length' => []],
            'IDX_CNPJ' => ['type' => 'index', 'columns' => ['cnpj_fundo_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['cnpj_fundo_id', 'periodo_meses', 'data_final'], 'length' => []],
            'UNIQUE_VALS' => ['type' => 'unique', 'columns' => ['cnpj_fundo_id', 'periodo_meses', 'data_final'], 'length' => []],
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
                'data_final' => '2020-07-30',
                'rentabilidade' => 1.5,
                'desvio_padrao' => 1.5,
                'num_valores' => 1,
                'rentab_min' => 1.5,
                'rentab_max' => 1.5,
                'max_drawdown' => 1.5,
                'tipo_benchmark_id' => 1,
                'meses_acima_bench' => 1,
                'sharpe' => 1.5,
                'beta' => 1.5,
            ],
        ];
        parent::init();
    }
}

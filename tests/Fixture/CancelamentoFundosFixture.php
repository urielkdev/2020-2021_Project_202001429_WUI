<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CancelamentoFundosFixture
 */
class CancelamentoFundosFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'cnpj_fundo_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'DT_CANCEL' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'DT_REG_CVM' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'IDX_ID_FUNDO' => ['type' => 'index', 'columns' => ['cnpj_fundo_id'], 'length' => []],
        ],
        '_constraints' => [
            'UNIQUE_VALS' => ['type' => 'unique', 'columns' => ['cnpj_fundo_id', 'DT_CANCEL'], 'length' => []],
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
                'DT_CANCEL' => '2020-07-15',
                'DT_REG_CVM' => '2020-07-15',
            ],
        ];
        parent::init();
    }
}

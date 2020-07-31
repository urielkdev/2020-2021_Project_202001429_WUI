<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DocInfDiarioFundosFixture
 */
class DocInfDiarioFundosFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'cnpj_fundo_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'DT_COMPTC' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'VL_TOTAL' => ['type' => 'decimal', 'length' => 17, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'VL_QUOTA' => ['type' => 'decimal', 'length' => 27, 'precision' => 12, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'VL_PATRIM_LIQ' => ['type' => 'decimal', 'length' => 17, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'CAPTC_DIA' => ['type' => 'decimal', 'length' => 17, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'RESG_DIA' => ['type' => 'decimal', 'length' => 17, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'NR_COTST' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'rentab_diaria' => ['type' => 'decimal', 'length' => 27, 'precision' => 12, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'volat_diaria' => ['type' => 'decimal', 'length' => 27, 'precision' => 12, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        '_indexes' => [
            'IDX_CNPJ' => ['type' => 'index', 'columns' => ['cnpj_fundo_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['cnpj_fundo_id', 'DT_COMPTC'], 'length' => []],
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
                'DT_COMPTC' => '2020-07-29',
                'VL_TOTAL' => 1.5,
                'VL_QUOTA' => 1.5,
                'VL_PATRIM_LIQ' => 1.5,
                'CAPTC_DIA' => 1.5,
                'RESG_DIA' => 1.5,
                'NR_COTST' => 1,
                'rentab_diaria' => 1.5,
                'volat_diaria' => 1.5,
            ],
        ];
        parent::init();
    }
}

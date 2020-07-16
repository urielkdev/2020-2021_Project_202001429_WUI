<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DocExtratosFundosFixture
 */
class DocExtratosFundosFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'cnpj_fundo_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'DT_COMPTC' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'tipo_anbima_classe_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'APLIC_MIN' => ['type' => 'decimal', 'length' => 15, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'QT_DIA_PAGTO_COTA' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'QT_DIA_PAGTO_RESGATE' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'PR_COTA_ETF_MAX' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'IDX_ID_FUNDO' => ['type' => 'index', 'columns' => ['cnpj_fundo_id'], 'length' => []],
            'IDX_APLIC_MIN' => ['type' => 'index', 'columns' => ['APLIC_MIN'], 'length' => []],
            'IDX_ID_CLASSE_ANBIMA' => ['type' => 'index', 'columns' => ['tipo_anbima_classe_id'], 'length' => []],
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
                'DT_COMPTC' => '2020-07-15',
                'tipo_anbima_classe_id' => 1,
                'APLIC_MIN' => 1.5,
                'QT_DIA_PAGTO_COTA' => 1,
                'QT_DIA_PAGTO_RESGATE' => 1,
                'PR_COTA_ETF_MAX' => 1,
            ],
        ];
        parent::init();
    }
}

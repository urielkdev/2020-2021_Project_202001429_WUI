<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SituacaoFundosFixture
 */
class SituacaoFundosFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'cnpj_fundo_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'tipo_situacao_fundo_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'DT_INI_SIT' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'DT_REG_CVM' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'FK_ID_FUNDO' => ['type' => 'index', 'columns' => ['cnpj_fundo_id'], 'length' => []],
            'FK_ID_SIT' => ['type' => 'index', 'columns' => ['tipo_situacao_fundo_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['cnpj_fundo_id', 'tipo_situacao_fundo_id', 'DT_INI_SIT'], 'length' => []],
            'FK_ID_FUNDO' => ['type' => 'foreign', 'columns' => ['cnpj_fundo_id'], 'references' => ['cnpj_fundos', 'ID'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'FK_ID_SIT' => ['type' => 'foreign', 'columns' => ['tipo_situacao_fundo_id'], 'references' => ['tipo_situacao_fundos', 'ID'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'tipo_situacao_fundo_id' => 1,
                'DT_INI_SIT' => '2020-07-15',
                'DT_REG_CVM' => '2020-07-15',
            ],
        ];
        parent::init();
    }
}

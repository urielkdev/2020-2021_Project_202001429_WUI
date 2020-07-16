<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CnpjFundosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CnpjFundosTable Test Case
 */
class CnpjFundosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CnpjFundosTable
     */
    protected $CnpjFundos;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.CnpjFundos',
        'app.CadastroFundos',
        'app.CancelamentoFundos',
        'app.DocExtratosFundos',
        'app.DocInfDiarioFundos',
        'app.SituacaoFundos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CnpjFundos') ? [] : ['className' => CnpjFundosTable::class];
        $this->CnpjFundos = TableRegistry::getTableLocator()->get('CnpjFundos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->CnpjFundos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

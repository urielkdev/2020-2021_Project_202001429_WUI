<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OperacoesFinanceirasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OperacoesFinanceirasTable Test Case
 */
class OperacoesFinanceirasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OperacoesFinanceirasTable
     */
    protected $OperacoesFinanceiras;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.OperacoesFinanceiras',
        'app.CarteirasInvestimentos',
        'app.CnpjFundos',
        'app.DistribuidorFundos',
        'app.TipoOperacoesFinanceiras',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('OperacoesFinanceiras') ? [] : ['className' => OperacoesFinanceirasTable::class];
        $this->OperacoesFinanceiras = $this->getTableLocator()->get('OperacoesFinanceiras', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->OperacoesFinanceiras);

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

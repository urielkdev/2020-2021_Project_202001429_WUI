<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OperacoesFinanceirasTable;
use Cake\ORM\TableRegistry;
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
        'app.Usuarios',
        'app.CnpjFundos',
        'app.Distribuidoras',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('OperacoesFinanceiras') ? [] : ['className' => OperacoesFinanceirasTable::class];
        $this->OperacoesFinanceiras = TableRegistry::getTableLocator()->get('OperacoesFinanceiras', $config);
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

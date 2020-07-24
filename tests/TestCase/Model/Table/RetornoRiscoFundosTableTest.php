<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RetornoRiscoFundosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RetornoRiscoFundosTable Test Case
 */
class RetornoRiscoFundosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RetornoRiscoFundosTable
     */
    protected $RetornoRiscoFundos;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.RetornoRiscoFundos',
        'app.CnpjFundos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('RetornoRiscoFundos') ? [] : ['className' => RetornoRiscoFundosTable::class];
        $this->RetornoRiscoFundos = TableRegistry::getTableLocator()->get('RetornoRiscoFundos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->RetornoRiscoFundos);

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

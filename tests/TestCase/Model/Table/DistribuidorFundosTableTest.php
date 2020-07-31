<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DistribuidorFundosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DistribuidorFundosTable Test Case
 */
class DistribuidorFundosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DistribuidorFundosTable
     */
    protected $DistribuidorFundos;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.DistribuidorFundos',
        'app.OperacoesFinanceiras',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('DistribuidorFundos') ? [] : ['className' => DistribuidorFundosTable::class];
        $this->DistribuidorFundos = TableRegistry::getTableLocator()->get('DistribuidorFundos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->DistribuidorFundos);

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

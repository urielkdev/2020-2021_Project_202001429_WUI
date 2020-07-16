<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CancelamentoFundosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CancelamentoFundosTable Test Case
 */
class CancelamentoFundosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CancelamentoFundosTable
     */
    protected $CancelamentoFundos;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.CancelamentoFundos',
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
        $config = TableRegistry::getTableLocator()->exists('CancelamentoFundos') ? [] : ['className' => CancelamentoFundosTable::class];
        $this->CancelamentoFundos = TableRegistry::getTableLocator()->get('CancelamentoFundos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->CancelamentoFundos);

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

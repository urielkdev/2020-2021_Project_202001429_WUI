<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DocInfDiarioFundosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DocInfDiarioFundosTable Test Case
 */
class DocInfDiarioFundosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DocInfDiarioFundosTable
     */
    protected $DocInfDiarioFundos;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.DocInfDiarioFundos',
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
        $config = TableRegistry::getTableLocator()->exists('DocInfDiarioFundos') ? [] : ['className' => DocInfDiarioFundosTable::class];
        $this->DocInfDiarioFundos = TableRegistry::getTableLocator()->get('DocInfDiarioFundos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->DocInfDiarioFundos);

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

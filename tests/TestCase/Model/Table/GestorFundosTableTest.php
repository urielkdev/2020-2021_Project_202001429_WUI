<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GestorFundosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GestorFundosTable Test Case
 */
class GestorFundosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\GestorFundosTable
     */
    protected $GestorFundos;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.GestorFundos',
        'app.CadastroFundos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('GestorFundos') ? [] : ['className' => GestorFundosTable::class];
        $this->GestorFundos = TableRegistry::getTableLocator()->get('GestorFundos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->GestorFundos);

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

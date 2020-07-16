<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdministradorFundosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdministradorFundosTable Test Case
 */
class AdministradorFundosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AdministradorFundosTable
     */
    protected $AdministradorFundos;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.AdministradorFundos',
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
        $config = TableRegistry::getTableLocator()->exists('AdministradorFundos') ? [] : ['className' => AdministradorFundosTable::class];
        $this->AdministradorFundos = TableRegistry::getTableLocator()->get('AdministradorFundos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->AdministradorFundos);

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

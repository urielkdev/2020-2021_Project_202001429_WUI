<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CadastroFundosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CadastroFundosTable Test Case
 */
class CadastroFundosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CadastroFundosTable
     */
    protected $CadastroFundos;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.CadastroFundos',
        'app.CnpjFundos',
        'app.TipoClasseFundos',
        'app.TipoRentabilidadeFundos',
        'app.GestorFundos',
        'app.AdministradorFundos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CadastroFundos') ? [] : ['className' => CadastroFundosTable::class];
        $this->CadastroFundos = TableRegistry::getTableLocator()->get('CadastroFundos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->CadastroFundos);

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

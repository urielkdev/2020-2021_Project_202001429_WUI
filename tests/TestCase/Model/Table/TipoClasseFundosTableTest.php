<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TipoClasseFundosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TipoClasseFundosTable Test Case
 */
class TipoClasseFundosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TipoClasseFundosTable
     */
    protected $TipoClasseFundos;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TipoClasseFundos',
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
        $config = TableRegistry::getTableLocator()->exists('TipoClasseFundos') ? [] : ['className' => TipoClasseFundosTable::class];
        $this->TipoClasseFundos = TableRegistry::getTableLocator()->get('TipoClasseFundos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TipoClasseFundos);

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
}

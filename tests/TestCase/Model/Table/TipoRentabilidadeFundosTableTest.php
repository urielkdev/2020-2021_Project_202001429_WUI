<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TipoRentabilidadeFundosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TipoRentabilidadeFundosTable Test Case
 */
class TipoRentabilidadeFundosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TipoRentabilidadeFundosTable
     */
    protected $TipoRentabilidadeFundos;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TipoRentabilidadeFundos',
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
        $config = TableRegistry::getTableLocator()->exists('TipoRentabilidadeFundos') ? [] : ['className' => TipoRentabilidadeFundosTable::class];
        $this->TipoRentabilidadeFundos = TableRegistry::getTableLocator()->get('TipoRentabilidadeFundos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TipoRentabilidadeFundos);

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

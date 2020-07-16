<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TipoEtapasRegistrosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TipoEtapasRegistrosTable Test Case
 */
class TipoEtapasRegistrosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TipoEtapasRegistrosTable
     */
    protected $TipoEtapasRegistros;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TipoEtapasRegistros',
        'app.Usuarios',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TipoEtapasRegistros') ? [] : ['className' => TipoEtapasRegistrosTable::class];
        $this->TipoEtapasRegistros = TableRegistry::getTableLocator()->get('TipoEtapasRegistros', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TipoEtapasRegistros);

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

<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TipoPlanosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TipoPlanosTable Test Case
 */
class TipoPlanosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TipoPlanosTable
     */
    protected $TipoPlanos;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TipoPlanos',
        'app.Permissaos',
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
        $config = TableRegistry::getTableLocator()->exists('TipoPlanos') ? [] : ['className' => TipoPlanosTable::class];
        $this->TipoPlanos = TableRegistry::getTableLocator()->get('TipoPlanos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TipoPlanos);

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

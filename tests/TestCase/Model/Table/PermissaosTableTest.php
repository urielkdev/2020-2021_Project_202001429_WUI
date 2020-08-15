<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PermissaosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PermissaosTable Test Case
 */
class PermissaosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PermissaosTable
     */
    protected $Permissaos;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Permissaos',
        'app.TipoPlanos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Permissaos') ? [] : ['className' => PermissaosTable::class];
        $this->Permissaos = TableRegistry::getTableLocator()->get('Permissaos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Permissaos);

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

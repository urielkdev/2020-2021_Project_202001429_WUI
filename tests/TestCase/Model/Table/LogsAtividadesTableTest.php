<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LogsAtividadesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LogsAtividadesTable Test Case
 */
class LogsAtividadesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LogsAtividadesTable
     */
    protected $LogsAtividades;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.LogsAtividades',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('LogsAtividades') ? [] : ['className' => LogsAtividadesTable::class];
        $this->LogsAtividades = TableRegistry::getTableLocator()->get('LogsAtividades', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->LogsAtividades);

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

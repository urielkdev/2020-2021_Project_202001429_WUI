<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TipoOperacoesFinanceirasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TipoOperacoesFinanceirasTable Test Case
 */
class TipoOperacoesFinanceirasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TipoOperacoesFinanceirasTable
     */
    protected $TipoOperacoesFinanceiras;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TipoOperacoesFinanceiras',
        'app.OperacoesFinanceiras',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TipoOperacoesFinanceiras') ? [] : ['className' => TipoOperacoesFinanceirasTable::class];
        $this->TipoOperacoesFinanceiras = TableRegistry::getTableLocator()->get('TipoOperacoesFinanceiras', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TipoOperacoesFinanceiras);

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

<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IndicadoresCarteirasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IndicadoresCarteirasTable Test Case
 */
class IndicadoresCarteirasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\IndicadoresCarteirasTable
     */
    protected $IndicadoresCarteiras;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.IndicadoresCarteiras',
        'app.CarteirasInvestimentos',
        'app.TipoBenchmarks',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('IndicadoresCarteiras') ? [] : ['className' => IndicadoresCarteirasTable::class];
        $this->IndicadoresCarteiras = TableRegistry::getTableLocator()->get('IndicadoresCarteiras', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->IndicadoresCarteiras);

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

<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IndicadoresFundosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IndicadoresFundosTable Test Case
 */
class IndicadoresFundosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\IndicadoresFundosTable
     */
    protected $IndicadoresFundos;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.IndicadoresFundos',
        'app.CnpjFundos',
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
        $config = TableRegistry::getTableLocator()->exists('IndicadoresFundos') ? [] : ['className' => IndicadoresFundosTable::class];
        $this->IndicadoresFundos = TableRegistry::getTableLocator()->get('IndicadoresFundos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->IndicadoresFundos);

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

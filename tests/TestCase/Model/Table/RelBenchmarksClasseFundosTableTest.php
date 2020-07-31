<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RelBenchmarksClasseFundosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RelBenchmarksClasseFundosTable Test Case
 */
class RelBenchmarksClasseFundosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RelBenchmarksClasseFundosTable
     */
    protected $RelBenchmarksClasseFundos;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.RelBenchmarksClasseFundos',
        'app.TipoBenchmarks',
        'app.TipoClasseFundos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('RelBenchmarksClasseFundos') ? [] : ['className' => RelBenchmarksClasseFundosTable::class];
        $this->RelBenchmarksClasseFundos = TableRegistry::getTableLocator()->get('RelBenchmarksClasseFundos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->RelBenchmarksClasseFundos);

        parent::tearDown();
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

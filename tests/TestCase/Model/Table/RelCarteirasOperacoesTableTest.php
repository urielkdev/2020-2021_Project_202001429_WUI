<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RelCarteirasOperacoesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RelCarteirasOperacoesTable Test Case
 */
class RelCarteirasOperacoesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RelCarteirasOperacoesTable
     */
    protected $RelCarteirasOperacoes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.RelCarteirasOperacoes',
        'app.CarteirasInvestimentos',
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
        $config = TableRegistry::getTableLocator()->exists('RelCarteirasOperacoes') ? [] : ['className' => RelCarteirasOperacoesTable::class];
        $this->RelCarteirasOperacoes = TableRegistry::getTableLocator()->get('RelCarteirasOperacoes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->RelCarteirasOperacoes);

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

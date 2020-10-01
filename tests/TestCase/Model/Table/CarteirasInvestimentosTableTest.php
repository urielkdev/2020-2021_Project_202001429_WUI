<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CarteirasInvestimentosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CarteirasInvestimentosTable Test Case
 */
class CarteirasInvestimentosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CarteirasInvestimentosTable
     */
    protected $CarteirasInvestimentos;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.CarteirasInvestimentos',
        'app.Usuarios',
        'app.IndicadoresCarteiras',
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
        $config = $this->getTableLocator()->exists('CarteirasInvestimentos') ? [] : ['className' => CarteirasInvestimentosTable::class];
        $this->CarteirasInvestimentos = $this->getTableLocator()->get('CarteirasInvestimentos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->CarteirasInvestimentos);

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

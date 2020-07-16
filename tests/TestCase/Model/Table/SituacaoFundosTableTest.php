<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SituacaoFundosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SituacaoFundosTable Test Case
 */
class SituacaoFundosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SituacaoFundosTable
     */
    protected $SituacaoFundos;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.SituacaoFundos',
        'app.CnpjFundos',
        'app.TipoSituacaoFundos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SituacaoFundos') ? [] : ['className' => SituacaoFundosTable::class];
        $this->SituacaoFundos = TableRegistry::getTableLocator()->get('SituacaoFundos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->SituacaoFundos);

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

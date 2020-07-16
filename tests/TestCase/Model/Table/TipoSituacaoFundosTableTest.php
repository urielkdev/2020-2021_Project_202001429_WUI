<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TipoSituacaoFundosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TipoSituacaoFundosTable Test Case
 */
class TipoSituacaoFundosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TipoSituacaoFundosTable
     */
    protected $TipoSituacaoFundos;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TipoSituacaoFundos',
        'app.SituacaoFundos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TipoSituacaoFundos') ? [] : ['className' => TipoSituacaoFundosTable::class];
        $this->TipoSituacaoFundos = TableRegistry::getTableLocator()->get('TipoSituacaoFundos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TipoSituacaoFundos);

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

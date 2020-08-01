<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RelPlanosPermissoesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RelPlanosPermissoesTable Test Case
 */
class RelPlanosPermissoesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RelPlanosPermissoesTable
     */
    protected $RelPlanosPermissoes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.RelPlanosPermissoes',
        'app.TipoPlanos',
        'app.Permissaos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('RelPlanosPermissoes') ? [] : ['className' => RelPlanosPermissoesTable::class];
        $this->RelPlanosPermissoes = TableRegistry::getTableLocator()->get('RelPlanosPermissoes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->RelPlanosPermissoes);

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

<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DocExtratosFundosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DocExtratosFundosTable Test Case
 */
class DocExtratosFundosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DocExtratosFundosTable
     */
    protected $DocExtratosFundos;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.DocExtratosFundos',
        'app.CnpjFundos',
        'app.TipoAnbimaClasses',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('DocExtratosFundos') ? [] : ['className' => DocExtratosFundosTable::class];
        $this->DocExtratosFundos = TableRegistry::getTableLocator()->get('DocExtratosFundos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->DocExtratosFundos);

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

<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsuariosAguardandoValidacoesEmailsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsuariosAguardandoValidacoesEmailsTable Test Case
 */
class UsuariosAguardandoValidacoesEmailsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UsuariosAguardandoValidacoesEmailsTable
     */
    protected $UsuariosAguardandoValidacoesEmails;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.UsuariosAguardandoValidacoesEmails',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('UsuariosAguardandoValidacoesEmails') ? [] : ['className' => UsuariosAguardandoValidacoesEmailsTable::class];
        $this->UsuariosAguardandoValidacoesEmails = $this->getTableLocator()->get('UsuariosAguardandoValidacoesEmails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->UsuariosAguardandoValidacoesEmails);

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

<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\UsuariosController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\UsuariosController Test Case
 *
 * @uses \App\Controller\UsuariosController
 */
class UsuariosControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Usuarios',
        'app.TipoPlanos',
        'app.TipoEtapasRegistros',
        'app.CarteirasInvestimentos',
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test login method
     *
     * @return void
     */
    public function testLogin(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test logout method
     *
     * @return void
     */
    public function testLogout(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test generateRandomValidationCode method
     *
     * @return void
     */
    public function testGenerateRandomValidationCode(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test registerWaitingForUserToValidateCode method
     *
     * @return void
     */
    public function testRegisterWaitingForUserToValidateCode(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validateEmail method
     *
     * @return void
     */
    public function testValidateEmail(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test register method
     *
     * @return void
     */
    public function testRegister(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test sendValidationEmail method
     *
     * @return void
     */
    public function testSendValidationEmail(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

<?php
namespace common\tests;

use common\models\Chatmessage;

class ChatMessageModelTest extends \Codeception\Test\Unit
{
    /**
     * @var \common\tests\UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // Despoletar todas as regras de validação;
    public function testValidations()
    {
    }

    /** Teste de CRUD no modelo */

    // Criar um registo válido e guardar na BD
    // Ver se o registo válido se encontra na BD
    public function testCreate()
    {
    }

    // Ler o registo anterior e aplicar um update
    // Ver se o registo atualizado se encontra na BD
    public function testUpdate()
    {
    }

    // Apagar o registo
    // Verificar que o registo não se encontra na BD
    public function testDelete()
    {
    }
}
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
        $message = new Chatmessage();

        // region message
        $message->message = null;
        $this->assertFalse($message->validate(['message'])); // Null

        $message->message = 1234;
        $this->assertFalse($message->validate(['message'])); // Integer

        $message->message = 12.34;
        $this->assertFalse($message->validate(['message'])); // Decimal

        $message->message = "";
        $this->assertFalse($message->validate(['message'])); // Empty String

        $message->message = "InvalidMessage InvalidMessage InvalidMessage InvalidMessage InvalidMessage InvalidMessage InvalidMessage InvalidMessage InvalidMessage InvalidMessage InvalidMessage InvalidMessage InvalidMessage InvalidMessage InvalidMessage InvalidMessage InvalidMessage InvalidMessage";
        $this->assertFalse($message->validate(['message'])); // Too many characters

        $message->message = "Valid Message";
        $this->assertTrue($message->validate(['message'])); // VALID
        //endregion

        // region datetime
        $message->datetime = null;
        $this->assertFalse($message->validate(['datetime'])); // Null

        $message->datetime = "";
        $this->assertFalse($message->validate(['datetime'])); // Empty String

        $message->datetime = "2022-01-01 09:00:00";
        $this->assertTrue($message->validate(['datetime'])); // VALID
        //endregion

        // region from
        $message->from = null;
        $this->assertFalse($message->validate(['from'])); // Null

        $message->from = "";
        $this->assertFalse($message->validate(['from'])); // Empty String

        $message->from = "Invalid";
        $this->assertFalse($message->validate(['from'])); // String

        $message->from = 1;
        $this->assertTrue($message->validate(['from'])); // VALID
        //endregion

        // region to
        $message->to = null;
        $this->assertFalse($message->validate(['to'])); // Null

        $message->to = "";
        $this->assertFalse($message->validate(['to'])); // Empty String

        $message->to = "Invalid";
        $this->assertFalse($message->validate(['to'])); // String

        $message->to = 1;
        $this->assertTrue($message->validate(['to'])); // VALID
        //endregion
    }

    /** Teste de CRUD no modelo */

    // Criar um registo válido e guardar na BD
    // Ver se o registo válido se encontra na BD
    public function testCreate()
    {
        $chatmessage = new Chatmessage();

        $chatmessage->message = 'Hello There';
        $chatmessage->datetime = '2022-01-01 09:00:00';
        $chatmessage->from = 1;
        $chatmessage->to = 1;

        $chatmessage->save();

        $this->tester->seeInDatabase(
            'chatmessage',
            [
                'message' => 'Hello There',
                'datetime' => '2022-01-01 09:00:00',
                'from' => 1,
                'to' => 1
            ]
        );
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
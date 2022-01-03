<?php
namespace common\tests;

use common\models\Ptapplication;

class PTApplicationModelTest extends \Codeception\Test\Unit
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
        $application = new Ptapplication();

        // region cvFilename
        $application->cvFilename = null;
        $this->assertFalse($application->validate(['cvFilename'])); // Null

        $application->cvFilename = 1234;
        $this->assertFalse($application->validate(['cvFilename'])); // Integer

        $application->cvFilename = 12.34;
        $this->assertFalse($application->validate(['cvFilename'])); // Decimal

        $application->cvFilename = '';
        $this->assertFalse($application->validate(['cvFilename'])); // Empty String

        $application->cvFilename = 'Invalid Filename Invalid Filename Invalid Invalid Filename';
        $this->assertFalse($application->validate(['cvFilename'])); // Too Long String

        $application->cvFilename = 'Valid Filename';
        $this->assertTrue($application->validate(['cvFilename'])); // VALID
        //endregion

        // region qualificationFilename
        $application->qualificationFilename = null;
        $this->assertFalse($application->validate(['qualificationFilename'])); // Null

        $application->qualificationFilename = 1234;
        $this->assertFalse($application->validate(['qualificationFilename'])); // Integer

        $application->qualificationFilename = 12.34;
        $this->assertFalse($application->validate(['qualificationFilename'])); // Decimal

        $application->qualificationFilename = '';
        $this->assertFalse($application->validate(['qualificationFilename'])); // Empty String

        $application->qualificationFilename = 'Invalid Filename Invalid Filename Invalid Invalid Filename';
        $this->assertFalse($application->validate(['qualificationFilename'])); // Too Long String

        $application->qualificationFilename = 'Valid Filename';
        $this->assertTrue($application->validate(['qualificationFilename'])); // VALID
        //endregion

        // region jobTime
        $application->jobTime = 12.34;
        $this->assertFalse($application->validate(['jobTime'])); // Decimal

        $application->jobTime = 'Valid Filename';
        $this->assertFalse($application->validate(['jobTime'])); // String

        $application->jobTime = null;
        $this->assertTrue($application->validate(['jobTime'])); // VALID (Null)

        $application->jobTime = 1234;
        $this->assertTrue($application->validate(['jobTime'])); // VALID (Integer)

        $application->jobTime = '';
        $this->assertTrue($application->validate(['jobTime'])); // VALID (Empty String)
        //endregion

        // region comment
        $application->comment = 1234;
        $this->assertFalse($application->validate(['comment'])); // Integer

        $application->comment = 12.34;
        $this->assertFalse($application->validate(['comment'])); // Decimal

        $application->comment = "InvalidMessage InvalidMessage InvalidMessage InvalidMessage InvalidMessage InvalidMessage InvalidMessage InvalidMessage InvalidMessage InvalidMessage InvalidMessage InvalidMessage InvalidMessage InvalidMessage InvalidMessage InvalidMessage InvalidMessage InvalidMessage";
        $this->assertFalse($application->validate(['comment'])); // Too many characters

        $application->comment = null;
        $this->assertTrue($application->validate(['comment'])); // VALID (Null)

        $application->comment = "";
        $this->assertTrue($application->validate(['comment'])); // VALID (Empty String)

        $application->comment = "Valid Message";
        $this->assertTrue($application->validate(['comment'])); // VALID (String)
        //endregion

        // region approved
        $application->approved = null;
        $this->assertFalse($application->validate(['approved'])); // Null

        $application->approved = 12.34;
        $this->assertFalse($application->validate(['approved'])); // Decimal

        $application->approved = '';
        $this->assertFalse($application->validate(['approved'])); // Empty String

        $application->approved = 'Invalid String';
        $this->assertFalse($application->validate(['approved'])); // String

        $application->approved = 1;
        $this->assertTrue($application->validate(['approved'])); // VALID (Integer)
        //endregion

        // region userId
        $application->userId = null;
        $this->assertFalse($application->validate(['userId'])); // Null

        $application->userId = 12.34;
        $this->assertFalse($application->validate(['userId'])); // Decimal

        $application->userId = '';
        $this->assertFalse($application->validate(['userId'])); // Empty String

        $application->userId = 'Invalid String';
        $this->assertFalse($application->validate(['userId'])); // String

        $application->userId = 1;
        $this->assertTrue($application->validate(['userId'])); // VALID (Integer)
        //endregion
    }

    /** Teste de CRUD no modelo */

    // Criar um registo válido e guardar na BD
    // Ver se o registo válido se encontra na BD
    public function testCreate()
    {
        $application = new Ptapplication();

        $application->cvFilename = 'cv.png';
        $application->qualificationFilename = 'qualification.png';
        $application->jobTime = null;
        $application->comment = null;
        $application->approved = 0;
        $application->userId = 1;

        $application->save();

        $this->tester->seeInDatabase(
            'ptapplication',
            [
                'cvFilename' => 'cv.png',
                'qualificationFilename' => 'qualification.png',
                'jobTime' => null,
                'comment' => null,
                'approved' => 0,
                'userId' => 1
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
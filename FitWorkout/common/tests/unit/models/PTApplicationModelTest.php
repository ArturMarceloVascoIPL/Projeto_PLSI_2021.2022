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

    public function testModelCrud()
    {
        $application = new Ptapplication();

        /** Despoletar todas as regras de validação; */

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

        /** Teste de CRUD no modelo */

        // Criar um registo válido e guardar na BD
        $application->save();

        // Ver se o registo válido se encontra na BD
        $readApplication = Ptapplication::findOne($application->id);
        $this->assertNotNull($readApplication);
        $this->assertIsObject($readApplication);

        // Ler o registo anterior e aplicar um update
        $readApplication->cvFilename = 'cv.filename'; // cvFilename='Valid Filename' -> cvFilename='cv.filename'
        $readApplication->save();

        // Ver se o registo atualizado se encontra na BD
        $updateApplication = Ptapplication::find()->where(['id' => $application->id, 'cvFilename' => 'cv.filename'])->one();
        $this->assertNotNull($updateApplication);
        $this->assertIsObject($updateApplication);

        // Apagar o registo
        $updateApplication->delete();

        // Verificar que o registo não se encontra na BD
        $deletedApplication = Ptapplication::find()->where(['id' => $application->id])->one();
        $this->assertNull($deletedApplication);
    }
}
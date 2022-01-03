<?php
namespace common\tests;

use common\models\Exercise;

class ExerciseModelTest extends \Codeception\Test\Unit
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
        $exercise = new Exercise();

        // region name
        $exercise->name = null;
        $this->assertFalse($exercise->validate(['name'])); // Null

        $exercise->name = 1234;
        $this->assertFalse($exercise->validate(['name'])); // Integer

        $exercise->name = 12.34;
        $this->assertFalse($exercise->validate(['name'])); // Decimal

        $exercise->name = '';
        $this->assertFalse($exercise->validate(['name'])); // Empty String

        $exercise->name = 'InvalidName InvalidName InvalidName InvalidName';
        $this->assertFalse($exercise->validate(['name'])); // Too many characters

        $exercise->name = 'Valid Name';
        $this->assertTrue($exercise->validate(['name'])); // VALID
        //endregion

        // region description
        $exercise->description = 1234;
        $this->assertFalse($exercise->validate(['description'])); // Integer

        $exercise->description = 12.34;
        $this->assertFalse($exercise->validate(['description'])); // Decimal

        $exercise->description = 'InvalidDescription InvalidDescription InvalidDescription InvalidDescription InvalidDescription InvalidDescription InvalidDescription InvalidDescription InvalidDescription InvalidDescription InvalidDescription InvalidDescription InvalidDescription InvalidDescription';
        $this->assertFalse($exercise->validate(['description'])); // Too many characters

        $exercise->description = null;
        $this->assertTrue($exercise->validate(['description'])); // VALID (Null)

        $exercise->description = '';
        $this->assertTrue($exercise->validate(['description'])); // VALID (Empty String)

        $exercise->description = 'Valid Description';
        $this->assertTrue($exercise->validate(['description'])); // VALID (String)
        //endregion

        // region approved
        $exercise->approved = 12.34;
        $this->assertFalse($exercise->validate(['approved'])); // Decimal

        $exercise->approved = 'Invalid String';
        $this->assertFalse($exercise->validate(['approved'])); // String

        $exercise->approved = null;
        $this->assertTrue($exercise->validate(['approved'])); // VALID (Null)

        $exercise->approved = '';
        $this->assertTrue($exercise->validate(['approved'])); // VALID (Empty String)

        $exercise->approved = 1;
        $this->assertTrue($exercise->validate(['approved'])); // VALID (Integer)
        //endregion

        // region categoryId
        $exercise->categoryId = null;
        $this->assertFalse($exercise->validate(['categoryId'])); // Null

        $exercise->categoryId = 12.34;
        $this->assertFalse($exercise->validate(['categoryId'])); // Decimal

        $exercise->categoryId = '';
        $this->assertFalse($exercise->validate(['categoryId'])); // Empty String

        $exercise->categoryId = 'Invalid String';
        $this->assertFalse($exercise->validate(['categoryId'])); // String

        $exercise->categoryId = 1;
        $this->assertTrue($exercise->validate(['categoryId'])); // VALID (Integer)
        //endregion

        // region typeId
        $exercise->typeId = null;
        $this->assertFalse($exercise->validate(['typeId'])); // Null

        $exercise->typeId = 12.34;
        $this->assertFalse($exercise->validate(['typeId'])); // Decimal

        $exercise->typeId = '';
        $this->assertFalse($exercise->validate(['typeId'])); // Empty String

        $exercise->typeId = 'Invalid String';
        $this->assertFalse($exercise->validate(['typeId'])); // String

        $exercise->typeId = 1;
        $this->assertTrue($exercise->validate(['typeId'])); // VALID (Integer)
        //endregion
    }

    /** Teste de CRUD no modelo */

    // Criar um registo válido e guardar na BD
    // Ver se o registo válido se encontra na BD
    public function testCreate()
    {
        $exercise = new Exercise();

        $exercise->name = 'Exercise 1';
        $exercise->description = 'Description 1';
        $exercise->approved = null;
        $exercise->categoryId = 1;
        $exercise->typeId = 1;

        $exercise->save();

        $this->tester->seeInDatabase(
            'exercise',
            [
                'name' => 'Exercise 1',
                'description' => 'Description 1',
                'approved' => null,
                'categoryId' => 1,
                'typeId' => 1
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
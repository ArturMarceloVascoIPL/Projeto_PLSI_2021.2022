<?php
namespace common\tests;

use common\models\Userprofile;

class UserProfileModelTest extends \Codeception\Test\Unit
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
        $profile = new Userprofile();

        // region userId
        $profile->userId = null;
        $this->assertFalse($profile->validate(['userId'])); // Null

        $profile->userId = 12.34;
        $this->assertFalse($profile->validate(['userId'])); // Decimal

        $profile->userId = '';
        $this->assertFalse($profile->validate(['userId'])); // Empty String

        $profile->userId = 'Invalid String';
        $this->assertFalse($profile->validate(['userId'])); // String

        $profile->userId = 1;
        $this->assertTrue($profile->validate(['userId'])); // VALID (Integer)
        //endregion

        // region address
        $profile->address = 1234;
        $this->assertFalse($profile->validate(['address'])); // Integer

        $profile->address = 12.34;
        $this->assertFalse($profile->validate(['address'])); // Decimal

        $profile->address = null;
        $this->assertTrue($profile->validate(['address'])); // VALID (Null)

        $profile->address = '';
        $this->assertTrue($profile->validate(['address'])); // VALID (Empty String)

        $profile->address = 'Valid Address';
        $this->assertTrue($profile->validate(['address'])); // VALID (String)
        //endregion

        // region nif
        $profile->nif = 12345678910;
        $this->assertFalse($profile->validate(['nif'])); // Too Long Integer

        $profile->nif = 12.34;
        $this->assertFalse($profile->validate(['nif'])); // Decimal

        $profile->nif = 'Invalid String';
        $this->assertFalse($profile->validate(['nif'])); // String

        $profile->nif = null;
        $this->assertTrue($profile->validate(['nif'])); // VALID (Null)

        $profile->nif = 123456789;
        $this->assertTrue($profile->validate(['nif'])); // VALID (Integer)

        $profile->nif = '';
        $this->assertTrue($profile->validate(['nif'])); // VALID (Empty String)
        //endregion

        // region postalCode
        $profile->postalCode = 1234;
        $this->assertFalse($profile->validate(['postalCode'])); // Integer

        $profile->postalCode = 12.34;
        $this->assertFalse($profile->validate(['postalCode'])); // Decimal

        $profile->postalCode = 'Invalid Invalid Invalid Invalid Invalid Invalid';
        $this->assertFalse($profile->validate(['postalCode'])); // Too Long String

        $profile->postalCode = null;
        $this->assertTrue($profile->validate(['postalCode'])); // VALID (Null)

        $profile->postalCode = '';
        $this->assertTrue($profile->validate(['postalCode'])); // VALID (Empty String)

        $profile->postalCode = 'Valid Postal Code';
        $this->assertTrue($profile->validate(['postalCode'])); // VALID (String)
        //endregion

        // region city
        $profile->city = 1234;
        $this->assertFalse($profile->validate(['city'])); // Integer

        $profile->city = 12.34;
        $this->assertFalse($profile->validate(['city'])); // Decimal

        $profile->city = 'Invalid Invalid Invalid Invalid Invalid Invalid';
        $this->assertFalse($profile->validate(['city'])); // Too Long String

        $profile->city = null;
        $this->assertTrue($profile->validate(['city'])); // VALID (Null)

        $profile->city = '';
        $this->assertTrue($profile->validate(['city'])); // VALID (Empty String)

        $profile->city = 'Valid Postal Code';
        $this->assertTrue($profile->validate(['city'])); // VALID (String)
        //endregion
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
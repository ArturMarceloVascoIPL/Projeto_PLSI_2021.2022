<?php
namespace common\tests;

use common\models\Product;

class ProductModelTest extends \Codeception\Test\Unit
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
        $product = new Product();

        /** Despoletar todas as regras de validação; */

        // region name
        $product->name = null;
        $this->assertFalse($product->validate(['name'])); // Null

        $product->name = 1234;
        $this->assertFalse($product->validate(['name'])); // Integer

        $product->name = 12.34;
        $this->assertFalse($product->validate(['name'])); // Decimal

        $product->name = '';
        $this->assertFalse($product->validate(['name'])); // Empty String

        $product->name = 'InvalidName InvalidName InvalidName InvalidName';
        $this->assertFalse($product->validate(['name'])); // Too Long String

        $product->name = 'Valid Name';
        $this->assertTrue($product->validate(['name'])); // VALID
        //endregion

        // region description
        $product->description = 1234;
        $this->assertFalse($product->validate(['description'])); // Integer

        $product->description = 12.34;
        $this->assertFalse($product->validate(['description'])); // Decimal

        $product->description = 'InvalidDescription InvalidDescription InvalidDescription InvalidDescription InvalidDescription InvalidDescription InvalidDescription InvalidDescription InvalidDescription InvalidDescription InvalidDescription InvalidDescription InvalidDescription InvalidDescription';
        $this->assertFalse($product->validate(['description'])); // Too Long String

        $product->description = null;
        $this->assertTrue($product->validate(['description'])); // VALID (Null)

        $product->description = '';
        $this->assertTrue($product->validate(['description'])); // VALID (Empty String)

        $product->description = 'Valid Description';
        $this->assertTrue($product->validate(['description'])); // VALID (String)
        //endregion

        // region stock
        $product->stock = null;
        $this->assertFalse($product->validate(['stock'])); // Null

        $product->stock = 12.34;
        $this->assertFalse($product->validate(['stock'])); // Decimal

        $product->stock = '';
        $this->assertFalse($product->validate(['stock'])); // Empty String

        $product->stock = 'Invalid String';
        $this->assertFalse($product->validate(['stock'])); // String

        $product->stock = 1234;
        $this->assertTrue($product->validate(['stock'])); // VALID
        //endregion

        // region price
        $product->price = null;
        $this->assertFalse($product->validate(['price'])); // Null

        $product->price = 12.34;
        $this->assertFalse($product->validate(['price'])); // Decimal

        $product->price = '';
        $this->assertFalse($product->validate(['price'])); // Empty String

        $product->price = 'Invalid String';
        $this->assertFalse($product->validate(['price'])); // String

        $product->price = 1234;
        $this->assertTrue($product->validate(['price'])); // VALID
        //endregion

        // region imageFileName
        $product->imageFileName = 1234;
        $this->assertFalse($product->validate(['imageFileName'])); // Integer

        $product->imageFileName = 12.34;
        $this->assertFalse($product->validate(['imageFileName'])); // Decimal

        $product->imageFileName = null;
        $this->assertTrue($product->validate(['imageFileName'])); // VALID (Null)

        $product->imageFileName = '';
        $this->assertTrue($product->validate(['imageFileName'])); // VALID (Empty String)

        $product->imageFileName = 'Valid File Name';
        $this->assertTrue($product->validate(['imageFileName'])); // VALID (String)
        //endregion

        // region categoryId
        $product->categoryId = null;
        $this->assertFalse($product->validate(['categoryId'])); // Null

        $product->categoryId = 1234;
        $this->assertFalse($product->validate(['categoryId'])); // Integer (Non-existing ID)

        $product->categoryId = 12.34;
        $this->assertFalse($product->validate(['categoryId'])); // Decimal

        $product->categoryId = '';
        $this->assertFalse($product->validate(['categoryId'])); // Empty String

        $product->categoryId = 'Invalid String';
        $this->assertFalse($product->validate(['categoryId'])); // String

        $product->categoryId = 1;
        $this->assertTrue($product->validate(['categoryId'])); // VALID
        //endregion

        /** Teste de CRUD no modelo */

        // Criar um registo válido e guardar na BD
        $product->save();

        // Ver se o registo válido se encontra na BD
        $readProduct = Product::findOne($product->id);
        $this->assertNotNull($readProduct);
        $this->assertIsObject($readProduct);

        // Ler o registo anterior e aplicar um update
        $readProduct->stock = 5; // stock=1234 -> stock=5
        $readProduct->save();

        // Ver se o registo atualizado se encontra na BD
        $updateProduct = Product::find()->where(['id' => $product->id, 'stock' => 5])->one();
        $this->assertNotNull($updateProduct);
        $this->assertIsObject($updateProduct);

        // Apagar o registo
        $updateProduct->delete();

        // Verificar que o registo não se encontra na BD
        $deletedProduct = Product::find()->where(['id' => $product->id])->one();
        $this->assertNull($deletedProduct);
    }
}
<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int $stock
 * @property int $price
 * @property string|null $image
 * @property int $categoryId
 *
 * @property Productcategory $category
 * @property Order[] $orders
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public $file;

    public static function tableName()
    {
        return 'product';
    }

    public function rules()
    {
        return [
            [['name', 'stock', 'price', 'categoryId'], 'required'],
            [['stock', 'price', 'categoryId'], 'integer'],
            [['stock'], 'integer', 'min' => 0],
            [['name', 'description', 'image'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['file'],'file'],
            [['categoryId'], 'exist', 'skipOnError' => true, 'targetClass' => Productcategory::className(), 'targetAttribute' => ['categoryId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nome',
            'description' => 'Descrição',
            'stock' => 'Stock',
            'price' => 'Preço ($)',
            'image' => 'Imagem',
            'categoryId' => 'Categoria ID',
            'category.name' => 'Categoria',
            'file' => 'Imagem Ficheiro',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Productcategory::className(), ['id' => 'categoryId']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['productId' => 'id']);
    }
}

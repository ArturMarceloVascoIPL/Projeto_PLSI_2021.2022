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
 * @property string|null $imageFileName
 * @property int $categoryId
 *
 * @property Productcategory $category
 * @property Orderitems[] $orderitems
 */
class Product extends \yii\db\ActiveRecord
{
    public $file;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'stock', 'price', 'categoryId'], 'required'],
            [['stock', 'price', 'categoryId'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['description', 'imageFileName'], 'string', 'max' => 255],
            [['file'],'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            // [['name','stock','price','categoryId'] ,'required', 'on' => 'update'],
            [['name'], 'unique'],
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
            'price' => 'Preço',
            'imageFileName' => 'Nome de Ficheiro da Imagem',
            'file' => 'Ficheiro',
            'categoryId' => 'ID da Categoria',
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
     * Gets query for [[Orderitems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderitems()
    {
        return $this->hasMany(Orderitems::className(), ['productId' => 'id']);
    }
}

<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "orderitems".
 *
 * @property int $id
 * @property int $price
 * @property int $productId
 * @property int $orderId
 *
 * @property Order $order
 * @property Product $product
 */
class Orderitems extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orderitems';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price', 'productId', 'orderId'], 'required'],
            [['price', 'productId', 'orderId'], 'integer'],
            [['orderId'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['orderId' => 'id']],
            [['productId'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['productId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'price' => 'Preço',
            'productId' => 'ID do Produto',
            'orderId' => 'ID da Encomenda',
        ];
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'orderId']);
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'productId']);
    }
}

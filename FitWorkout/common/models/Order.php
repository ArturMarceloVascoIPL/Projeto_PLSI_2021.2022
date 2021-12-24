<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property string $date
 * @property int $priceTotal
 * @property int $status
 * @property int $userId
 *
 * @property Userprofile $client
 * @property Orderitems[] $orderitems
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'priceTotal', 'status', 'userId'], 'required'],
            [['date'], 'safe'],
            [['priceTotal', 'status', 'userId'], 'integer'],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => Userprofile::className(), 'targetAttribute' => ['userId' => 'userId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Data',
            'priceTotal' => 'Preço Total',
            'status' => 'Estado',
            'userId' => 'ID de Utilizador',
        ];
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Userprofile::className(), ['userId' => 'userId']);
    }

    /**
     * Gets query for [[Orderitems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderitems()
    {
        return $this->hasMany(Orderitems::className(), ['orderId' => 'id']);
    }
}

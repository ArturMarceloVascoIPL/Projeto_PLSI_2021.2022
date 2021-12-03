<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "chat".
 *
 * @property int $id
 * @property int $isActive
 * @property int $clientId
 * @property int $ptId
 *
 * @property Chatmessage[] $chatmessages
 * @property Client $client
 * @property Personaltrainer $pt
 */
class Chat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['isActive', 'clientId', 'ptId'], 'required'],
            [['isActive', 'clientId', 'ptId'], 'integer'],
            [['clientId'], 'exist', 'skipOnError' => true, 'targetClass' => Client::className(), 'targetAttribute' => ['clientId' => 'userId']],
            [['ptId'], 'exist', 'skipOnError' => true, 'targetClass' => Personaltrainer::className(), 'targetAttribute' => ['ptId' => 'userId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'isActive' => 'Is Active',
            'clientId' => 'Client ID',
            'ptId' => 'Pt ID',
        ];
    }

    /**
     * Gets query for [[Chatmessages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChatmessages()
    {
        return $this->hasMany(Chatmessage::className(), ['chatId' => 'id']);
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Client::className(), ['userId' => 'clientId']);
    }

    /**
     * Gets query for [[Pt]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPt()
    {
        return $this->hasOne(Personaltrainer::className(), ['userId' => 'ptId']);
    }
}

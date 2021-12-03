<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "chatmessage".
 *
 * @property int $id
 * @property string $message
 * @property string $datetime
 * @property int $chatId
 *
 * @property Chat $chat
 */
class Chatmessage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chatmessage';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['message', 'datetime', 'chatId'], 'required'],
            [['datetime'], 'safe'],
            [['chatId'], 'integer'],
            [['message'], 'string', 'max' => 255],
            [['chatId'], 'exist', 'skipOnError' => true, 'targetClass' => Chat::className(), 'targetAttribute' => ['chatId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'message' => 'Message',
            'datetime' => 'Datetime',
            'chatId' => 'Chat ID',
        ];
    }

    /**
     * Gets query for [[Chat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChat()
    {
        return $this->hasOne(Chat::className(), ['id' => 'chatId']);
    }
}

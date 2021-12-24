<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "chatmessage".
 *
 * @property int $id
 * @property string $message
 * @property string $datetime
 * @property int $from
 * @property int $to
 *
 * @property Userprofile $from0
 * @property Userprofile $to0
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
            [['message', 'datetime', 'from', 'to'], 'required'],
            [['datetime'], 'safe'],
            [['from', 'to'], 'integer'],
            [['message'], 'string', 'max' => 255],
            [['from'], 'exist', 'skipOnError' => true, 'targetClass' => Userprofile::className(), 'targetAttribute' => ['from' => 'userId']],
            [['to'], 'exist', 'skipOnError' => true, 'targetClass' => Userprofile::className(), 'targetAttribute' => ['to' => 'userId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'message' => 'Mensagem',
            'datetime' => 'Data/Hora',
            'from' => 'Remetente',
            'to' => 'Destinatário',
        ];
    }

    /**
     * Gets query for [[From0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFrom0()
    {
        return $this->hasOne(Userprofile::className(), ['userId' => 'from']);
    }

    /**
     * Gets query for [[To0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTo0()
    {
        return $this->hasOne(Userprofile::className(), ['userId' => 'to']);
    }
}

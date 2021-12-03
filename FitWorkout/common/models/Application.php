<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "application".
 *
 * @property int $id
 * @property string $qualificationProof
 * @property string|null $comment
 * @property int $status
 * @property int $clientId
 *
 * @property Client $client
 */
class Application extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'application';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['qualificationProof', 'status', 'clientId'], 'required'],
            [['status', 'clientId'], 'integer'],
            [['qualificationProof', 'comment'], 'string', 'max' => 255],
            [['clientId'], 'exist', 'skipOnError' => true, 'targetClass' => Client::className(), 'targetAttribute' => ['clientId' => 'userId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'qualificationProof' => 'Qualification Proof',
            'comment' => 'Comment',
            'status' => 'Status',
            'clientId' => 'Client ID',
        ];
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
}

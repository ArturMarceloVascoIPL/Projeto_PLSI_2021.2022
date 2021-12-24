<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ptapplication".
 *
 * @property int $id
 * @property string $cvFilename
 * @property string $qualificationFilename
 * @property int|null $jobTime
 * @property string|null $comment
 * @property int $approved
 * @property int $userId
 *
 * @property Userprofile $user
 */
class Ptapplication extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ptapplication';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cvFilename', 'qualificationFilename', 'approved', 'userId'], 'required'],
            [['jobTime', 'approved', 'userId'], 'integer'],
            [['cvFilename', 'qualificationFilename'], 'string', 'max' => 45],
            [['comment'], 'string', 'max' => 255],
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
            'cvFilename' => 'Currículo Vitae',
            'qualificationFilename' => 'Certificado de Qualificações',
            'jobTime' => 'Anos de Experiência',
            'comment' => 'Comentário',
            'approved' => 'Aprovado',
            'userId' => 'ID de Utilizador',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Userprofile::className(), ['userId' => 'userId']);
    }
}

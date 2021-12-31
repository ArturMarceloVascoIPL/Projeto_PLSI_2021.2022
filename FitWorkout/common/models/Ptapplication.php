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
    public $file_qualificationFilename;
    public $file_cvFilename;

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
            [['file_cvFilename'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, pdf'],
            [['file_qualificationFilename'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, pdf'],

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

            'file_cvFilename' => 'Ficherio de Currículo Vitae',
            'file_qualificationFilename' => 'Ficherio de Certificado de Qualificações',
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

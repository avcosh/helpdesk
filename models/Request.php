<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "requests".
 *
 * @property int $id
 * @property string $name
 * @property int $type
 * @property int $priority
 * @property string $description
 * @property string|null $client_email
 *
 * @property Comments[] $comments
 * @property Clients $clientEmail
 */
class Request extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'requests';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'type', 'priority', 'description'], 'required'],
            [['type', 'priority'], 'integer'],
            [['name', 'description', 'client_email'], 'string', 'max' => 255],
            [['client_email'], 'exist', 'skipOnError' => true, 'targetClass' => Client::className(), 'targetAttribute' => ['client_email' => 'email']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название заявки',
            'type' => 'Тип заявки',
            'priority' => 'Приоритет заявки',
            'description' => 'Описание заявки',
            'client_email' => 'Ваш Email',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['request_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientEmail()
    {
        return $this->hasOne(Clients::className(), ['email' => 'client_email']);
    }
}

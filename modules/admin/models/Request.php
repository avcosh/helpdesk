<?php

namespace app\modules\admin\models;
use app\modules\admin\models\Comment;
//use Yii;

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
    const TYPE_SERVICE = 1;
    const TYPE_SUPPORT = 2;
    const TYPE_INFO = 3;
    
	const PRIORITY_LOW = 1;
	const PRIORITY_MIDDLE = 2;
	const PRIORITY_HIGH = 3;
	
	public $comments;
	
	
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
            'priority' => 'Приоритет',
            'description' => 'Описание',
	        'comments'   => 'Комментарии к заявке'
     
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComment()
    {
        return $this->hasMany(Comment::className(), ['request_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientEmail()
    {
        return $this->hasOne(Client::className(), ['email' => 'client_email']);
    }
}

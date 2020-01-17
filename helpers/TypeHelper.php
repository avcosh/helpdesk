<?php

namespace app\helpers;

use app\modules\admin\models\Request;
use yii\helpers\ArrayHelper;

class TypeHelper
{
    public static function getTypeList()
    {
        return [
            Request::TYPE_SERVICE => 'Сервисное обслуживание',
            Request::TYPE_SUPPORT => 'Поддержка',
            Request::TYPE_INFO => 'Запрос технической информации',
            
        ];
    }

    public static function getTypeName($type)
    {
        return ArrayHelper::getValue(self::getTypeList(), $type);
    }
} 
<?php
/**
 * Helper для того, чтобы в форме отображались названия приоритетов вместо цифр
 */
namespace app\helpers;

use app\modules\admin\models\Request;
use yii\helpers\ArrayHelper;

class PriorityHelper
{
    public static function getPriorityList()
    {
        return [
            Request::PRIORITY_LOW => 'Низкий приоритет',
            Request::PRIORITY_MIDDLE => 'Средний приоритет',
            Request::PRIORITY_HIGH => 'Высокий приоритет',
            
        ];
    }

    public static function getPriorityName($priority)
    {
        return ArrayHelper::getValue(self::getPriorityList(), $priority);
    }
} 
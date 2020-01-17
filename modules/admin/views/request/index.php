<?php
use app\helpers\TypeHelper;
use app\helpers\PriorityHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\RequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заявки';
$this->params['breadcrumbs'][] = ['label' => 'Админка', 'url' => ['/admin/default']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-index">

    <h1><?= Html::encode($this->title) ?></h1>
<?php //print_r($comments); die;$id = $searchModel->id;?>
    

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel, 
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute' => 'type',
                'filter' => TypeHelper::getTypeList(),
                'value' => function ($searchModel) {
                        return TypeHelper::getTypeName($searchModel->type);
                    },
            ],
            [
                'attribute' => 'priority',
                'filter' => PriorityHelper::getPriorityList(),
                'value' => function ($searchModel) {
                        return PriorityHelper::getPriorityName($searchModel->priority);
                    },
            ],
            'description',
			[
                'attribute' => 'comments',
                'format' => 'raw',
                'value' => function ($id) {
					     return Html::a(
            'Перейти',
            Url::to(['comment/view', 'id' => $id]),
            
        );
                       
                    },
            ],
			
                 

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

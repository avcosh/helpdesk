<?php
/* @var $this yii\web\View */
$this->title = 'Приложение для создания заявок';
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<?php if( Yii::$app->session->hasFlash('success') ): ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo Yii::$app->session->getFlash('success'); ?>
    </div>
<?php endif;?>

<?php if( Yii::$app->session->hasFlash('error') ): ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo Yii::$app->session->getFlash('error'); ?>
    </div>
<?php endif;?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Приложение для создания заявок</h1>

        <p class="lead">Заполните форму</p>

      
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-12">
               

                <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'type') ?>
        <?= $form->field($model, 'priority') ?>
        <?= $form->field($model, 'description') ?>
        <?= $form->field($model, 'client_email') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

            </div>
            
            
        </div>

    </div>
</div>
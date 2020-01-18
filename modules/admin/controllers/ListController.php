<?php

namespace app\modules\admin\controllers;
use app\modules\admin\models\Comment;
use app\modules\admin\models\Request;
use yii\web\Controller;

class ListController extends Controller
{
    public function actionIndex($id)
    {
        $request = Request::find()->where(['id' => $id])->one();
        $comments = Comment::find()->where(['request_id' => $id])->orderBy('id DESC')->all(); 
        return $this->render('index', compact('comments', 'request'));
    }
}

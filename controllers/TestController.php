<?php

namespace app\controllers;

use app\models\Tasks;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;

class TestController extends Controller
{

    public function actionTest()
    {
        $tasks = Tasks::find()
            ->orderBy(['id'=>SORT_DESC])
            ->all();

        foreach ($tasks as $task) {
            echo $task->task . '<br>';
            $task->save();
        }

        exit();
    }

    public function actionAdd()
    {
        if( Yii::$app->request->get('task') ){
            $newTask = new Tasks();
            $newTask->task = Yii::$app->request->get('task');
            $newTask->save();
        }

        return $this->render('add');
    }

}

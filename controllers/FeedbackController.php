<?php

namespace app\controllers;

use app\models\Feedback;

class FeedbackController extends Controller
{
    public function actionIndex()
    {
        $page = $_GET['page'] ?? 0;

        $list = Feedback::getLimit(($page + 1) * 10);
        echo $this->render('feedback/list',[
            'list' => $list,
            'page' => ++$page
        ]);
    }
}
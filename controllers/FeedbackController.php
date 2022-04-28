<?php

namespace app\controllers;

use app\models\Feedback;
use app\engine\Request;

class FeedbackController extends Controller
{
    public function actionIndex()
    {
        $page = (new Request())->getParams()['page'] ?? 0;

        $list = Feedback::getLimit(($page + 1) * 10);
        echo $this->render('feedback/list',[
            'list' => $list,
            'page' => ++$page
        ]);
    }
}
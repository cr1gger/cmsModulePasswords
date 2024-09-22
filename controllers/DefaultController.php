<?php

namespace app\modules\control\modules\cmsModulePasswords\controllers;

use app\modules\control\modules\cmsModulePasswords\models\PmStore;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

/**
 * Default controller for the `cmsModulePasswords` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $provider = new ActiveDataProvider([
           'query' => PmStore::find()->where(['owner' => Yii::$app->user->identity->id])
        ]);

        return $this->render('index', compact('provider'));
    }
}

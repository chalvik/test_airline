<?php

namespace app\modules\v1\controllers;

use app\components\BreackPointComponent;
use app\components\EndPointComponent;
use app\components\RoundTripComponent;
use yii\helpers\ArrayHelper;
use yii\rest\Controller;
use Yii;

/**
 * Default controller for the `api` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $AirSegments = ArrayHelper::getValue(Yii::$app->getRequest()->getBodyParams(), 'AirSegments');
        $serments = \Yii::createObject([
            'class' => 'app\components\ParseFlightComponent',
            'data' => $AirSegments,
        ],[]);


        return  [
            'endPoint' => EndPointComponent::run($serments->parse()),
            'breakPoint' => BreackPointComponent::run($serments->parse()),
            'roundTrip' => RoundTripComponent::run($serments->parse())
        ];
    }
}

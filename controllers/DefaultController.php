<?php

namespace gustarus\upload\controllers;

use gustarus\upload\models\File;
use yii\data\ActiveDataProvider;

class DefaultController extends \yii\web\Controller {

  /**
   * @var string
   */
  public $defaultAction = 'library';

  public function actionLibrary() {
    $provider = new ActiveDataProvider(['query' => File::find()->orderBy('created_at DESC')]);
    return $this->render('library', [
      'provider' => $provider,
    ]);
  }
}

<?php
/**
 * Created by:  Itella Connexions ©
 * Created at:  13:49 17.04.15
 * Developer:   Pavel Kondratenko
 * Contact:     gustarus@gmail.com
 */

namespace gustarus\upload\actions;

use Yii;
use gustarus\upload\models\File;
use gustarus\upload\components\web\UrlFile;
use yii\base\Action;
use yii\web\BadRequestHttpException;
use yii\web\Response;
use yii\web\ServerErrorHttpException;
use yii\web\UploadedFile;

class UploadAction extends Action {

  /**
   * @var string
   */
  public $name = 'file';

  /**
   * @var string
   */
  public $path = '@webroot/uploads/{dir}/{name}';


  /**
   * @inheritdoc
   */
  public function run() {
    if (!Yii::$app->request->isAjax) {
      throw new BadRequestHttpException('Only ajax requests available.');
    }

    $file;
    if (!($file = UploadedFile::getInstanceByName($this->name))) {
      $url = Yii::$app->request->post('file');
      if (!$url) {
        throw new BadRequestHttpException('File was not found in request (looked for link or binary file).');
      }

      $file = UrlFile::parse($url);
      if (!$file) {
        throw new BadRequestHttpException('Bad uri to the file passed.');
      }
    }

    $model = new File();
    if (!$model->upload($file, $this->path)) {
      throw new ServerErrorHttpException('File was not uploaded.');
    }

    \Yii::$app->response->format = Response::FORMAT_JSON;

    return $model;
  }
} 

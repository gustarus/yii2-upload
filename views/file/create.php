<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var gustarus\upload\models\File $model
 */

$this->title = 'Create File';
$this->params['breadcrumbs'][] = ['label' => 'Files', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="file-create">
  <?=
  $this->render('_form', [
    'model' => $model,
  ]) ?>
</div>

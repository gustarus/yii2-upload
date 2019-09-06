<?php
/**
 * Created by PhpStorm.
 * User: supreme
 * Date: 16.04.14
 * Time: 0:59
 */

namespace gustarus\upload\assets;

use yii\web\AssetBundle;

class Asset extends AssetBundle {

	/**
	 * @inheritdoc
	 */
	public $sourcePath = '@gustarus/upload/public';

	/**
	 * @inheritdoc
	 */
	public $css = [
		'style/main.css',
	];
}

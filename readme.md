This package is a module to manage uploads.
This module has two actions `DownloadAction` and `UploadAction` to use them inside your controllers.
Also this module has web interface to show your upload and to manage them.


## Installation
**1. Require the package via composer**
```bash
composer require webulla/yii2-upload
```

**2. Add some code to your default configuration file**

This file should be used inside both `web` and `console`.
Also you should define uploads folder (where to store uploaded files).
```php
[
  'aliases' => [
    '@uploads' => '@app/web/uploads',
  ],
  
  'modules' => [
    'upload' => [
      'class' => 'webulla\upload\Module',
    ],
  ],
];
```

**3. Add some code to your console configuration file**

With this code you will enable migrations from this package.
```php
[
  'controllerNamespace' => 'app\commands',
  'controllerMap' => [
    'migrate' => [
      'class' => 'yii\console\controllers\MigrateController',
      'migrationPath' => [
        '@webulla/upload/migrations',
      ],
    ],
  ],
]
```

**4. Use this module**

The module interface will be available by `/upload` uri.


## To be done
- [ ] Describe how to use the actions inside controllers.
- [ ] Describe how to send data to the upload action.
- [ ] Describe how to use the download action.

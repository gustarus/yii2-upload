<?php
/**
 * Created by:  Itella Connexions ©
 * Created at:  16:42 14.04.15
 * Developer:   Pavel Kondratenko
 * Contact:     gustarus@gmail.com
 */

namespace gustarus\upload\components\web;

use yii\base\Object;

class UrlFile extends Object {

  /**
   * @var string
   */
  public $url;

  /**
   * @var string
   */
  public $name;

  /**
   * @var string
   */
  public $type;

  /**
   * Collection of mime types by extensions.
   * @var array
   */
  public static $extensionsTypes = [
    'txt' => 'text/plain',
    'htm' => 'text/html',
    'html' => 'text/html',
    'php' => 'text/html',
    'css' => 'text/css',
    'js' => 'application/javascript',
    'json' => 'application/json',
    'xml' => 'application/xml',
    'swf' => 'application/x-shockwave-flash',
    'flv' => 'video/x-flv',

    // images
    'png' => 'image/png',
    'jpe' => 'image/jpeg',
    'jpeg' => 'image/jpeg',
    'jpg' => 'image/jpeg',
    'gif' => 'image/gif',
    'bmp' => 'image/bmp',
    'ico' => 'image/vnd.microsoft.icon',
    'tiff' => 'image/tiff',
    'tif' => 'image/tiff',
    'svg' => 'image/svg+xml',
    'svgz' => 'image/svg+xml',

    // archives
    'zip' => 'application/zip',
    'rar' => 'application/x-rar-compressed',
    'exe' => 'application/x-msdownload',
    'msi' => 'application/x-msdownload',
    'cab' => 'application/vnd.ms-cab-compressed',

    // audio/video
    'mp3' => 'audio/mpeg',
    'qt' => 'video/quicktime',
    'mov' => 'video/quicktime',

    // adobe
    'pdf' => 'application/pdf',
    'psd' => 'image/vnd.adobe.photoshop',
    'ai' => 'application/postscript',
    'eps' => 'application/postscript',
    'ps' => 'application/postscript',

    // ms office
    'doc' => 'application/msword',
    'rtf' => 'application/rtf',
    'xls' => 'application/vnd.ms-excel',
    'ppt' => 'application/vnd.ms-powerpoint',
    'docx' => 'application/msword',
    'xlsx' => 'application/vnd.ms-excel',
    'pptx' => 'application/vnd.ms-powerpoint',

    // open office
    'odt' => 'application/vnd.oasis.opendocument.text',
    'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
  ];


  /**
   * @param string
   * @return bool
   */
  public function saveAs($path) {
    $content = @file_get_contents($this->url);
    if (!$content) {
      return false;
    }

    return file_put_contents($path, $content);
  }

  /**
   * @return string original file base name
   */
  public function getBaseName() {
    return pathinfo($this->name, PATHINFO_FILENAME);
  }

  /**
   * @return string file extension
   */
  public function getExtension() {
    return strtolower(pathinfo($this->name, PATHINFO_EXTENSION));
  }

  /**
   * @return int
   */
  public function getSize() {
    return 0;
  }

  /**
   * @param string $url
   * @return self
   */
  public static function parse($url) {
    $file = new self;
    $file->url = $url;
    $file->name = basename($url);

    $extension = $file->extension;
    $file->type = isset(self::$extensionsTypes[$extension])
      ? self::$extensionsTypes[$extension] : 'application/octet-stream';

    return $file;
  }
}

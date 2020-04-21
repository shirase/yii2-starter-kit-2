<?php

use Sitemaped\Sitemap;

return [
    'class' => 'yii\web\UrlManager',
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'rules' => [
        // Pages
        ['pattern' => '/', 'route' => 'site/index'],
        ['pattern' => '<slug>', 'route' => 'page/view', 'modelClass' => 'common\models\Page', 'class' => 'common\web\SlugUrlRule'],

        // Articles
        ['pattern' => 'article', 'route' => 'article/index'],
        ['pattern' => 'article/attachment-download', 'route' => 'article/attachment-download'],
        ['pattern' => 'article/<slug>', 'route' => 'article/view'],

        // Sitemap
        ['pattern' => 'sitemap.xml', 'route' => 'site/sitemap', 'defaults' => ['format' => Sitemap::FORMAT_XML]],
        ['pattern' => 'sitemap.txt', 'route' => 'site/sitemap', 'defaults' => ['format' => Sitemap::FORMAT_TXT]],
        ['pattern' => 'sitemap.xml.gz', 'route' => 'site/sitemap', 'defaults' => ['format' => Sitemap::FORMAT_XML, 'gzip' => true]],

        ['pattern'=>'<controller>', 'route'=>'<controller>/index'],
        ['pattern'=>'<controller>/<action>', 'route'=>'<controller>/<action>'],
        ['pattern'=>'<module>/<controller>', 'route'=>'<module>/<controller>/index'],
    ]
];

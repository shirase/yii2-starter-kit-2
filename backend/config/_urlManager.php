<?php
return [
    'class' => yii\web\UrlManager::class,
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'rules' => [
        ['pattern'=>'<controller>', 'route'=>'<controller>/index'],
        ['pattern'=>'<controller>/<action>', 'route'=>'<controller>/<action>'],
        ['pattern'=>'<module>/<controller>', 'route'=>'<module>/<controller>/index'],
    ]
];

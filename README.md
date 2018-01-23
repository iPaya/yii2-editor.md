# Editor.md for Yii2

The editor.md extension for Yii2.

<https://github.com/pandao/editor.md>

## Usage

```php
<?php

$form->field($model, 'markdown')->widget(EditorMD::className(), [
    'clientOptions'=>[
        'height" => 600,
    ]
]);
```

<?php
$action = $view->getActionStyleLang();
include 'start_model.php';
if($action === 'ChangeLangPost.php')
    echo<<<HTML
        <input type="hidden"value="{$state}" name="state">
    HTML;
foreach ($data as $index => $value)
    if($index === $style_lang)
        echo <<<HTML
            <div class="form-check">
            <input name="id" onchange="changeLangStyle(this, '{$style_lang}', '#{$idModel}', '{$error}')" class="form-check-input flexCheck" value="{$index}" checked type="radio">
            <label  class="form-check-label">
            {$value->getName()}
            </label>
            </div>
        HTML;
    else
        echo <<<HTML
            <div class="form-check">
            <input name="id" onchange="changeLangStyle(this, '{$style_lang}', '#{$idModel}', '{$error}')" class="form-check-input" value="{$index}" type="radio">
            <label  class="form-check-label">
            {$value->getName()}
            </label>
            </div>
        HTML;
include 'end_model.php';
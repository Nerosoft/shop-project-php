<?php
$action = "ChangeLangPost.php";
include 'start_model.php';
echo<<<HTML
    <input type="hidden"value="{$state}" name="state">
    <input type="hidden" name="change_language" value="{$this->getUrlName2()}">
HTML;
foreach ($data as $key => $value)
    if($key === $style_lang)
        echo <<<HTML
            <div class="form-check">
            <input name="id" onchange="changeLangStyle(this, '#{$idForm}', '{$style_lang}', '#{$idModel}', '{$error}')" class="form-check-input flexCheck" value="{$key}" checked type="radio">
            <label  class="form-check-label">
            {$value->getName()}
            </label>
            </div>
        HTML;
    else
        echo <<<HTML
            <div class="form-check">
            <input name="id" onchange="changeLangStyle(this, '#{$idForm}', '{$style_lang}', '#{$idModel}', '{$error}')" class="form-check-input" value="{$key}" type="radio">
            <label  class="form-check-label">
            {$value->getName()}
            </label>
            </div>
        HTML;
include 'end_model.php';
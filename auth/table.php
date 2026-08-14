<?php
require 'auth/view.php';
echo <<<HTML
<button onclick="openForm('#createModel')" class="btn btn-primary">{$view->getModelPage()['ButtonModelCreate']}</button>
HTML;
$view->makeCreateModal($view->getModelPage()['ScreenModelCreate'], $view->getModelPage()['ButtonModelAdd']);
$view->initTable();
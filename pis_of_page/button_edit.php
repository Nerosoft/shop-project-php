<?php
    $valueObj =  htmlspecialchars(is_array($myObject)?json_encode($myObject):$myObject->getObj(), ENT_QUOTES, "UTF-8");
    if($view->getUrlName2() === 'Product' || isset($view->getModel2()['MyFlexTables'][$view->getUrlName2()])){
        $view->makeCreateModal($view, $view->getScreenModelEdit(), $view->getButtonModelEdit(), "editModel".$index, $index, $myObject);
        echo <<<HTML
            <i class="fa fa-binoculars fa-2x pointer" onclick="openForm('#imgmodal{$index}')"></i>
            <i onclick="restValue('#editModel{$index}', '$valueObj');$('#editModel{$index}').find('form').find('img').attr('src', './asset/product/{$view->getId()}/{$index}')" class="fa fa-sliders fa-2x pointer"></i>

        HTML;
    }
    else{
        if($view->getUrlName2() === 'Users' || $view->getUrlName2() === 'Branches')
            $view->makeCreateModal($view, $view->getScreenModelEdit(), $view->getButtonModelEdit(), "editModel".$index, $index, $myObject);
        echo <<<HTML
            <i onclick="restValue('#editModel{$index}', '$valueObj')" class="fa fa-sliders fa-2x pointer"></i>
        HTML;
    }
?>
</td></tr>
<?php
++$count;

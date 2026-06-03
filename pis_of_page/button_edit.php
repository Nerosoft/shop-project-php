<?php
    
        $valueObj =  htmlspecialchars(is_array($myObject)?json_encode($myObject):$myObject->getObj(), ENT_QUOTES, "UTF-8");
       
        if($view->getUrlName2() === 'Product' || isset($view->getModel2()['MyFlexTables'][$view->getUrlName2()]))
        echo <<<HTML
            <i class="fa fa-binoculars fa-2x pointer" onclick="openForm('#imgmodal{$index}')"></i>
            <i onclick="restValue('#$idModel', '$valueObj', './asset/product/{$view->getId()}/{$index}')" class="fa fa-sliders fa-2x pointer"></i>

        HTML;
        else
            echo <<<HTML
                <i onclick="restValue('#$idModel', '$valueObj')" class="fa fa-sliders fa-2x pointer"></i>
            HTML;
?>
</td></tr>
<?php
++$count;

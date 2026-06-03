<?php
    
        $valueObj = is_array($myObject)?json_encode($myObject):$myObject->getObj();
        echo$view->getUrlName2() === 'Product' || isset($view->getModel2()['MyFlexTables'][$view->getUrlName2()])?
        <<<HTML
            <i data-src="./asset/product/{$view->getId()}/{$index}" data-id="#$idModel" data-value='$valueObj' class="fa fa-sliders fa-2x pointer edit_create"></i>
        HTML:
        <<<HTML
            <i data-id="#$idModel" data-value='$valueObj' class="fa fa-sliders fa-2x pointer edit_create"></i>
        HTML;
?>
</td></tr>
<?php
++$count;
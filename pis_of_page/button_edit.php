<?php
    
        $valueObj = is_array($myObject)?json_encode($myObject):$myObject->getObj();
        if($view->getUrlName2() === 'Product' || isset($view->getModel2()['MyFlexTables'][$view->getUrlName2()]))
        echo <<<HTML
            <i class="fa fa-binoculars fa-2x pointer" onclick="openForm('#imgmodal{$index}')"></i>
            <i data-src="./asset/product/{$view->getId()}/{$index}" data-id="#$idModel" data-value='$valueObj' class="fa fa-sliders fa-2x pointer edit_create"></i>
        HTML;
        else
            echo <<<HTML
                <i data-id="#$idModel" data-value='$valueObj' class="fa fa-sliders fa-2x pointer edit_create"></i>
            HTML;
?>
</td></tr>
<?php
++$count;
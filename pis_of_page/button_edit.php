<?php

if($this->getUrlName2() === 'Product' ||
$this->getUrlName2() === 'ChangeLanguage' && $index !== $this->getLanguage() && $index !== 'english'||
$this->getUrlName2() === 'Home' || 
$this->getUrlName2() === 'Branches' && $this->getId() !== $index && $index !== $this->getFixedId()||
isset($this->getModel2()['MyFlexTables'][$this->getUrlName2()])||
$this->getUrlName2() === 'Users'){
    $action = $this->getUrlName2() === 'ChangeLanguage'?'ChangeLanguageDeletePost':($this->getUrlName2() === 'Home'?'HomeDeletePost.php':($this->getUrlName2() === 'Branches'?'BranchDeletePost.php':('SettingUsersDeletePost?id='.$this->getUrlName2())));
    include('all_modal/modal_delete.php');
}
if($this->getUrlName2() === 'Branches' || $this->getUrlName2() === 'MyStyle' || $this->getUrlName2() === 'ChangeLanguage'){
    $action = ($this->getUrlName2() === 'Branches'?'BranchChangePost':'ChangeLanguagePost').'?id='.$this->getUrlName2();
    include('all_modal/modal_changelanguage_changestyle.php');
}

if($this->getUrlName2() === 'Users' || $this->getUrlName2() === 'Product' || isset($this->getModel2()['MyFlexTables'][$this->getUrlName2()]) )
    $this->makeCreateModal($this->getScreenModelEdit(), $this->getButtonModelEdit(), "editModel".$index, $index, $myObject);
 
 
$valueObj =  htmlspecialchars($myValue??(is_array($myObject)?json_encode($myObject):$myObject->getObj()), ENT_QUOTES, "UTF-8");
if($this->getUrlName2() === 'SystemLang')
    echo<<<HTML
        <i onclick="restValue('#{$idModel}', '{$valueObj}')" class="fa fa-sliders fa-2x pointer"></i>
    HTML;
else if($this->getUrlName2() === 'Product' || isset($this->getModel2()['MyFlexTables'][$this->getUrlName2()])){
    include('all_modal/ViewImage.php');
    echo <<<HTML
        <i class="fa fa-binoculars fa-2x pointer" onclick="openForm('#imgmodal{$index}')"></i>
        <i onclick="restValue('#editModel{$index}', '$valueObj');$('#editModel{$index}').find('form').find('img').attr('src', './asset/product/{$this->getId()}/{$index}')" class="fa fa-sliders fa-2x pointer"></i>
    HTML;
}
else
    echo <<<HTML
        <i onclick="restValue('#editModel{$index}', '$valueObj')" class="fa fa-sliders fa-2x pointer"></i>
    HTML;
?>
</td></tr>
<?php
$this->plusCount();

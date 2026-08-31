<?php
$valueObj = htmlspecialchars($myValue??(is_array($myObject)?json_encode($myObject):$myObject->getObj()), ENT_QUOTES, "UTF-8");
if($this->getUrlName2() === 'Users' || $this->getUrlName2() === 'Product' || isset($this->getModel2()['MyFlexTables'][$this->getUrlName2()])){
    $idModel = 'editModel'.$index;
    $this->makeCreateModal($this->getScreenModelEdit(), $this->getButtonModelEdit(), $idModel, $index, $myObject);        
}
//echo html
echo($this->getUrlName2() === 'Product' || isset($this->getModel2()['MyFlexTables'][$this->getUrlName2()]))?
<<<HTML
    <i class="fa fa-sliders fa-2x pointer" onclick="restValue('#{$idModel}', '$valueObj');$('#{$idModel}').find('form').find('img').attr('src', './asset/product/{$this->getId()}/{$index}')"></i>
HTML: 
    <<<HTML
        <i class="fa fa-sliders fa-2x pointer" onclick="restValue('#{$idModel}', '$valueObj');"></i>
    HTML;

if($this->getUrlName2() === 'Product' ||
$this->getUrlName2() === 'ChangeLanguage' && $index !== $this->getLanguage() && $index !== 'english' && $index !== 'arabic'||
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
echo '</td></tr>';
$this->plusCount();


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
$myIndexEdit = $index??$this->getCount();
echo <<<HTML
    <i class="fa fa-sliders fa-2x pointer" onclick="restValue('#editModel{$myIndexEdit}', '$valueObj');
HTML;
//echo html
echo ($this->getUrlName2() === 'Product' || isset($this->getModel2()['MyFlexTables'][$this->getUrlName2()]))?<<<HTML
$('#editModel{$index}').find('form').find('img').attr('src', './asset/product/{$this->getId()}/{$index}')"></i>
    <i class="fa fa-binoculars fa-2x pointer" onclick="openForm('#imgmodal{$index}')"></i>
    <div class="modal fade" id="imgmodal{$index}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="SettingLanguage">{$this->getTitleViewImage()}</h5>
                    <button type="button" id="close_button" onclick="closeForm('#imgmodal{$index}')" class="btn btn-dark">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="./asset/product/{$this->getId()}/{$index}" class="product-img-view">
                </div>
            </div>
        </div>
    </div>
HTML:<<<HTML
    "></i>
HTML;

?>
</td></tr>
<?php
$this->plusCount();

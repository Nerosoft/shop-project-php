<img class="style_icon_menu pointer" src="./asset/lib/icons/trash3.svg" onclick="openForm('#deleteModel<?php echo$index?>')"/>
<?php
$title = $view->getScreenModelDelete();
$idModel = "deleteModel".$index;
$idForm = "deleteForm".$index;
include('start_model.php');
include ('my_id.php');
echo $view->getmessageModelDelete().'<spam>-'.($nameItem??$myObject->getName()).'</spam>';
if(count($view->getFileByFixedId()['Branches']) > 1 && $view->getUrlName2() === 'Home' ||
 count($view->getFileByFixedId()['Branches']) > 1 && $view->getUrlName2() === 'ChangeLanguage'||
 count($view->getFileByFixedId()['Branches']) > 1 && $view->getUrlName2() === 'Product'||
 count($view->getFileByFixedId()['Branches']) > 1 && $view->getUrlName2() === 'SettingUsers')
    foreach($view->getFileByFixedId()['Branches'] as $key=>$option){
        if($key !== $view->getId() && $view->getUrlName2() === 'Home' && isset($view->getFile()[$key][$view->getFile()[$key]['Setting']['Language']]['MyFlexTables'][$index])||
            $key !== $view->getId() && $view->getUrlName2() === 'ChangeLanguage' && isset($view->getFile()[$key][$index])||
            $key !== $view->getId() && $view->getUrlName2() === 'SettingUsers' && isset($view->getFile()[$key]['Users'][$index])||
            $key !== $view->getId() && $view->getUrlName2() === 'Product' && isset($view->getFile()[$key]['Product'][$index]))
            echo <<<HTML
                <div class="col-md-auto">
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" id="choices[]" class="form-check-input" name="choices[$key]" value="{$key}">
                            <label class="form-check-label" for="choices[]">
                            {$option['Name']}
                            </label>
                        </div>
                    </div>
                </div>
            HTML;
    }
?>
</div>
<div class="modal-footer">
    <button id="click_button" type="submit" class="btn btn-primary"><?php echo $view->getbuttonModelDelete()?></button>
</div>
</form>
    </div>
    </div>
</div>
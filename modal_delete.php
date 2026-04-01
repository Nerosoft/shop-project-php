<img class="style_icon_menu pointer" src="./asset/lib/icons/trash3.svg" onclick="openForm('#deleteModel<?php echo$index?>')"/>
<?php
$title = $view->getScreenModelDelete();
$idModel = "deleteModel".$index;
$idForm = "deleteForm".$index;
include('start_model.php');
echo $view->getmessageModelDelete().'<spam>-'.($nameItem??$myObject->getName()).'</spam>';
//ignore branch and flextable
if($view->getUrlName2() === 'Branches' || isset($view->getModel2()['MyFlexTables'][$view->getUrlName2()]))
    include ('my_id.php');
else
    include 'AllBranchOption.php';
?>
</div>
<div class="modal-footer">
    <button id="click_button" type="submit" class="btn btn-primary"><?php echo $view->getbuttonModelDelete()?></button>
</div>
</form>
    </div>
    </div>
</div>
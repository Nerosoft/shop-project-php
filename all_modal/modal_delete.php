<i class="fa fa-trash fa-2x pointer" onclick="openForm('#deleteModel<?php echo$index?>')"></i>
<?php
$title = $view->getScreenModelDelete();
$idModel = "deleteModel".$index;
$idForm = "deleteForm".$index;
include('start_model.php');
echo $view->getmessageModelDelete().'<spam>-'.($nameItem??$myObject->getName()).'</spam>';
//ignore branch
if($view->getUrlName2() !== 'Branches')
    include 'all_modal/AllBranchOption.php';
else
    include ('all_modal/my_id.php');
?>
</div>
<div class="modal-footer">
    <button id="click_button" type="submit" class="btn btn-primary"><?php echo $view->getbuttonModelDelete()?></button>
</div>
</form>
    </div>
    </div>
</div>
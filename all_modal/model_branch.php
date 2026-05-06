<!-- Modal -->
<?php 
include('start_model.php');
include 'model_branch_inputs.php';
if(isset($index))
    include('my_id.php');
else{
    if(isset($view->getModel2()['MyFlexTables']))
        echo <<<HTML
            <div class="col-lg-auto pt-2">
                <div class="form-check">
                    <input name="flextable"  class="form-check-input" value="flextable" type="checkbox">
                    <label  class="form-check-label">
                        {$view->getFlexTable()}
                    </label>
                </div>
            </div>
        
        HTML;
    if(isset($view->getObj()['Users']))
        echo <<<HTML
            <div class="col-lg-auto pt-2">
                <div class="form-check">
                    <input name="Users"  class="form-check-input" value="Users" type="checkbox">
                    <label  class="form-check-label">
                        {$view->getSettingAccounts()}
                    </label>
                </div>
            </div>
        HTML;
    if(isset($view->getObj()['Product']))
        echo <<<HTML
            <div class="col-lg-auto pt-2">
                <div class="form-check">
                    <input name="Product"  class="form-check-input" value="Product" type="checkbox">
                    <label  class="form-check-label">
                        {$view->getProduct()}
                    </label>
                </div>
            </div>
        HTML;
}
?>
    </div>
</div>
<?php include('end_model.php');?>
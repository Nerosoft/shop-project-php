
    <div class="start-page container">
        <button class="btn btn-primary" onClick="openForm('#createModel')"><?php echo $view->getButtonModelCreate()?></button>
        <?php
            $title = $view->getScreenModelCreate();
            $button = $view->getButtonModelAdd();
            $action = 'ProductCreatePost.php';
            include('all_modal/ProductModal.php');
        ?>
        <table id="example" class="table table-striped" >
        <thead>
            <tr>
                <th><?php echo$view->getTableId()?></th>
                <th><?php echo $view->getTableProductImage()?></th>
                <th><?php echo$view->getNameHeadTable()?></th>
                <th><?php echo$view->getDescreptionHeadTable()?></th>
                <th><?php echo$view->getSalaryHeadTable()?></th>
                <th><?php echo$view->getCategoryHeadTable()?></th>
                <th><?php echo$view->getTabelEvent()?></th>
            </tr>
        </thead>
        <tbody>
           
                <?php 
                
                    $count = 1;
                    foreach ($view->getMyDataView() as $index => $myObject) {
                        echo <<<HTML
                            <tr>
                                <td>$count</td>
                                <td><img id="preview" src="./asset/product/{$view->getId()}/{$index}" class="avatar-product-view"></td>
                                <td>{$myObject->getName()}</td>
                                <td>{$myObject->getDescreption()}</td>
                                <td>{$myObject->getSalary()}</td>
                                <td>{$myObject->getCategory()}</td>
                                <td>
                        HTML;
                        include('all_modal/ViewImage.php');
                        $action = 'SettingUsersDeletePost?id='.$view->getUrlName2();
                        include('all_modal/modal_delete.php');
                        $title = $view->getScreenModelEdit();
                        $button = $view->getButtonModelEdit();
                        $action = 'ProductCreatePost.php';
                        $idModel = "editModel".$index;
                        $idForm = "editForm".$index;
                        include('all_modal/ProductModal.php');

                        
                        
                        echo <<<HTML
                        <i class="fa fa-sliders fa-2x pointer" 
                        onclick="displayEditForm('#{$idModel}', '{$myObject->getName()}', '{$myObject->getDescreption()}', '{$myObject->getSalary()}', '{$myObject->getCategory()}', '{$index}')"></i>
                                <i class="fa fa-binoculars fa-2x pointer" onclick="openForm('#imgmodal{$index}')"></i>
                                </td>
                            </tr>
                        HTML;
                        ++$count;
                    }
                ?>
            
                        
        </tbody>
        <tfoot>
            <tr>
                <th><?php echo$view->getTableId()?></th>
                <th><?php echo $view->getTableProductImage()?></th>
                <th><?php echo$view->getNameHeadTable()?></th>
                <th><?php echo$view->getDescreptionHeadTable()?></th>
                <th><?php echo$view->getSalaryHeadTable()?></th>
                <th><?php echo$view->getCategoryHeadTable()?></th>
                <th><?php echo$view->getTabelEvent()?></th>
            </tr>
        </tfoot>
    </table>
    </div>
<script type="text/javascript">
    let setting = [
        { 'searchable': true, className: "text-left table-avatar" },
        { 'searchable': true, className: "text-left" },
        { 'searchable': true, className: "text-left table-avatar" },
        { 'searchable': true, className: "text-left table-avatar" },
        { 'searchable': true, className: "text-left table-avatar" },
        { 'searchable': true, className: "text-left table-avatar" },
        { 'searchable': false, className: "text-left table-avatar"}
    ];
    function displayEditForm(id, name, descreption, salary, category, image){
        removeClass(id);
        openForm(id);
        $(id).find('#name').val(name);
        $(id).find('#descreption').val(descreption);
        $(id).find('#salary').val(salary);
        $(id).find('#category').val(category);
        $(id).find('#preview').attr('src', './asset/product/<?php echo$view->getId()?>/'+image);
        $(id).find('#avatar').val("");
        $(id).find('#avatar')[0].setCustomValidity('');
    }
     $('#salary').on('input invalid', function() {
        if (this.validity.valueMissing)
            this.setCustomValidity('<?php echo$view->getRequiredSalary()?>');
        else if (this.value < 1 || this.value >= 1000000)
            this.setCustomValidity('<?php echo$view->getInvalidSalary()?>');
        else
            this.setCustomValidity('');
    });
</script>
<?php 
include 'pis_of_page/end_html.php';
?>
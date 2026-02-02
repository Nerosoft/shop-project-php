<link rel="stylesheet" href="./asset/css/product.css">
</head>
<body>
    <div class="start-page container">
        <button class="btn btn-primary" onClick="openForm('#createModel')"><?php echo $view->getButtonModelCreate()?></button>
        <?php
            $title = $view->getScreenModelCreate();
            $button = $view->getButtonModelAdd();
            $action = 'ProductCreatePost.php';
            include('ProductModal.php');
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
                                <td><img id="preview" src="./asset/product/{$index}" class="avatar-product-view"></td>
                                <td>{$myObject->getName()}</td>
                                <td>{$myObject->getDescreption()}</td>
                                <td>{$myObject->getSalary()}</td>
                                <td>{$myObject->getCategory()}</td>
                                <td>
                                    <div class="modal fade" id="imgmodal{$index}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="SettingLanguage">{$view->getTitleViewImage()}</h5>
                                                    <button type="button" id="close_button" onclick="closeForm('#imgmodal{$index}')" class="btn btn-dark">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="./asset/product/{$index}" class="product-img-view">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        HTML;
                        $action = 'ProductDeletePost.php';
                        include('modal_delete.php');
                        $title = $view->getScreenModelEdit();
                        $button = $view->getButtonModelEdit();
                        $action = 'ProductEditPost.php';
                        $idModel = "editModel".$index;
                        $idForm = "editForm".$index;
                        include('ProductModal.php');

                        
                        
                        echo <<<HTML
                                    <img class="style_icon_menu pointer"
                                    src="./asset/lib/icons/wrench-adjustable.svg"
                                    onclick="displayEditForm('#{$idModel}', '{$myObject->getName()}', '{$myObject->getDescreption()}', '{$myObject->getSalary()}', '{$myObject->getCategory()}', '{$index}')"/>
                                    <img class="style_icon_menu pointer" src="./asset/lib/icons/binoculars-fill.svg" onclick="openForm('#imgmodal{$index}')"/>
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
        $(id).find('#preview').attr('src', './asset/product/'+image);
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
    function openImage(avatar){
        avatar.click();
    }
    $('#avatar').on('invalid', function(){
        if (this.validity.valueMissing)
            this.setCustomValidity("<?php echo $view->getReqimage()?>");
    });
    function changeImage(file, preview){
        avatar = file.files[0];
        if(avatar && !['image/jpeg', 'image/png'].includes(avatar.type)||avatar && avatar.size > (2 * 1024 * 1024)){
            file.setCustomValidity('<?php echo $view->getInvimage()?>');
            preview.attr('src', './asset/img/error_image.png');
        }else if(avatar){
            file.setCustomValidity('');
            const reader = new FileReader();
            reader.onload = function (e) {
                var img = new Image;
                img.src = e.target.result; 
                preview.attr('src', e.target.result);
                img.onload = function() {
                preview.data('height', this.height);
                preview.data('width', this.width);
                };
            };
            reader.readAsDataURL(avatar);
        }else{
            file.setCustomValidity('<?php echo $view->getInvimage()?>');
            preview.attr('src', './asset/img/error_image.png');
        }
 }
// </script>
<?php include 'end_html.php'?>
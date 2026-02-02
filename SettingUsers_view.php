</head>
<body>
    <div class="start-page container">
        <button class="btn btn-primary" onClick="openForm('#createModel')"><?php echo $view->getButtonModelCreate()?></button>
        <?php
            $title = $view->getScreenModelCreate();
            $button = $view->getButtonModelAdd();
            $action = 'SettingUsersCreatePost.php';
            include('modal_setting_users_table.php');
        ?>
        <table id="example" class="table table-striped" >
        <thead>
            <tr>
                <th><?php echo$view->getTableId()?></th>
                <th><?php echo$view->getNameHeadTable()?></th>
                <th><?php echo$view->getPasswordHeadTable()?></th>
                <th><?php echo$view->getForgetPasswordHeadTable()?></th>
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
                                <td>{$myObject->getName()}</td>
                                <td>{$myObject->getPassword()}</td>
                                <td>{$myObject->getKey()}</td>
                                <td>
                            HTML;
                            $action = 'SettingUsersDeletePost.php';
                            include('modal_delete.php');
                            $title = $view->getScreenModelEdit();
                            $button = $view->getButtonModelEdit();
                            $action = 'SettingUsersEditPost.php';
                            $idModel = "editModel".$index;
                            $idForm = "editForm".$index;
                            include('modal_setting_users_table.php');
                            echo <<<HTML
                                        <img class="style_icon_menu pointer"
                                        src="./asset/lib/icons/wrench-adjustable.svg"
                                        onclick="displayEditForm('#{$idModel}', '{$myObject->getName()}', '{$myObject->getPassword()}', '{$myObject->getKey()}')"/>
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
                <th><?php echo$view->getNameHeadTable()?></th>
                <th><?php echo$view->getPasswordHeadTable()?></th>
                <th><?php echo$view->getForgetPasswordHeadTable()?></th>
                <th><?php echo$view->getTabelEvent()?></th>
            </tr>
        </tfoot>
    </table>
    </div>
<script type="text/javascript">
    let setting = [
        { 'searchable': true, className: "text-left" },
        { 'searchable': true, className: "text-left" },
        { 'searchable': true, className: "text-left" },
        { 'searchable': true, className: "text-left" },
        { 'searchable': false }
    ];
    function displayEditForm(id, email, password, codePassword){
        removeClass(id);
        openForm(id);
        $(id).find('#email').val(email);
        $(id).find('#password').val(password);
        $(id).find('#codePassword').val(codePassword);
    }
</script>
<?php 
include 'ValidEmail.php';
include 'end_html.php'?>
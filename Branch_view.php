</head>
<body>
    <div class="start-page container">
        <button class="btn btn-primary" onClick="openForm('#createModel')"><?php echo $view->getButtonModelCreate()?></button>
        <?php
            $title = $view->getScreenModelCreate();
            $button = $view->getButtonModelAdd();
            $action = 'BranchCreatePost.php';
            include('model_branch.php');
        ?>
        <table id="example" class="table table-striped" >
        <thead>
            <tr>
                <th><?php echo$view->getTableId()?></th>
                <th><?php echo$view->getBranchName()?></th>
                <th><?php echo$view->getBranchPhone()?></th>
                <th><?php echo$view->getBranchGovernments()?></th>
                <th><?php echo$view->getBranchCity()?></th>
                <th><?php echo$view->getBranchStreet()?></th>
                <th><?php echo$view->getBranchBuilding()?></th>
                <th><?php echo$view->getBranchAddress()?></th>
                <th><?php echo$view->getBranchCountry()?></th>
                <th><?php echo$view->getBranchFollow()?></th>
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
                                <td>{$myObject->getPhone()}</td>
                                <td>{$myObject->getGovernments()}</td>
                                <td>{$myObject->getCity()}</td>
                                <td>{$myObject->getStreet()}</td>
                                <td>{$myObject->getBuilding()}</td>
                                <td>{$myObject->getAddress()}</td>
                                <td>{$myObject->getCountry()}</td>
                                <td>{$myObject->getFollowId()}</td>
                                <td>
                        HTML;
                        if($view->getId() !== $index){
                            $action = 'BranchDeletePost.php';
                            include('modal_delete.php');
                        }
                        $title = $view->getScreenModelEdit();
                        $button = $view->getButtonModelEdit();
                        $idModel = "editModel".$index;
                        $idForm = "editForm".$index;
                        $action = 'BranchEditPost.php';
                        include('model_branch.php');
                        echo <<<HTML
                                    <img class="style_icon_menu pointer"
                                    src="./asset/lib/icons/wrench-adjustable.svg"
                                    onclick="displayEditForm($('#{$idForm}').find('#brance-rays-name'), $('#{$idForm}').find('#brance-rays-phone'), $('#{$idForm}').find('#brance-rays-country'), $('#{$idForm}').find('#brance-rays-governments'), $('#{$idForm}').find('#brance-rays-city'), $('#{$idForm}').find('#brance-rays-street'), $('#{$idForm}').find('#brance-rays-building'), $('#{$idForm}').find('#brance-rays-address'), $('#{$idForm}').find('#brance-rays-follow option'), '#{$idModel}', '{$myObject->getName()}', '{$myObject->getPhone()}', '{$myObject->getGovernments()}', '{$myObject->getCity()}', '{$myObject->getStreet()}', '{$myObject->getBuilding()}', '{$myObject->getAddress()}', '{$myObject->getCountry()}', '{$myObject->getFollowId()}')"/>
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
                <th><?php echo$view->getBranchName()?></th>
                <th><?php echo$view->getBranchPhone()?></th>
                <th><?php echo$view->getBranchGovernments()?></th>
                <th><?php echo$view->getBranchCity()?></th>
                <th><?php echo$view->getBranchStreet()?></th>
                <th><?php echo$view->getBranchBuilding()?></th>
                <th><?php echo$view->getBranchAddress()?></th>
                <th><?php echo$view->getBranchCountry()?></th>
                <th><?php echo$view->getBranchFollow()?></th>
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
        { 'searchable': true, className: "text-left" },
        { 'searchable': true, className: "text-left" },
        { 'searchable': true, className: "text-left" },
        { 'searchable': true, className: "text-left" },
        { 'searchable': true, className: "text-left" },
        { 'searchable': true, className: "text-left" },
        { 'searchable': false }
    ];

    function displayEditForm(brance_rays_name, brance_rays_phone, brance_rays_country, brance_rays_governments, brance_rays_city, brance_rays_street, brance_rays_building, brance_rays_address, brance_rays_follow, id, nameTest, phoneTest, countryTest, governmentsTest, cityTest, streetTest, buildingTest, addressTest, followTest){
        removeClass(id);
        openForm(id);
        brance_rays_name.val(nameTest);
        brance_rays_phone.val(phoneTest);
        brance_rays_country.val(countryTest);
        brance_rays_governments.val(governmentsTest);
        brance_rays_city.val(cityTest);
        brance_rays_street.val(streetTest);
        brance_rays_building.val(buildingTest);
        brance_rays_address.val(addressTest);
        brance_rays_follow.each(function(idx, el){
            if($(this).html() === followTest)
                $(this).prop('selected', true);
        });
    }
</script>
<?php include 'end_html.php'?>
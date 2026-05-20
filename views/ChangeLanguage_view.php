
        <table id="example" class="table table-striped" >
        <thead>
            <tr>
                <th><?php echo$view->getTableId()?></th>
                <th><?php echo$view->getNameLangaue()?></th>
                <th><?php echo$view->getTabelEvent()?></th>
            </tr>
        </thead>
        <tbody>
           
                <?php 
                
                    $count = 1;
                    foreach ($view->getMyDataView() as $index => $myObject) {
                        $image = $index === $view->getLanguage() || $index === $view->getStyleFile()? 'fa fa-toggle-on' : 'fa fa-toggle-off';
                        echo <<<HTML
                            <tr>
                                <td>$count</td>
                                <td>{$myObject->getName()}</td>
                                <td>
                        HTML;
                        $action = 'ChangeLanguagePost.php';
                        include('all_modal/modal_changelanguage_changestyle.php');
                        if($index !== $view->getLanguage() && $index !== 'english' && $view->getUrlName2() === 'ChangeLanguage'){
                            $action = 'ChangeLanguageDeletePost.php';
                            include('all_modal/modal_delete.php');
                        }
                        $title = $view->getScreenModelEdit();
                        $button = $view->getButtonModelEdit();
                        $idModel = "editModel".$index;
                        $idForm = "editForm".$index;
                        $action = 'ChangeLanguageEditPost';
                        include('all_modal/modal_change_language.php');
                        include('all_modal/end_model.php');
                        echo <<<HTML
                                <i class="fa fa-sliders fa-2x pointer" 
                                onclick="displayEditForm('#{$idModel}', '{$myObject->getName()}')"></i>
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
                <th><?php echo$view->getNameLangaue()?></th>
                <th><?php echo$view->getTabelEvent()?></th>
            </tr>
        </tfoot>
    </table>
    </div>
<script type="text/javascript">
    let setting = [
        { 'searchable': true, className: "text-left" },
        { 'searchable': true, className: "text-left" },
        { 'searchable': false }
    ];
    function displayEditForm(id, value){
        removeClass(id);
        openForm(id);
        $(id).find('#lang_name').val(value);
    }
</script>
<?php 

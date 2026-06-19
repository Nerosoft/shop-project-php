<?php
    if($view->getUrlName2() === 'Product' || isset($view->getModel2()['MyFlexTables'][$view->getUrlName2()]))
        echo<<<HTML
        <script>
            function openImage(avatar){
                avatar.click();
            }
            $(document).ready(function(){    
                $('.avatar').on('invalid', function(){
                if (this.validity.valueMissing)
                    this.setCustomValidity("{$view->getReqimage()}");
            })});
            function changeImage(file, preview){
                avatar = file.files[0];
                if(avatar && !['image/jpeg', 'image/png'].includes(avatar.type)||avatar && avatar.size > (2 * 1024 * 1024)){
                    file.setCustomValidity('{$view->getInvimage()}');
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
                    file.setCustomValidity('{$view->getInvimage()}');
                    preview.attr('src', './asset/img/error_image.png');
                }
            }
        </script>
        HTML;
    
    
        $idModel = 'lang_modal';
        $style_lang = $view->getLanguage();
        $error = $view->getChangeLang();
        $title = $view->getModelTitle();
        $button = $view->getModelButton();
        $state = 'AllNamesLanguage';
        $data = $view->getMyLanguage();
        include 'all_modal/style_lang_form.php';
        $idModel = 'style_modal';
        $style_lang = $view->getStyleFile();
        $error = $view->getChangeStyle();
        $title = $view->getModalTitleStyle();
        $button = $view->getModalButtonStyle();
        $state = 'Style';
        $data = $view->getStyle();  
        include 'all_modal/style_lang_form.php';
        if(isset($_SESSION['userId']) && $view->getUrlName2() !== 'Site'){
            echo<<<HTML
                </tbody>
                    <tfoot>
                        <tr>
                            <th>{$view->getTableId()}</th>
            HTML;
            $view->printTableNames();
            echo<<<HTML
                            <th>{$view->getTabelEvent()}</th>
                        </tr>
                    </tfoot>
                </table>
                </div>
                    <script type="text/javascript">
                        let setting = [{ 'searchable': true, className: "text-left" }]
                        for (let index = 0; index < {$view->getKeysTable()} ; index++) 
                            setting.push({ 'searchable': true, className: "text-left" });
                        setting.push({ 'searchable': false });
                        $(document).ready(function() {
                            new DataTable('#example',{
                                "oLanguage": {
                                    "sSearch": "{$view->getSsearch()}",
                                    "sEmptyTable":  "{$view->getZeroRecords()}"
                                },
                                "language": {
                                    "lengthMenu": "_MENU_ " + "{$view->getLengthMenu()}",
                                    "info":  "{$view->getInfo()}" + " _MAX_",
                                    "zeroRecords":  "{$view->getZeroRecords()}",
                                    "infoEmpty": "{$view->getInfoEmpty()}",
                                    "infoFiltered": "{$view->getInfoFiltered()}" + " _END_ --- _TOTAL_"
                                },
                                pageLength : 10,
                                lengthMenu: [[10, 20, -1], [10, 20, 'All']],
                                filter: true,
                                deferRender: true,
                                scrollY: '67vh',
                                scrollCollapse: true,
                                scroller: true,
                                columns: setting
                            });
                        });  
                    </script>
            HTML;
            $view->setActionStyleLang('BranchChangePost.php');
            $data = $view->getMyBranch();
        }else
            $data = $view->getMyBranchProject();

    

        $idModel = 'branch_modal';
        $style_lang = $view->getId();
        $error = $view->getActiveBranch();
        $title = $view->getChangeTitleBranch();
        $button = $view->getChangeButtonBranch();
        $state = 'branch';
        // $data = (isset($_SESSION['userId'])?$view->getMyBranch():$view->getMyBranchProject());
        include 'all_modal/style_lang_form.php';
?>
        <script type="text/javascript">
             $('#lang_modal,#style_modal,#branch_modal').find('#close_button').on('click', function (){
                if($('#'+$(this).parent().parent().parent().parent().attr('id')).find('.flexCheck').val() !== $('#'+$(this).parent().parent().parent().parent().attr('id')).find('input[name="id"]:checked').val())
                    $('#'+$(this).parent().parent().parent().parent().attr('id')).find('.flexCheck').prop('checked', true);
            });
            function changeLangStyle(el, style_lang, idModal, error){
                validForm2(idModal);
                if(el.value !== style_lang)
                    $(idModal).find('.flexCheck')[0].setCustomValidity('');
                else
                    el.setCustomValidity(error);
            }
            $('#lang_modal,#style_modal,#branch_modal,#branch_modal2').find('#click_button').on('click', function(){
                let idmodal = $(this).parent().parent().parent().parent().parent().attr('id');
                if(idmodal === 'lang_modal' && $('#lang_modal').find('input[name="id"]:checked').val() === '<?php echo$view->getLanguage()?>'||
                    idmodal === 'branch_modal' && $('#branch_modal').find('input[name="id"]:checked').val() === '<?php echo$view->getId()?>'||
                    idmodal === 'branch_modal2' && $('#branch_modal2').find('input[name="id"]:checked').val() === '<?php echo$view->getId()?>'||
                    idmodal === 'style_modal' && $('#style_modal').find('input[name="id"]:checked').val() === '<?php echo$view->getStyleFile()?>')
                    $('#'+idmodal).find('input[name="id"]:checked')[0].setCustomValidity((idmodal==='branch_modal'||idmodal==='branch_modal2'?'<?php echo$view->getActiveBranch()?>':(idmodal==='lang_modal'?'<?php echo$view->getChangeLang()?>':'<?php echo$view->getChangeStyle()?>')));
            });
        </script>


<div style="position: fixed; top: 0; right: 10px; z-index: 9999; max-height: 90vh; overflow-y: auto;">
    <div id="toastId" class="toast text-bg-<?php echo $view->getType()?> mt-2">
        <script>
            $(document).ready(function(){
                (new bootstrap.Toast($('#toastId').on("hidden.bs.toast", function () {
                $(this).remove();
                }), { delay: 9000 })).show();
            });
        </script>
        <div class="d-flex">
            <div class="toast-body"><?php echo $view->getMessage()?></div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
        </div>
    </div>
</div>

</body>
</html>
<?php
 
        if(isset($_SESSION['userId']) && $this->getUrlName2() !== 'Site'){
            $size = count($this->getKeysTable());
            echo<<<HTML
                </tbody>
                    <tfoot>
                        <tr>
                            <th>{$this->getTableId()}</th>
            HTML;
            $this->printTableNames();
            echo<<<HTML
                            <th>{$this->getTabelEvent()}</th>
                        </tr>
                    </tfoot>
                </table>
                </div>
                    <script type="text/javascript">
                        let setting = [{ 'searchable': true, className: "text-left" }]
                        for (let index = 0; index < {$size} ; index++) 
                            setting.push({ 'searchable': true, className: "text-left" });
                        setting.push({ 'searchable': false });
                        new DataTable('#example',{
                            "oLanguage": {
                                "sSearch": "{$this->getSsearch()}",
                                "sEmptyTable":  "{$this->getZeroRecords()}"
                            },
                            "language": {
                                "lengthMenu": "_MENU_ " + "{$this->getLengthMenu()}",
                                "info":  "{$this->getInfo()}" + " _MAX_",
                                "zeroRecords":  "{$this->getZeroRecords()}",
                                "infoEmpty": "{$this->getInfoEmpty()}",
                                "infoFiltered": "{$this->getInfoFiltered()}" + " _END_ --- _TOTAL_"
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
                    </script>
            HTML;
        }
        $action = (isset($_SESSION['userId'])?'ChangeLanguagePost':'ChangeLangPost').'?id='.$this->getUrlName2();
        $idModel = 'lang_modal';
        $style_lang = $this->getLanguage();
        $error = $this->getChangeLang();
        $title = $this->getModelTitle();
        $button = $this->getModelButton();
        $state = 'AllNamesLanguage';
        $data = $this->getMyLanguage();
        include 'all_modal/style_lang_form.php';

        $idModel = 'style_modal';
        $style_lang = $this->getStyleFile();
        $error = $this->getChangeStyle();
        $title = $this->getModalTitleStyle();
        $button = $this->getModalButtonStyle();
        $state = 'Style';
        $data = $this->getStyle();  
        include 'all_modal/style_lang_form.php';

        $idModel = 'branch_modal';
        $style_lang = $this->getId();
        $error = $this->getActiveBranch();
        $title = $this->getChangeTitleBranch();
        $button = $this->getChangeButtonBranch();
        $state = 'branch';
        $data = $this->getMyBranch();
        if(isset($_SESSION['userId']))
            $action = ('BranchChangePost?id='.$this->getUrlName2());
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
                restLangStyleBranch(idmodal);
                if(idmodal === 'lang_modal' && $('#lang_modal').find('input[name="id"]:checked').val() === '<?php echo$this->getLanguage()?>'||
                    idmodal === 'branch_modal' && $('#branch_modal').find('input[name="id"]:checked').val() === '<?php echo$this->getId()?>'||
                    idmodal === 'branch_modal2' && $('#branch_modal2').find('input[name="id"]:checked').val() === '<?php echo$this->getId()?>'||
                    idmodal === 'style_modal' && $('#style_modal').find('input[name="id"]:checked').val() === '<?php echo$this->getStyleFile()?>')
                    $('#'+idmodal).find('input[name="id"]:checked')[0].setCustomValidity(idmodal==='branch_modal2'?'<?php echo(isset($_SESSION['userId'])||$this->getUrlName2() === 'Site'?'':$this->getActiveBranchProject())?>':(idmodal==='branch_modal'?'<?php echo$this->getActiveBranch()?>':(idmodal==='lang_modal'?'<?php echo$this->getChangeLang()?>':'<?php echo$this->getChangeStyle()?>')));
            });
        </script>


<div style="position: fixed; top: 0; right: 10px; z-index: 9999; max-height: 90vh; overflow-y: auto;">
    <?php
            echo<<<HTML
                <div id="toastId" class="toast text-bg-{$this->getType()} mt-2">
                    <script>
                        (new bootstrap.Toast($('#toastId').on("hidden.bs.toast", function () {
                        $(this).remove();
                        }), { delay: 9000 })).show();
                    </script>
                    <div class="d-flex">
                        <div class="toast-body">{$this->getMessage()}</div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                    </div>
                </div>
            HTML;
    ?>
</div>

</body>
</html>
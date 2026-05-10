<?php
    if($view->getUrlName2() === 'Product' || isset($view->getModel2()['MyFlexTables'][$view->getUrlName2()]))
        echo<<<HTML
        <script>
            function openImage(avatar){
                avatar.click();
            }
            $('#avatar').on('invalid', function(){
                if (this.validity.valueMissing)
                    this.setCustomValidity("{$view->getReqimage()}");
            });
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
    if(isset($_SESSION['userId']))
        echo<<<HTML
        <script type="text/javascript">
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
?>

</body>
</html>
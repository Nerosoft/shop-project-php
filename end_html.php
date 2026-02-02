<script type="text/javascript">
    $(document).ready(function() {
        new DataTable('#example',{
            "oLanguage": {
                "sSearch": "<?php echo$view->getSsearch()?>",
                "sEmptyTable":  "<?php echo$view->getZeroRecords()?>"
            },
            "language": {
                "lengthMenu": "_MENU_ " + "<?php echo$view->getLengthMenu()?>",
                "info":  "<?php echo$view->getInfo()?>" + " _MAX_",
                "zeroRecords":  "<?php echo$view->getZeroRecords()?>",
                "infoEmpty": "<?php echo$view->getInfoEmpty()?>",
                "infoFiltered": "<?php echo$view->getInfoFiltered()?>" + " _END_ --- _TOTAL_"
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
</body>
</html>
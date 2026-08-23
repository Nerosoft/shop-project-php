<?php
        echo<<<HTML
        <script type="text/javascript">
            $(document).ready(function(){
                let setting = [{ 'searchable': true, className: "text-left" }]
                for (let index = 0; index < {$size} ; index++) 
                    setting.push({ 'searchable': true, className: "text-left" });
                setting.push({ 'searchable': false });
                new DataTable('#{$id}',{
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
            });
        </script>
        HTML;
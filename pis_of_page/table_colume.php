<?php
$id = ($keyabc??"example").'table';
echo<<<HTML
    <script type="text/javascript">
        $(document).ready(function(){
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
                scroller: true
            });
        });
    </script>
HTML;
echo '<table id="'.($keyabc??"example").'table"class="table table-striped"><thead><tr>'.'<th>'.$this->getModel2()[$keyabc??$this->getUrlName2()]['TableId'].'</th>';
foreach (ModelJson::getFileName() === 'MyFlexTables'||isset($keyabc)?array('TableProductImage', ...array_keys($this->getModel2()[$keyabc??$this->getUrlName2()]['TableHead'])):$this->getKeysTable() as $index => $key)
    echo'<th>'.($this->getModel2()[$keyabc??$this->getUrlName2()][$key]??$this->getModel2()[$keyabc??$this->getUrlName2()]['TableHead'][$key]).'</th>';
echo '<th>'.$this->getModel2()[$keyabc??$this->getUrlName2()]['TabelEvent'].'</th>'.'</tr></thead><tbody>';
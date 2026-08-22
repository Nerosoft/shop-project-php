<?php
echo<<<HTML
<table id="example" class="table table-striped">
<thead>
    <tr>
        <th>{$this->getTableId()}</th>
HTML;
foreach ($this->getKeysTable() as $index => $key)
    echo'<th>'.($this->getModelPage()[$key]??$this->getTableHead()[$key]).'</th>';
echo '<th>'.$this->getTabelEvent().'</th>
        </tr>
    </thead>
    <tbody>';
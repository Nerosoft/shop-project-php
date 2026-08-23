<?php
echo '<table id="'.($keyabc??"example").'table"class="table table-striped"><thead><tr>'.'<th>'.$this->getModel2()[$keyabc??$this->getUrlName2()]['TableId'].'</th>';
foreach (ModelJson::getFileName() === 'MyFlexTables'||isset($keyabc)?array('TableProductImage', ...array_keys($this->getModel2()[$keyabc??$this->getUrlName2()]['TableHead'])):$this->getKeysTable() as $index => $key)
    echo'<th>'.($this->getModel2()[$keyabc??$this->getUrlName2()][$key]??$this->getModel2()[$keyabc??$this->getUrlName2()]['TableHead'][$key]).'</th>';
echo '<th>'.$this->getModel2()[$keyabc??$this->getUrlName2()]['TabelEvent'].'</th>'.'</tr></thead><tbody>';
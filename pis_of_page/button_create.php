<button onclick="openForm('#createModel')" class="btn btn-primary">
<?php
echo $this->getModelPage()['ButtonModelCreate'].'</button>';
$this->makeCreateModal($this->getModelPage()['ScreenModelCreate'], $this->getModelPage()['ButtonModelAdd']);
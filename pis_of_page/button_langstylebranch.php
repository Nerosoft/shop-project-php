<i onclick="openForm('#lang_modal')" class="navbar-brand fa fa-language fa-2x pointer"></i>
<i onclick="openForm('#style_modal')" class="navbar-brand fa fa-magic fa-2x pointer"></i>
<i onclick="openForm('#branch_modal')" class="navbar-brand fa fa-tree fa-2x pointer"></i>
<?php
if(isset($view) && $view->getUrlName2() !== 'Site' || isset($this) && $this->getUrlName2() !== 'Site')
    echo '<a href="./site" class="navbar-brand fa fa-truck fa-2x pointer"></a>';
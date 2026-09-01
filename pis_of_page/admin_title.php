<nav class="navbar fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><?php echo $this->getAdminDashboard();?></a>
    <?php include 'pis_of_page/button_langstylebranch.php';?>
  <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
  </button>
    <div class="offcanvas offcanvas-<?php echo $this->getDirection() === 'rtl'?'end':'start'?> text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">
            <img src="./asset/img/female-avatar.png" class="img-menu" alt="office">    
            <?php echo $this->getOffcanvas()?></h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

<?php 
foreach ($this->getMyMenuApp() as $key => $item) {
    if(is_array($item)){
        $classActive = isset($_GET['lang']) && $_GET['lang'] === $key || isset($_GET['id']) && isset($this->getModel2()['MyFlexTables'][$_GET['id']]) ? 'my_active':'';
        $name = array_shift($item);
        echo <<<HTML
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle icon_font {$this->getIconByKey($key)} {$classActive}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="span-link">{$name}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark">
        HTML;
        foreach ($item as $keyItem=>$myItem){
            $loc = $this->getUrlName2() === 'SystemLang' || $this->getUrlName2() === 'ChangeLanguage'? 'SystemLang?lang='.$key.'&table='.$keyItem : 'MyFlexTables?id='.$keyItem;
            $classActive = isset($_GET['table']) && $_GET['table'] === $keyItem && isset($_GET['lang']) && $_GET['lang'] === $key || isset($_GET['id']) && $keyItem === $_GET['id'] && $key === 'MyFlexTables' ? 'my_active':'';
            echo <<<HTML
                <li>
                <a class="dropdown-item icon_font {$this->getIconByKey($keyItem)} {$classActive}" href="{$loc}">
                    <span class="span-link">{$myItem}</span>
                </a>
                </li>
            HTML;
        }
        echo '</ul></li>';
    }else{
        $classActive = $this->getUrlName2() === $key && !isset($_GET['table']) && !isset($_GET['table']) ? 'my_active':'';
        $loc = (isset($this->getModel2()['MyFlexTables'][$key])||$key==='product'||$key==='about'||$key==='contact'||$key==='project'?'#':'./').$key;
        echo <<<HTML
        <li class="nav-item"><a class="nav-link icon_font {$this->getIconByKey($key)} {$classActive}" aria-current="page" href="{$loc}">
                <span class="span-link">{$item}</span>
            </a>
            </li>
        HTML;
    }    
    
}

?>

        </ul>
      </div>
    </div>
  </div>
</nav>
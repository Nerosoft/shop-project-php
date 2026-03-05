<link href="./asset/lib/dataTables.bootstrap5.css" rel="stylesheet">
<script src="./asset/lib/dataTables.js" type="text/javascript"></script>
<script src="./asset/lib/dataTables.bootstrap5.js" type="text/javascript"></script>
</head>
<body>
<nav class="navbar navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><?php echo $this->getAdminDashboard()?></a>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="logout.php"><?php echo$this->getLogout()?></a>
      </li>
    </ul>
   
  <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
  </button>
    <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel"><?php echo $this->getOffcanvas()?></h5>
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
            <a class="nav-link dropdown-toggle {$classActive}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img class="style_icon_menu" src="./asset/lib/icons/{$this->getIconByKey($key)}"/>
                {$name}
            </a>
            <ul class="dropdown-menu dropdown-menu-dark">
        HTML;
        foreach ($item as $keyItem=>$myItem){
            $loc = $this->getUrlName2() === 'SystemLang' ? 'view?id='.$this->getUrlName2().'&lang='.$key.'&table='.$keyItem : 'view?id='.$keyItem;
            $classActive = isset($_GET['table']) && $_GET['table'] === $keyItem && isset($_GET['lang']) && $_GET['lang'] === $key || isset($_GET['id']) && $keyItem === $_GET['id'] && $key === 'MyFlexTables' ? 'my_active':'';
            echo <<<HTML
                <li>
                <a class="dropdown-item {$classActive}" href="{$loc}">
                    <img class="style_icon_menu" src="./asset/lib/icons/{$this->getIconByKey($keyItem)}"/>
                    {$myItem}
                </a>
                </li>
            HTML;
        }
        echo '</ul></li>';
    }else{
        $classActive = $this->getUrlName2() === $key && !isset($_GET['table']) && !isset($_GET['table']) ? 'my_active':'';
        echo <<<HTML
        <li class="nav-item"><a class="nav-link {$classActive}" aria-current="page" href="view?id={$key}">
                <img class="style_icon_menu" src="./asset/lib/icons/{$this->getIconByKey($key)}"/>
                {$item}
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
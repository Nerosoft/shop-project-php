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
    <div class="dropdown">
      <a class="btn btn-danger button-select-branch dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?php echo $this->getSelectStyle()?>
      </a>
      <ul class="dropdown-menu">        
      <?php
        foreach ($this->getStyle() as $index_style => $style) {
          echo <<<HTML
          <form class="form_branch" method="POST" action="ChangeStylePost">
          <input type="hidden" value="{$index_style}" name="id">
          <li class="dropdown-item">
          <button type="submit" class="
          HTML;
          echo $index_style === $this->getStyleFile()?'btn btn-danger' : 'btn btn-primary';
          echo <<<HTML
              ">{$style->getName()}</button>
              </li>
            </form>
          HTML;
        }
      ?>
      </ul>
  </div>
    <div class="dropdown">
      <a class="btn btn-danger button-select-branch dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?php echo $this->getBranchesCompany()?>
      </a>
      <ul class="dropdown-menu">        
      <?php
        foreach ($this->getMyBranch() as $index_branch => $branch_button) {
          echo <<<HTML
          <form class="form_branch" method="POST" action="BranchChangePost.php">
          <input type="hidden" value="{$index_branch}" name="id">
          <li class="dropdown-item">
          <button type="submit" class="
          HTML;
          echo $index_branch === $this->getId()?'btn btn-danger' : 'btn btn-primary';
          echo <<<HTML
              ">{$branch_button->getName()}</button>
              </li>
            </form>
          HTML;
        }
      ?>
      </ul>
  </div>
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
        $classActive = isset($_GET['lang']) && $_GET['lang'] === $key || $key === $this->getUrlName2() || isset($_GET['id']) && isset($this->getModel2()['MyFlexTables'][$_GET['id']]) ? 'my_active':'';
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
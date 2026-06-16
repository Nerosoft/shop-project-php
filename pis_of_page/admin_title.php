<nav class="navbar navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><?php echo $this->getAdminDashboard()?></a>
    <i onclick="openForm('<?php echo'#lang_modal'?>')" class="navbar-brand fa fa-language fa-2x pointer"></i>
    <i onclick="openForm('<?php echo'#style_modal'?>')" class="navbar-brand fa fa-magic fa-2x pointer"></i>
    <div class="dropdown">
            <i class="navbar-brand fa fa-tree fa-2x pointer  dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
        
        <ul class="dropdown-menu dropdown-menu-dark">        
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
        $classActive = isset($_GET['lang']) && $_GET['lang'] === $key || isset($_GET['id']) && isset($this->getModel2()['MyFlexTables'][$_GET['id']]) || isset($_POST['option']) && isset($this->getModel2()['MyFlexTables'][$_POST['option']]) ? 'my_active':'';
        $name = array_shift($item);
        echo <<<HTML
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle icon_font {$this->getIconByKey($key)} {$classActive}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {$name}
            </a>
            <ul class="dropdown-menu dropdown-menu-dark">
        HTML;
        foreach ($item as $keyItem=>$myItem){
            $loc = $this->getUrlName2() === 'SystemLang' ? 'view?id='.$this->getUrlName2().'&lang='.$key.'&table='.$keyItem : 'view?id='.$keyItem;
            $classActive = isset($_GET['table']) && $_GET['table'] === $keyItem && isset($_GET['lang']) && $_GET['lang'] === $key || isset($_GET['id']) && $keyItem === $_GET['id'] && $key === 'MyFlexTables' || isset($_POST['option']) && $keyItem === $_POST['option'] && $key === 'MyFlexTables' ? 'my_active':'';
            echo <<<HTML
                <li>
                <a class="dropdown-item icon_font {$this->getIconByKey($keyItem)} {$classActive}" href="{$loc}">
                    {$myItem}
                </a>
                </li>
            HTML;
        }
        echo '</ul></li>';
    }else{
        $classActive = $this->getUrlName2() === $key && !isset($_GET['table']) && !isset($_GET['table']) ? 'my_active':'';
        echo <<<HTML
        <li class="nav-item"><a class="nav-link icon_font {$this->getIconByKey($key)} {$classActive}" aria-current="page" href="view?id={$key}">
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
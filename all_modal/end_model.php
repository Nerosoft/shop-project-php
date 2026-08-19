<?php
if(isset($_SESSION['userId']) && count($this->getBranch2()) >= 1 && $this->getUrlName2() === 'SystemLang' && !isset($state)){
    include 'AllBranchLanguageInput.php';
    foreach($this->getModel2()['AllNamesLanguage'] as $key=>$option)
        if(isset($_GET['lang']) && $_GET['lang'] !== $key)
            echo <<<HTML
                <div class="col-md-auto">
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" id="choices[]" onchange="optionBranch('all_branch2')" class="all_branch form-check-input" name="choices[$key]" value="{$key}">
                            <label class="form-check-label" for="choices[]">
                            {$option}
                            </label>
                        </div>
                    </div>
                </div>
            HTML;
}
else if(isset($_SESSION['userId']) && count($this->getBranch2()) >= 1 && isset($this->getModel2()['MyFlexTables'][$this->getUrlName2()]) && !isset($state) || isset($_SESSION['userId']) && isset($index) && $index !== null && count($this->getBranch2()) >= 1 && $this->getUrlName2() !== 'Branches' && !isset($state)){
    if(isset($index) && $index !== null)
      include('my_id.php');
    $myCountBranch = 0;
    foreach($this->getBranch2() as $key=>$option){
        if(
            $this->getUrlName2() === 'MyStyle' ||
            $this->getUrlName2() === 'Home' && isset($this->getFile()[$key][$this->getFile()[$key]['AllNamesLanguage']][$index])||
            $this->getUrlName2() === 'ChangeLanguage' && isset($this->getFile()[$key][$index])||
            $this->getUrlName2() === 'Users' && isset($this->getFile()[$key]['Users'][$index])||
            $this->getUrlName2() === 'Product' && isset($this->getFile()[$key]['Product'][$index])||
            $index !== null && isset($this->getFile()[$key][$this->getFile()[$key]['AllNamesLanguage']]['MyFlexTables'][$this->getUrlName2()]) && isset($this->getFile()[$key][$this->getUrlName2()][$index])||
            $index === null && isset($this->getFile()[$key][$this->getFile()[$key]['AllNamesLanguage']]['MyFlexTables'][$this->getUrlName2()])){
            ++$myCountBranch;
            echo <<<HTML
                <div class="col-md-auto">
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" id="choices[]" onchange="optionBranch('all_branch2')" class="all_branch form-check-input branch-check" name="choices[$key]" value="{$key}">
                            <label class="form-check-label" for="choices[]">
                            {$option['Name']}
                            </label>
                        </div>
                    </div>
                </div>
            HTML;
        }
    }
    if($myCountBranch === count($this->getBranch2()))
        include 'AllBranchLanguageInput.php';
}
else if(isset($index) && $index !== null && !isset($state))
    include('my_id.php');
else if(isset($_SESSION['userId']) && isset($idModel) && $idModel === 'lang_modal')
    echo '<div id="allbranchbox"></div>';
else if(isset($_SESSION['userId']) && isset($idModel) && $idModel === 'style_modal'){
    echo '<div id="allbranchbox" class="hidden_style">';
    include 'AllBranchOptionChose.php';
    echo '</div>';
}
else if(isset($_SESSION['userId']) && !preg_match('/BranchChangePost/', $action) && count($this->getBranch2()) >= 1 && $this->getUrlName2() !== 'Branches')
    include 'AllBranchOptionChose.php';
?>
</div>
<div class="modal-footer">
  <?php
  include 'pis_of_page/button_valid.php';
  ?>
</div>
</form>
</div>
</div>
</div>
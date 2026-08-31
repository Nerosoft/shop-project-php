 <div class="form-group">
        <i class="fa fa-language fa-2x"></i>
        <label for="selectedLanguage"><?php echo$this->getSelectLang()?></label>
        <select
        title=""
        class="form-select" name="selectedLanguage"  aria-label="Default select example">
<?php
    foreach(array_reverse($valueDataView??$this->getMyLanguage()) as $key=>$name){
            $select = $key === $this->getLanguage()? 'selected' : '';
            echo <<<HTML
            <option {$select} value="{$key}">
                {$name->getName()}
            </option>
            HTML;
        }
?>

<i class="pointer <?php echo $image?> fa-2x" onclick="openForm2('#selectLanguage<?php echo$index?>')"></i>
<?php
$title = $this->getTitleChangeLanguageMessage();
$button = $this->getButtonChangeLanguageMessage();
$idModel = "selectLanguage".$index;
include('start_model.php');
if($this->getUrlName2() !== 'Branches')
    echo '<input type="hidden"value="'.$myStateStyleLang.'" name="state">';
echo $this->getLabelChangeLanguageMessage().'<spam>-'.$myObject->getName().'</spam>';
include('end_model.php');
<?php
require 'DeleteInfoName.php';
require 'BranchClass.php';
require 'InformationPage.php';
class AdminMenu extends InformationPage
{
    private $BranchesCompany;
    private $SelectStyle;
    private $Offcanvas;
    private $Logout;
    private $AdminDashboard;
    private $myMenuApp;
    private $Ssearch;
    private $ZeroRecords;
    private $LengthMenu;
    private $Info;
    private $InfoEmpty;
    private $InfoFiltered;
    private $ScreenModelEdit;
    private $ButtonModelEdit;
    private $TableId;
    private $TabelEvent;
    private $mySelectBranch;
    function __construct($IdPage, $message, $type){
        parent::__construct($IdPage);
        $this->Ssearch = $this->getModel2()['TableInfo']['Ssearch'];
        $this->InfoEmpty = $this->getModel2()['TableInfo']['InfoEmpty'];
        $this->ZeroRecords = $this->getModel2()['TableInfo']['ZeroRecords'];
        $this->Info = $this->getModel2()['TableInfo']['Info'];
        $this->LengthMenu = $this->getModel2()['TableInfo']['LengthMenu'];
        $this->InfoFiltered = $this->getModel2()['TableInfo']['InfoFiltered'];
        $this->BranchesCompany = $this->getModel2()['AppSettingAdmin']['BranchesCompany'];
        $this->SelectStyle = $this->getModel2()['AppSettingAdmin']['SelectStyle'];
        $this->Offcanvas = $this->getModel2()['AppSettingAdmin']['Offcanvas'];
        $this->Logout = $this->getModel2()['AppSettingAdmin']['Logout'];
        $this->TableId = $this->getModelPage()['TableId'];
        $this->TabelEvent = $this->getModelPage()['TabelEvent'];
        $this->ScreenModelEdit = $this->getModelPage()['ScreenModelEdit'];
        $this->ButtonModelEdit = $this->getModelPage()['ButtonModelEdit'];
        $this->AdminDashboard = $this->getModel2()['AppSettingAdmin']['AdminDashboard'];
        $this->mySelectBranch = array($this->getFixedId()=>new Branch($this->getModel2()['AppSettingAdmin']['BranchMain']), ...Branch::fromArray($this->getBranch()));

        if($this->getUrlName2() === 'SystemLang'){
            $this->myMenuApp = array('Home'=>$this->getModel2()['Menu']['Home'], 'SystemLang'=>$this->getModel2()['Menu']['SystemLang']);
            foreach ($this->getModel2()['AllNamesLanguage'] as $key => $value){
                $this->myMenuApp[$key] = array($value);
                foreach (array_keys($this->getModel2()) as $key2 => $table) 
                    $this->myMenuApp[$key][$table] = $this?->getModel2()[$table]['MYTITLE']??$this->getModel2()['AppSettingAdmin'][$table];
            }
        }else if(isset($this->getModel2()['MyFlexTables'])){
            $this->myMenuApp = $this->getModel2()['Menu'];
            $arr = $this->getModel2()['MyFlexTables'];
            array_unshift($arr, $this->myMenuApp['MyFlexTables']);
            $this->myMenuApp['MyFlexTables'] = $arr;
        }else{
            $this->myMenuApp = $this->getModel2()['Menu'];
            unset($this->myMenuApp['MyFlexTables']);
        }        
        include 'admin_title.php';
        $this->showToast($this->getModelPage()[$message]??$message, $type);
    }
    function getIconByKey($key){
        if($key === 'Home')
            return 'box-arrow-left.svg';
        else if($key === 'SystemLang')
                return 'gear.svg';  
        else if($key === 'ChangeLanguage')
            return 'globe-asia-australia.svg';
        else if($key === 'Branches')
            return 'hospital.svg';
        else if($key === 'Login')
            return 'database-exclamation.svg';
        else if($key === 'Register')
            return 'arrows.svg';
        else if($key === 'Menu')
            return 'menu-button-fill.svg';
        else if($key === 'TableInfo')
            return 'person-add.svg';
        else if($key === 'AppSettingAdmin')
            return 'box.svg';
        else if($key === 'SelectTestBox')
            return 'hospital.svg';
        else if($key === 'SelectBranchBox')
            return 'gear.svg';
        else if($key === 'AllNamesLanguage')
            return 'bag-check-fill.svg';
        else if($key === 'CustomTable')
            return 'arrow-up-circle-fill.svg';
        else if($key === 'TablePage')
            return 'calendar4-event.svg';
        else if($key === 'Html')
            return 'bar-chart-line-fill.svg';
        else
            return 'camera2.svg';
    }
    function getScreenModelEdit(){
        return $this->ScreenModelEdit;
    }
    function getButtonModelEdit(){
        return $this->ButtonModelEdit;
    }
    function getTableId(){
        return $this->TableId;
    }
    function getTabelEvent(){
        return $this->TabelEvent;
    }
    function getSsearch(){
        return $this->Ssearch;
    }
    function getZeroRecords(){
        return $this->ZeroRecords;
    }
    function getLengthMenu(){
        return $this->LengthMenu;
    }
    function getInfo(){
        return $this->Info;
    }
    function getInfoEmpty(){
        return $this->InfoEmpty;
    }
    function getInfoFiltered(){
        return $this->InfoFiltered;
    }
    function getMyBranch(){
        return $this->mySelectBranch;
    }
    function getMyMenuApp(){
        return $this->myMenuApp;
    }
    function getBranchesCompany(){
        return $this->BranchesCompany;
    }
    function getSelectStyle(){
        return $this->SelectStyle;
    }
    function getOffcanvas(){
        return $this->Offcanvas;
    }
    function getLogout(){
        return $this->Logout;
    }
    function getAdminDashboard(){
        return $this->AdminDashboard;
    }
}

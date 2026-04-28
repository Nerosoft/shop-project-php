<?php
require 'DeleteInfoName.php';
require 'InformationPage.php';
class AdminMenu extends InformationPage
{
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
    private $AllBranches;
    function getAllBranches(){
        return $this->AllBranches;
    }
    function __construct($IdPage, $message, $type){
        parent::__construct($IdPage, $message, $type);
        if($IdPage !== 'Branches')
            $this->AllBranches = $this->getModelPage()['AllBranches'];
        $this->Ssearch = $this->getModel2()['TableInfo']['Ssearch'];
        $this->InfoEmpty = $this->getModel2()['TableInfo']['InfoEmpty'];
        $this->ZeroRecords = $this->getModel2()['TableInfo']['ZeroRecords'];
        $this->Info = $this->getModel2()['TableInfo']['Info'];
        $this->LengthMenu = $this->getModel2()['TableInfo']['LengthMenu'];
        $this->InfoFiltered = $this->getModel2()['TableInfo']['InfoFiltered'];
        $this->Offcanvas = $this->getModel2()['AppSettingAdmin']['Offcanvas'];
        $this->Logout = $this->getModel2()['AppSettingAdmin']['Logout'];
        $this->TableId = $this->getModelPage()['TableId'];
        $this->TabelEvent = $this->getModelPage()['TabelEvent'];
        $this->ScreenModelEdit = $this->getModelPage()['ScreenModelEdit'];
        $this->ButtonModelEdit = $this->getModelPage()['ButtonModelEdit'];
        $this->AdminDashboard = $this->getModel2()['AppSettingAdmin']['AdminDashboard'];
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
    }
    function getIconByKey($key){
        if($key === 'Home')
            return 'fa fa-home';
        else if($key === 'SystemLang')
                return 'fa fa-gear';  
        else if($key === 'ChangeLanguage')
            return 'fa fa-language';
        else if($key === 'Branches')
            return 'fa fa-tree';
        else if($key === 'Login')
            return 'fa fa-lock';
        else if($key === 'Register')
            return 'fa fa-user-plus';
        else if($key === 'Menu')
            return 'fa fa-bars';
        else if($key === 'TableInfo')
            return 'fa fa-info';
        else if($key === 'AppSettingAdmin')
            return 'fa fa-archive';
        else if($key === 'SelectBranchBox')
            return 'fa fa-tree';
        else if($key === 'AllNamesLanguage')
            return 'fa fa-globe';
        else if($key === 'TablePage')
            return 'fa fa-table';
        else if($key === 'Users')
            return 'fa fa-user';
        else if($key === 'Product')
            return 'fa fa-tag';
        else if($key === 'Site')
            return 'fa fa-truck';
        else if($key === 'MyStyle')
            return 'fa fa-magic';
        else if($key === 'MyFlexTables')
            return 'fa fa-table';
        else if($key === 'Style')
            return 'fa fa-magic';
        else if(isset($this->getModel2()['MyFlexTables'][$key]))
            return 'fa fa-table';
        else if(isset($this->getModel2()['AllNamesLanguage'][$key]))
            return 'fa fa-language';
        else
            return 'fa fa-inbox';
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
    function getMyMenuApp(){
        return $this->myMenuApp;
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

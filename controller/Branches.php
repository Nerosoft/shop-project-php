<?php
// require 'all_trait/ErrorBranch.php';
require 'all_trait/ChangeStyleLangBranch.php';
include 'all_trait/InfoBranch.php';
require 'interface/InterfaceDataView.php';
class MyBranch extends ModelJson implements InterfaceDataView{
    use ErrorBranch, ChangeStyleLangBranch, InfoBranch;
    private $FlexTable;
    private $SettingAccounts;
    private $Product;
    private $IdBranch;
    function getFlexTable(){
        return $this->FlexTable;
    }
    function getSettingAccounts(){
        return $this->SettingAccounts;
    }
    function getProduct(){
        return $this->Product;
    }
     function getIdBranch(){
        return $this->IdBranch;
     }
    function __construct(){
        parent::__construct('Branches', function(){
            $this->initInfoBranch();
            $this->initErrorBranch();
            $this->IdBranch = $this->getModelPage()['IdBranch'];
            $this->FlexTable = $this->getModelPage()['FlexTable'];
            $this->SettingAccounts = $this->getModelPage()['SettingAccounts'];
            $this->Product = $this->getModelPage()['Product'];
            return $this->getMyBranch();
        }, Branch::getKeysObject());
    }
    function getBranchStreet(){
        return $this->BranchStreet;
    }
    function getBranchPhone(){
        return $this->BranchPhone;
    }
    function makeCreateModal($view, $title, $button){
        $action = 'BranchCreatePost.php';
        include('all_modal/model_branch.php');

            echo<<<HTML
            <div class="form-group">
                <i class="fa fa-map fa-2x"></i>
                <label for="selectedBranch">{$view->getIdBranch()}</label>
                <select
                onchange="resetBranch(this)"
                title=""
                class="form-select" name="selectedBranch"  aria-label="Default select example">
            HTML;
                foreach($view->getBranch() as $key=>$name){
                        $select = $key === $view->getId()? 'selected' : '';
                        $arr = array();
                        if(isset($view->getFile()[$key][$view->getFile()[$key]['AllNamesLanguage']]['MyFlexTables']))
                            $arr['flextable'] = $view->getFlexTable();
                        if(isset($view->getFile()[$key]['Users']))
                            $arr['Users'] = $view->getSettingAccounts();
                        if(isset($view->getFile()[$key]['Product']))
                            $arr['Product'] = $view->getProduct();
                        $arr = htmlspecialchars(json_encode($arr));
                        echo <<<HTML
                        <option {$select} data-value="{$arr}" value="{$key}">
                            {$name['Name']}
                        </option>
                        HTML;
                    }
            echo<<<HTML
                </select>
            </div>
            HTML;
            echo'<div id="myOption">';
                if(isset($view->getModel2()['MyFlexTables']))
                    echo <<<HTML
                        <div class="col-lg-auto pt-2">
                            <div class="form-check">
                                <input name="flextable"  class="form-check-input" value="flextable" type="checkbox">
                                <label  class="form-check-label">
                                    {$view->getFlexTable()}
                                </label>
                            </div>
                        </div>
                    
                    HTML;
                if(isset($view->getObj()['Users']))
                    echo <<<HTML
                        <div class="col-lg-auto pt-2">
                            <div class="form-check">
                                <input name="Users"  class="form-check-input" value="Users" type="checkbox">
                                <label  class="form-check-label">
                                    {$view->getSettingAccounts()}
                                </label>
                            </div>
                        </div>
                    HTML;
                if(isset($view->getObj()['Product']))
                    echo <<<HTML
                        <div class="col-lg-auto pt-2">
                            <div class="form-check">
                                <input name="Product"  class="form-check-input" value="Product" type="checkbox">
                                <label  class="form-check-label">
                                    {$view->getProduct()}
                                </label>
                            </div>
                        </div>
                    HTML;
            echo'</div></div></div>';
            include('all_modal/end_model.php');
    }
}
$view = new MyBranch();
foreach ($view->getMyDataView() as $index => $myObject) {
    $image = $index === $view->getId() ? 'fa fa-toggle-on' : 'fa fa-toggle-off';
    echo <<<HTML
        <tr>
            <td>$count</td>
            <td>{$myObject->getName()}</td>
            <td>{$myObject->getPhone()}</td>
            <td>{$myObject->getGovernments()}</td>
            <td>{$myObject->getCity()}</td>
            <td>{$myObject->getStreet()}</td>
            <td>{$myObject->getBuilding()}</td>
            <td>{$myObject->getAddress()}</td>
            <td>{$myObject->getCountry()}</td>
            <td>{$myObject->getFollowId()}</td>
            <td>
    HTML;
    $title = $view->getScreenModelEdit();
    $button = $view->getButtonModelEdit();
    $action = 'BranchEditPost.php';
    $idModel = "editModel".$index;
    include('all_modal/model_branch.php');
    echo'</div></div>';
    include('all_modal/end_model.php');
    include 'pis_of_page/button_edit.php';
}
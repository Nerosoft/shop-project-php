<?php
// require 'auth/test_session2.php';
class MyBranch extends ModelJson implements CreateModal{
    function getFlexTable(){
        return $this->getModelPage()['FlexTable'];
    }
    function getSettingAccounts(){
        return $this->getModelPage()['SettingAccounts'];
    }
    function getProduct(){
        return $this->getModelPage()['Product'];
    }
     function getIdBranch(){
        return $this->getModelPage()['IdBranch'];
     }
    function __construct(){
        parent::__construct('Branches', Branch::getKeysObject());
    }
    function getView(){
        foreach ($this->getMyBranch() as $index => $myObject) {
            $image = $index === $this->getId() ? 'fa fa-toggle-on' : 'fa fa-toggle-off';
            echo <<<HTML
                <tr>
                    <td>{$this->getCount()}</td>
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
            $title = $this->getScreenModelEdit();
            $button = $this->getButtonModelEdit();
            $action = 'BranchEditPost.php';
            $idModel = "editModel".$index;
            include('all_modal/model_branch.php');
            echo'</div></div>';
            include('all_modal/end_model.php');
            include 'pis_of_page/button_edit.php';
        }
    }
    function getBranchStreet(){
        return $this->BranchStreet;
    }
    function getBranchPhone(){
        return $this->BranchPhone;
    }
    function makeCreateModal($title, $button){
        $action = 'BranchCreatePost.php';
        include('all_modal/model_branch.php');

            echo<<<HTML
            <div class="form-group">
                <i class="fa fa-map fa-2x"></i>
                <label for="selectedBranch">{$this->getIdBranch()}</label>
                <select
                onchange="resetBranch(this)"
                title=""
                class="form-select" name="selectedBranch"  aria-label="Default select example">
            HTML;
                foreach($this->getBranch() as $key=>$name){
                        $select = $key === $this->getId()? 'selected' : '';
                        $arr = array();
                        if(isset($this->getFile()[$key][$this->getFile()[$key]['AllNamesLanguage']]['MyFlexTables']))
                            $arr['flextable'] = $this->getFlexTable();
                        if(isset($this->getFile()[$key]['Users']))
                            $arr['Users'] = $this->getSettingAccounts();
                        if(isset($this->getFile()[$key]['Product']))
                            $arr['Product'] = $this->getProduct();
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
                if(isset($this->getModel2()['MyFlexTables']))
                    echo <<<HTML
                        <div class="col-lg-auto pt-2">
                            <div class="form-check">
                                <input name="flextable"  class="form-check-input" value="flextable" type="checkbox">
                                <label  class="form-check-label">
                                    {$this->getFlexTable()}
                                </label>
                            </div>
                        </div>
                    
                    HTML;
                if(isset($this->getObj()['Users']))
                    echo <<<HTML
                        <div class="col-lg-auto pt-2">
                            <div class="form-check">
                                <input name="Users"  class="form-check-input" value="Users" type="checkbox">
                                <label  class="form-check-label">
                                    {$this->getSettingAccounts()}
                                </label>
                            </div>
                        </div>
                    HTML;
                if(isset($this->getObj()['Product']))
                    echo <<<HTML
                        <div class="col-lg-auto pt-2">
                            <div class="form-check">
                                <input name="Product"  class="form-check-input" value="Product" type="checkbox">
                                <label  class="form-check-label">
                                    {$this->getProduct()}
                                </label>
                            </div>
                        </div>
                    HTML;
            echo'</div></div></div>';
            include('all_modal/end_model.php');
    }
}
$view = new MyBranch();
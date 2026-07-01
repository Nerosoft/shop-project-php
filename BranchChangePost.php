<?php
include 'auth/SessionPost.php';
class BranchChangePost extends ValidationId{
    function __construct(){
        parent::__construct(preg_match('/SystemLang/', ModelJson::getBackPage())?'SystemLang':(preg_match('/MyFlexTables/', ModelJson::getBackPage())?explode('=', ModelJson::getBackPage())[1]:ModelJson::getBackPage()));
        $_SESSION['userId'] = $this->keyId;
        $this->showMessage($this->getModelPage()['SuccessfullyChangeBranch']);
    }
}
new BranchChangePost();
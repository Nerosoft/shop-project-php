<?php
// require 'auth/test_session4.php';
class FlexTablesCreatePost extends ModelJson{
    function __construct(){
        parent::__construct(null, isset($_POST['id'])?'MessageModelEdit':'MessageModelCreate');
    }
    function getView(){
        $this->initErrorFlexTable2();
        $this->saveModel($this->saveFlexTable($this->getObj(), $this->getErrorsMessageReq(), $this->getId()));
        $this->showMessage($this->getModelPage()[isset($_POST['id'])?'MessageModelEdit':'MessageModelCreate']);
    }
}
$view = new FlexTablesCreatePost();
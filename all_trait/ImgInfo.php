<?php
trait ImgInfo{
    private $Reqimage;
    private $Invimage;
    function initImageInfo(){
        $this->Reqimage = $this->getModelPage()['Reqimage'];
        $this->Invimage = $this->getModelPage()['Invimage'];
    }
    function validMyImage(){
        $this->initImageInfo();
        //delete input
        if(!isset($_FILES['avatar']))
           ModelJson::initView2($this->getUrlName2(), $this->getReqimage());
        else if(!isset($_POST['id']) && !is_uploaded_file($_FILES['avatar']['tmp_name']))
            ModelJson::initView2($this->getUrlName2(), $this->getModelPage()['UploadImgInv']);
        else if(is_uploaded_file($_FILES['avatar']['tmp_name']) && 
        strtolower(pathinfo(basename($_FILES['avatar']['name']), PATHINFO_EXTENSION)) !== 'jpg' &&
        strtolower(pathinfo(basename($_FILES['avatar']['name']), PATHINFO_EXTENSION)) !== 'png'||
        is_uploaded_file($_FILES['avatar']['tmp_name']) && $_FILES['avatar']['size'] > (2 * 1024 * 1024)||
        is_uploaded_file($_FILES['avatar']['tmp_name']) && $_FILES['avatar']['size'] < 2000||
        is_uploaded_file($_FILES['avatar']['tmp_name']) && !getimagesize($_FILES['avatar']['tmp_name']))
           ModelJson::initView2($this->getUrlName2(), $this->getInvimage());
    }
    function saveProductTable($idSseion){
        if(isset($_FILES['avatar']) && is_uploaded_file($_FILES['avatar']['tmp_name']) && is_dir('asset/product/'.$idSseion))
            copy($_FILES['avatar']['tmp_name'], 'asset/product/'.$idSseion.'/'.$this->keyId.'.'.strtolower(pathinfo(basename($_FILES['avatar']['name']), PATHINFO_EXTENSION)));
        else if(isset($_FILES['avatar']) && is_uploaded_file($_FILES['avatar']['tmp_name']) && is_dir('asset/product')){
            mkdir('asset/product/'.$idSseion);
            copy($_FILES['avatar']['tmp_name'], 'asset/product/'.$idSseion.'/'.$this->keyId.'.'.strtolower(pathinfo(basename($_FILES['avatar']['name']), PATHINFO_EXTENSION)));
        }
        else if(isset($_FILES['avatar']) && is_uploaded_file($_FILES['avatar']['tmp_name'])){
            mkdir('asset/product');
            mkdir('asset/product/'.$idSseion);
            copy($_FILES['avatar']['tmp_name'], 'asset/product/'.$idSseion.'/'.$this->keyId.'.'.strtolower(pathinfo(basename($_FILES['avatar']['name']), PATHINFO_EXTENSION)));
        }
    }
    function getReqimage(){
        return $this->Reqimage;
    }
    function getInvimage(){
        return $this->Invimage;
    }

}
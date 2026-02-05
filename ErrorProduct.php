<?php
trait ErrorProduct{
    private $RequiredName;
    private $InvalidName;
    private $RequiredDescreption;
    private $RequiredSalary;
    private $RequiredCategory;
    private $InvalidDescreption;
    private $InvalidSalary;
    private $InvalidCategory;
    private $Reqimage;
    private $Invimage;
    private $UploadImgInv;
    function initErrorProduct($error){
        $this->RequiredName = $error['RequiredName'];
        $this->InvalidName = $error['InvalidName'];
        $this->RequiredDescreption = $error['RequiredDescreption'];
        $this->RequiredSalary = $error['RequiredSalary'];
        $this->RequiredCategory = $error['RequiredCategory'];
        $this->InvalidDescreption = $error['InvalidDescreption'];
        $this->InvalidSalary = $error['InvalidSalary'];
        $this->InvalidCategory = $error['InvalidCategory'];
        $this->Reqimage = $error['Reqimage'];
        $this->Invimage = $error['Invimage'];
        $this->UploadImgInv = $error['UploadImgInv'];
    }
    function initErrorProduct2($modal, $myKeyDb, $keyMessage = 'MessageModelCreate'){
        $this->initErrorProduct($modal->getModelPage());
        if(!isset($_FILES['avatar']))
           Product::initProduct($this->getUploadImgInv(), 'danger');
        else if($modal->getSCRIPTFILENAME()==="ProductCreatePost" && !is_uploaded_file($_FILES['avatar']['tmp_name']))
            Product::initProduct($this->getUploadImgInv(), 'danger');
        else if(is_uploaded_file($_FILES['avatar']['tmp_name']) && 
        strtolower(pathinfo(basename($_FILES['avatar']['name']), PATHINFO_EXTENSION)) !== 'jpg' &&
        strtolower(pathinfo(basename($_FILES['avatar']['name']), PATHINFO_EXTENSION)) !== 'png'||
        is_uploaded_file($_FILES['avatar']['tmp_name']) && $_FILES['avatar']['size'] > (2 * 1024 * 1024)||
        is_uploaded_file($_FILES['avatar']['tmp_name']) && $_FILES['avatar']['size'] < 2000||
        is_uploaded_file($_FILES['avatar']['tmp_name']) && !getimagesize($_FILES['avatar']['tmp_name']))
           Product::initProduct($this->getInvimage(), 'danger');
        else if(!isset($_POST['name']) || $_POST['name'] === '')
           Product::initProduct($this->getRequiredName(), 'danger');
        else if(strlen($_POST['name']) < 3)
           Product::initProduct($this->getInvalidName(), 'danger');
        else if(!isset($_POST['descreption']) || $_POST['descreption'] === '')
           Product::initProduct($this->getRequiredDescreption(), 'danger');
        else if(strlen($_POST['descreption']) < 8)
           Product::initProduct($this->getInvalidDescreption(), 'danger');
        else if(!isset($_POST['salary']) || $_POST['salary'] === '')
           Product::initProduct($this->getRequiredSalary(), 'danger');
        else if(!is_numeric($_POST['salary']) || $_POST['salary'] > 1000000)
           Product::initProduct($this->getInvalidSalary(), 'danger');
        else if(!isset($_POST['category']) || $_POST['category'] === '')
           Product::initProduct($this->getRequiredCategory(), 'danger');
        else if(strlen($_POST['category']) < 3)
           Product::initProduct($this->getInvalidCategory(), 'danger');
        else{
            $myData = $modal->getObj();
            $myData['Product'][$myKeyDb] = array("Name"=>$_POST["name"], "Descreption"=>$_POST["descreption"], "Salary"=>$_POST["salary"], "Category"=>$_POST["category"]);
            if(isset($_FILES['avatar']) && is_uploaded_file($_FILES['avatar']['tmp_name']))
                move_uploaded_file($_FILES['avatar']['tmp_name'], 'asset/product/'.$myKeyDb.'.'.strtolower(pathinfo(basename($_FILES['avatar']['name']), PATHINFO_EXTENSION)));
            $modal->saveModel($myData);
            Product::initProduct($keyMessage);
        }
    }
    function getUploadImgInv(){
        return $this->UploadImgInv;
    }
    function getReqimage(){
        return $this->Reqimage;
    }
    function getInvimage(){
        return $this->Invimage;
    }
    function getRequiredName(){
        return $this->RequiredName;
    }
    function getRequiredDescreption(){
        return $this->RequiredDescreption;
    }
    function getRequiredSalary(){
        return $this->RequiredSalary;
    }
    function getRequiredCategory(){
        return $this->RequiredCategory;
    }
    function getInvalidName(){
        return $this->InvalidName;
    }
    function getInvalidDescreption(){
        return $this->InvalidDescreption;
    }
    function getInvalidSalary(){
        return $this->InvalidSalary;
    }
    function getInvalidCategory(){
        return $this->InvalidCategory;
    }
}
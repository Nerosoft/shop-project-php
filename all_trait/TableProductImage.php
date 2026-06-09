<?php
require 'ImgInfo.php';
trait TableProductImage{
    use ImgInfo;
    private $ImgLabel;
    private $ImgButton;
    private $TableProductImage;
    private $TitleViewImage;
    function initTableProductImage(){
        $this->initImageInfo();
        $this->TitleViewImage = $this->getModelPage()['TitleViewImage'];
        // $this->TableProductImage = $this->getModelPage()['TableProductImage'];
        $this->ImgLabel = $this->getModelPage()['ImgLabel'];
        $this->ImgButton = $this->getModelPage()['ImgButton'];
    }
    function getTitleViewImage(){
        return $this->TitleViewImage;
    }

    function getTableProductImage(){
        return $this->getModelPage()['TableProductImage'];//$this->TableProductImage;
    }
    function getImgLabel(){
        return $this->ImgLabel;
    }
    function getImgButton(){
        return $this->ImgButton;
    }


}
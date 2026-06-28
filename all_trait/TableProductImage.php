<?php
require 'ImgInfo.php';
trait TableProductImage{
    use ImgInfo;
    private $ImgLabel;
    private $ImgButton;
    private $TitleViewImage;
    function initTableProductImage(){
        $this->initImageInfo();
        $this->TitleViewImage = $this->getModelPage()['TitleViewImage'];
        $this->ImgLabel = $this->getModelPage()['ImgLabel'];
        $this->ImgButton = $this->getModelPage()['ImgButton'];
    }
    function getTitleViewImage(){
        return $this->TitleViewImage;
    }
    function getImgLabel(){
        return $this->ImgLabel;
    }
    function getImgButton(){
        return $this->ImgButton;
    }


}
<?php
trait ImgInfo{
    private $ImgLabel;
    private $ImgButton;
    function initImageInfo(){
        $this->ImgLabel = $this->getModelPage()['ImgLabel'];
        $this->ImgButton = $this->getModelPage()['ImgButton'];
    }
    function getImgLabel(){
        return $this->ImgLabel;
    }
    function getImgButton(){
        return $this->ImgButton;
    }
}
<?php
trait InfoHome{
    private $LabelName;
    private $HintName;
    function initInfoHome($info){
        $this->LabelName = $this->getModelPage()['LabelName'];
        $this->HintName = $this->getModelPage()['HintName'];
    }
    function getLabelName(){
        return $this->LabelName;
    }
    function getHintName(){
        return $this->HintName;
    }
}
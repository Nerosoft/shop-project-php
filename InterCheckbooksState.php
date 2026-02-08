<?php
trait CheckbooksState{
    private $CheckbooksState;
    function InitCheckbooksState($info){
        $this->CheckbooksState = $info['CheckbooksState'];
    }
    function getCheckbooksState(){
        return $this->CheckbooksState;
    }
}
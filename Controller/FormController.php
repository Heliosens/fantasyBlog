<?php


class FormController extends Controller
{
    /**
     * @param $param
     */
    public function displayForm ($param){
                $this->render($param);
    }

    public function checkForm (){
        if(isset($_POST['button'])){

        }
    }

}
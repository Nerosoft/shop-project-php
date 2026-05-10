<?php
require 'ModelJson.php';
require 'class_object/MyLanguage.php';
class InformationPage extends ModelJson{
    private $Title;
    function __construct($IdPage, $message, $type){
        parent::__construct($IdPage);
        $this->Title = $this->getModelPage()['Title'];
        echo<<<HTML
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>{$this->getTitle()}</title>
            <link href="./asset/css/style.css" rel="stylesheet">
            <link href="./asset/lib/bootstrap.min.css" rel="stylesheet">
            <script src="./asset/lib/jquery.min.js" type="text/javascript"></script>
            <script src="./asset/lib/bootstrap.bundle.min.js" type="text/javascript"></script>
            <script src="./asset/js/script.js" type="text/javascript"></script>
            <link href="./asset/css/{$this->getStyleFile()}.css" rel="stylesheet">
            <link rel="stylesheet" href="./asset/css/font-awesome.min.css">
        HTML;
        if($IdPage === 'Site' || $IdPage === 'Login' || $IdPage === 'Register'){
            echo $IdPage === 'Site'? 
                '<link rel="stylesheet" href="./asset/css/aos.css">
                <link rel="stylesheet" href="./asset/css/owl.carousel.min.css">
                <link rel="stylesheet" href="./asset/css/owl.theme.default.min.css">
                <link rel="stylesheet" href="./asset/css/templatemo-digital-trend.css"></head><body>' : 
                '<link href="./asset/css/login_register.css" rel="stylesheet"></head><body>';
            $this->initErrorActiveStyleLang();
        }else{
            echo '<link href="./asset/lib/dataTables.bootstrap5.css" rel="stylesheet">
            <script src="./asset/lib/dataTables.js" type="text/javascript"></script>
            <script src="./asset/lib/dataTables.bootstrap5.js" type="text/javascript"></script></head><body>';
            if($IdPage === 'ChangeLanguage' || $IdPage === 'MyStyle' || $IdPage === 'Branches'){
                if($IdPage === 'ChangeLanguage' || $IdPage === 'MyStyle')
                    $this->InitInfoChangeLangStyle($this->getModelPage(), array_reverse(MyLanguage::fromArray($this->getModel2()[$IdPage === 'ChangeLanguage'?'AllNamesLanguage':'Style'])), $this->getModel2()['AllNamesLanguage']);
                $this->initChangeStyleLangBranch($this->getModelPage());
            }
        }
        $toast = $this->getModelPage()[$message]??$message;
        echo<<<HTML
            <div style="position: fixed; top: 0; right: 10px; z-index: 9999; max-height: 90vh; overflow-y: auto;">
                <div id="toastId" class="toast text-bg-{$type} mt-2">
                    <script>
                        $(document).ready(function(){
                            (new bootstrap.Toast($('#toastId').on("hidden.bs.toast", function () {
                            $(this).remove();
                            }), { delay: 9000 })).show();
                        });
                    </script>
                    <div class="d-flex">
                        <div class="toast-body">{$toast}</div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                    </div>
                </div>
            </div>
        HTML;
    }
    function getTitle(){
        return $this->Title;
    }
    function setTitle($title){
        return $this->Title = $title;
    }
}
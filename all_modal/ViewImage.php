<?php
echo <<<HTML
<div class="modal fade" id="imgmodal{$index}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="SettingLanguage">{$view->getTitleViewImage()}</h5>
                <button type="button" id="close_button" onclick="closeForm('#imgmodal{$index}')" class="btn btn-dark">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="./asset/product/{$view->getId()}/{$index}" class="product-img-view">
            </div>
        </div>
    </div>
</div>
HTML;
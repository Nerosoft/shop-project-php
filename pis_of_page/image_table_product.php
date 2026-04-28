<div>
    <div class="pt-2 form-group text-center">
        <h5><?php echo $view->getImgLabel()?></h5>
        
        <img id="preview" src='<?php echo isset($index) ? "./asset/product/".$view->getId()."/".$index : "./asset/img/product.jpg"?>' class="avatar-product">
        <div class="img-btn">
            <input 
            <?php echo isset($index)?'':'required'?>
            oninput="changeImage(this, $('#<?php echo isset($index) ? "editForm".$index : "createForm"?>').find('#preview'))" type="file" id="avatar" name="avatar" class="avatar" accept="image/*"/>
            <button 
            onclick="openImage($('#<?php echo isset($index) ? "editForm".$index : "createForm"?>').find('#avatar'))" id="uploadBtn"
            type="button" class="btn btn-success"><?php echo $view->getImgButton()?></button>
        </div>
    </div>
</div>
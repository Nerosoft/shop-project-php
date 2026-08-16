  <script>
    function openImage(avatar){
        avatar.click();
    }
    $('.avatar').on('invalid', function(){
        if (this.validity.valueMissing)
            this.setCustomValidity("<?php echo $this->getReqimage()?>");
    })
    function changeImage(file, preview){
        avatar = file.files[0];
        if(avatar && !['image/jpeg', 'image/png'].includes(avatar.type)||avatar && avatar.size > (2 * 1024 * 1024)){
            file.setCustomValidity('<?php echo $this->getInvimage()?>');
            preview.attr('src', './asset/img/error_image.png');
        }else if(avatar){
            file.setCustomValidity('');
            const reader = new FileReader();
            reader.onload = function (e) {
                var img = new Image;
                img.src = e.target.result; 
                preview.attr('src', e.target.result);
                img.onload = function() {
                preview.data('height', this.height);
                preview.data('width', this.width);
                };
            };
            reader.readAsDataURL(avatar);
        }else{
            file.setCustomValidity('<?php echo $this->getInvimage()?>');
            preview.attr('src', './asset/img/error_image.png');
        }
    }
</script>
<div>
    <div class="pt-2 form-group text-center">
        <h5><?php echo $this->getImgLabel()?></h5>
        
        <img id="preview" src='<?php echo isset($index) && $index !== null? "./asset/product/".$this->getId()."/".$index : "./asset/img/product.jpg"?>' class="avatar-product">
        <div class="img-btn">
            <input 
            <?php echo isset($index) && $index !== null?'':'required'?>
            oninput="changeImage(this, $('#<?php echo isset($index) && $index !== null ? "editModel".$index : "createModel"?>').find('#preview'))" type="file" id="avatar" name="avatar" class="avatar" accept="image/*"/>
            <button 
            onclick="openImage($('#<?php echo isset($index) && $index !== null? "editModel".$index : "createModel"?>').find('#avatar'))" id="uploadBtn"
            type="button" class="btn btn-success"><?php echo $this->getImgButton()?></button>
        </div>
    </div>
</div>
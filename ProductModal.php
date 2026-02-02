<!-- Modal -->
<?php 
include('start_model.php');
if(isset($index))
    include('my_id.php');
?>
<div>
    <div class="pt-2 form-group text-center">
        <h5><?php echo $view->getImgLabel()?></h5>
        
        <img id="preview" src='<?php echo isset($index) ? "./asset/product/".$index : "./asset/img/product.jpg"?>' class="avatar-product">
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
<div class="form-group">
    <label for="name" class="form-label"><?php echo$view->getLabelName()?></label>
    <input required type="text" name="name" id="name" 
    minlength="3"
    oninput="handleInput(this, '<?php echo $view->getRequiredName()?>', '<?php echo $view->getInvalidName()?>')"
        oninvalid="handleInput(this, '<?php echo $view->getRequiredName()?>', '<?php echo $view->getInvalidName()?>')"
    value="<?php echo$myObject?->getName()??''?>" placeholder='<?php echo$view->getHintName()?>'
    class="form-control">
</div>
<div class="form-group">
    <label for="descreption"><?php echo $view->getLabelDescreption()?></label>
    <input type="text" class="form-control" id="descreption" name="descreption"
        placeholder="<?php echo $view->getHintDescreption()?>"
        title="<?php echo $view->getHintDescreption()?>"
        value="<?php echo$myObject?->getDescreption()??''?>"
        required
        minlength="8" 
        oninput="handleInput(this, '<?php echo $view->getRequiredDescreption()?>', '<?php echo $view->getInvalidDescreption()?>')"
        oninvalid="handleInput(this, '<?php echo $view->getRequiredDescreption()?>', '<?php echo $view->getInvalidDescreption()?>')"
        >
</div>
 <div class="form-group">
    <label for="Salary"><?php echo $view->getLabelSalary()?></label>
    <input type="number" class="form-control" id="salary" name="salary"
    placeholder="<?php echo $view->getHintSalary()?>"
    title="<?php echo $view->getHintSalary()?>"
    value="<?php echo$myObject?->getSalary()??''?>"
    min="1"
    max="1000000"
    required>
</div>
 <div class="form-group">
    <label for="category"><?php echo $view->getLabelCategory()?></label>
    <input type="text" class="form-control" id="category" name="category"
    placeholder="<?php echo $view->getHintCategory()?>"
    title="<?php echo $view->getHintCategory()?>"
    value="<?php echo$myObject?->getCategory()??''?>"
    minlength="3" 
    required
    oninput="handleInput(this, '<?php echo $view->getRequiredCategory()?>', '<?php echo $view->getInvalidCategory()?>')"
    oninvalid="handleInput(this, '<?php echo $view->getRequiredCategory()?>', '<?php echo $view->getInvalidCategory()?>')">
</div>
<?php include('end_model.php');?>
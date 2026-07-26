<!-- Modal -->
<?php 
include('start_model.php');
include('pis_of_page/image_table_product.php');
?>
<div class="form-group">
    <i class="fa fa-tag fa-2x"></i>
    <label for="name" class="form-label"><?php echo$this->getLabelName()?></label>
    <input required type="text" name="name" id="name" 
    title='<?php echo$this->getHintName()?>'
    minlength="3"
    oninput="handleInput(this, '<?php echo $this->getRequiredName()?>', '<?php echo $this->getInvalidName()?>')"
        oninvalid="handleInput(this, '<?php echo $this->getRequiredName()?>', '<?php echo $this->getInvalidName()?>')"
    value="<?php echo$myObject?->getName()??''?>" placeholder='<?php echo$this->getHintName()?>'
    class="form-control">
</div>
<div class="form-group">
    <i class="fa fa-info fa-2x"></i>
    <label for="descreption"><?php echo $this->getLabelDescreption()?></label>
    <input type="text" class="form-control" id="descreption" name="descreption"
        placeholder="<?php echo $this->getHintDescreption()?>"
        title="<?php echo $this->getHintDescreption()?>"
        value="<?php echo$myObject?->getDescreption()??''?>"
        required
        minlength="8" 
        oninput="handleInput(this, '<?php echo $this->getRequiredDescreption()?>', '<?php echo $this->getInvalidDescreption()?>')"
        oninvalid="handleInput(this, '<?php echo $this->getRequiredDescreption()?>', '<?php echo $this->getInvalidDescreption()?>')"
        >
</div>
 <div class="form-group">
    <i class="fa fa-money fa-2x"></i>
    <label for="Salary"><?php echo $this->getLabelSalary()?></label>
    <input type="number" class="form-control mysalary" id="salary" name="salary"
    placeholder="<?php echo $this->getHintSalary()?>"
    title="<?php echo $this->getHintSalary()?>"
    value="<?php echo$myObject?->getSalary()??''?>"
    min="1"
    max="1000000"
    required>
</div>
 <div class="form-group">
    <i class="fa fa-folder fa-2x"></i>
    <label for="category"><?php echo $this->getLabelCategory()?></label>
    <input type="text" class="form-control" id="category" name="category"
    placeholder="<?php echo $this->getHintCategory()?>"
    title="<?php echo $this->getHintCategory()?>"
    value="<?php echo$myObject?->getCategory()??''?>"
    minlength="3" 
    required
    oninput="handleInput(this, '<?php echo $this->getRequiredCategory()?>', '<?php echo $this->getInvalidCategory()?>')"
    oninvalid="handleInput(this, '<?php echo $this->getRequiredCategory()?>', '<?php echo $this->getInvalidCategory()?>')">
</div>
<?php 
    include('end_model.php');
?>
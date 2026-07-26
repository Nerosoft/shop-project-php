<div class="container">
    <div class="row">
        <div class="col-lg-auto pt-2">
            <i class="fa fa-user fa-2x"></i>
            <label for="Name"><?php echo $this->getLabelBranchRaysName()?></label>
            <div class="input-group">
                <div class="input-group-prepend">
                </div>
                <input 
                minlength="3" 
                required
                oninvalid="handleInput(this ,'<?php echo$this->getBranceRaysNameRequired()?>', '<?php echo$this->getBranceRaysNameLength()?>')"
                oninput="handleInput(this ,'<?php echo$this->getBranceRaysNameRequired()?>', '<?php echo$this->getBranceRaysNameLength()?>')"
                id="Name" type="text" class="form-control" name="Name" value="<?php echo$myObject?->getName()??''?>" title="<?php echo$this->getBranchRaysName()?>" placeholder="<?php echo$this->getBranchRaysName()?>">
            </div>
        </div>
        <div class="col-lg-auto pt-2">
            <i class="fa fa-phone fa-2x"></i>
            <label for="Phone"><?php echo $this->getLabelBranchRaysPhone()?></label>
            <div class="input-group">
                <div class="input-group-prepend">
                </div>
                <input 
                pattern="^[0-9]{11}$" 
                required
                oninvalid="handleInputPhone(this ,'<?php echo$this->getBranceRaysPhoneRequired()?>', '<?php echo$this->getBranceRaysPhoneLength()?>')"
                oninput="handleInputPhone(this ,'<?php echo$this->getBranceRaysPhoneRequired()?>', '<?php echo$this->getBranceRaysPhoneLength()?>')"
                id="Phone" inputmode="tel" class="form-control" name="Phone" value="<?php echo$myObject?->getPhone()??''?>" title="<?php echo$this->getBranchRaysPhone()?>" placeholder="<?php echo$this->getBranchRaysPhone()?>">
            </div>
        </div>
        <div class="col-lg-auto pt-2">
            <i class="fa fa-globe fa-2x"></i>
            <label for="Country"><?php echo $this->getLabelBranchRaysCountry()?></label>
            <div class="input-group">
                <div class="input-group-prepend">
                </div>
                    <input 
                    minlength="3" 
                    required
                    oninvalid="handleInput(this ,'<?php echo$this->getBranceRaysCountryRequired()?>', '<?php echo$this->getBranceRaysCountryLength()?>')"
                    oninput="handleInput(this ,'<?php echo$this->getBranceRaysCountryRequired()?>', '<?php echo$this->getBranceRaysCountryLength()?>')"
                    id="Country" type="text" class="form-control" name="Country" value="<?php echo$myObject?->getCountry()??''?>" title="<?php echo$this->getBranchRaysCountry()?>" placeholder="<?php echo$this->getBranchRaysCountry()?>">
            </div>
        </div>
        <div class="col-lg-auto pt-2">
            <i class="fa fa-building fa-2x"></i>
            <label for="Governments"><?php echo $this->getLabelBranchRaysGovernments()?></label>
            <div class="input-group">
                <div class="input-group-prepend">
                </div>
                <input 
                minlength="3" 
                required
                oninvalid="handleInput(this ,'<?php echo$this->getBranceRaysGovernmentsRequired()?>', '<?php echo$this->getBranceRaysGovernmentsLength()?>')"
                oninput="handleInput(this ,'<?php echo$this->getBranceRaysGovernmentsRequired()?>', '<?php echo$this->getBranceRaysGovernmentsLength()?>')"
                id="Governments" type="text" class="form-control" name="Governments" value="<?php echo$myObject?->getGovernments()??''?>" title="<?php echo$this->getBranchRaysGovernments()?>" placeholder="<?php echo$this->getBranchRaysGovernments()?>">
            </div>
        </div>
        <div class="col-lg-auto pt-2">
            <i class="fa fa-columns fa-2x"></i>
            <label for="City"><?php echo $this->getLabelBranchRaysCity()?></label>
            <div class="input-group">
                <div class="input-group-prepend">
                </div>
                <input 
                minlength="3" 
                required
                oninvalid="handleInput(this ,'<?php echo$this->getBranceRaysCityRequired()?>', '<?php echo$this->getBranceRaysCityLength()?>')"
                oninput="handleInput(this ,'<?php echo$this->getBranceRaysCityRequired()?>', '<?php echo$this->getBranceRaysCityLength()?>')"
                id="City" type="text" class="form-control" name="City" value="<?php echo$myObject?->getCity()??''?>" title="<?php echo$this->getBranchRaysCity()?>" placeholder="<?php echo$this->getBranchRaysCity()?>">
            </div>
        </div>
        <div class="col-lg-auto pt-2">
            <i class="fa fa-road fa-2x"></i>
            <label for="Street"><?php echo $this->getLabelBranchRaysStreet()?></label>
            <div class="input-group">
                <div class="input-group-prepend">
                </div>
                <input 
                minlength="3" 
                required
                oninvalid="handleInput(this ,'<?php echo$this->getBranceRaysStreetRequired()?>', '<?php echo$this->getBranceRaysStreetLength()?>')"
                oninput="handleInput(this ,'<?php echo$this->getBranceRaysStreetRequired()?>', '<?php echo$this->getBranceRaysStreetLength()?>')"
                id="Street" type="text" class="form-control" name="Street" value="<?php echo$myObject?->getStreet()??''?>" title="<?php echo$this->getBranchRaysStreet()?>" placeholder="<?php echo$this->getBranchRaysStreet()?>">
            </div>
        </div>
        <div class="col-lg-auto pt-2">
            <i class="fa fa-building fa-2x"></i>
            <label for="Building"><?php echo $this->getLabelBranchRaysBuilding()?></label>
            <div class="input-group">
                <div class="input-group-prepend">
                </div>
                <input 
                minlength="3" 
                required
                oninvalid="handleInput(this ,'<?php echo$this->getBranceRaysBuildingRequired()?>', '<?php echo$this->getBranceRaysBuildingLength()?>')"
                oninput="handleInput(this ,'<?php echo$this->getBranceRaysBuildingRequired()?>', '<?php echo$this->getBranceRaysBuildingLength()?>')"
                id="Building" type="text" class="form-control" name="Building" value="<?php echo$myObject?->getBuilding()??''?>" title="<?php echo$this->getBranchRaysBuilding()?>" placeholder="<?php echo$this->getBranchRaysBuilding()?>">
            </div>
        </div>
        <div class="col-lg-auto pt-2">
            <i class="fa fa-map fa-2x"></i>
            <label for="Address"><?php echo $this->getLabelBranchRaysAddress()?></label>
            <div class="input-group">
                <div class="input-group-prepend">
                </div>
                <input 
                minlength="3" 
                required
                oninvalid="handleInput(this ,'<?php echo$this->getBranceRaysAddressRequired()?>', '<?php echo$this->getBranceRaysAddressLength()?>')"
                oninput="handleInput(this ,'<?php echo$this->getBranceRaysAddressRequired()?>', '<?php echo$this->getBranceRaysAddressLength()?>')"
                id="Address" type="text" class="form-control" name="Address" value="<?php echo$myObject?->getAddress()??''?>" title="<?php echo$this->getBranchRaysAddress()?>" placeholder="<?php echo$this->getBranchRaysAddress()?>">
            </div>
        </div>
        <div class="col-lg-12 pt-2">
            <i class="fa fa-building fa-2x"></i>
            <label for="Follow"><?php echo $this->getLabelWithRaysOut()?></label>
            <div class="input-group">
                <div class="input-group-prepend">
                </div>
                <select
                title="<?php echo$this->getselectBox1()?>"
                required
                oninvalid="handleInputSelect(this, '<?php echo$this->getBranceRaysFollowRequired()?>')"
                oninput="handleInputSelect(this, '<?php echo$this->getBranceRaysFollowRequired()?>')"
                class="form-select" id="Follow" name="Follow"  aria-label="Default select example">
                    <option value="" selected disabled><?php echo$this->getselectBox1()?></option>
                    <?php 
                        foreach($this->getbranchInputOutput() as $key=>$inpBranch){
                            $select = isset($index) && $index !== null && $myObject->getFollowId() === $inpBranch ? 'selected' : '';
                            echo <<<HTML
                            <option {$select} value="{$key}">{$inpBranch}</option>
                            HTML;
                        }
                    ?>
                </select>

            </div>
        </div>

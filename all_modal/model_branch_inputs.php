<div class="container">
    <div class="row">
        <div class="col-lg-auto pt-2">
            <i class="fa fa-user fa-2x"></i>
            <label for="Name"><?php echo $view->getLabelBranchRaysName()?></label>
            <div class="input-group">
                <div class="input-group-prepend">
                </div>
                <input 
                minlength="3" 
                required
                oninvalid="handleInput(this ,'<?php echo$view->getBranceRaysNameRequired()?>', '<?php echo$view->getBranceRaysNameLength()?>')"
                oninput="handleInput(this ,'<?php echo$view->getBranceRaysNameRequired()?>', '<?php echo$view->getBranceRaysNameLength()?>')"
                id="Name" type="text" class="form-control" name="Name" value="<?php echo$myObject?->getName()??''?>" title="<?php echo$view->getBranchRaysName()?>" placeholder="<?php echo$view->getBranchRaysName()?>">
            </div>
        </div>
        <div class="col-lg-auto pt-2">
            <i class="fa fa-phone fa-2x"></i>
            <label for="Phone"><?php echo $view->getLabelBranchRaysPhone()?></label>
            <div class="input-group">
                <div class="input-group-prepend">
                </div>
                <input 
                pattern="^[0-9]{11}$" 
                required
                oninvalid="handleInputPhone(this ,'<?php echo$view->getBranceRaysPhoneRequired()?>', '<?php echo$view->getBranceRaysPhoneLength()?>')"
                oninput="handleInputPhone(this ,'<?php echo$view->getBranceRaysPhoneRequired()?>', '<?php echo$view->getBranceRaysPhoneLength()?>')"
                id="Phone" inputmode="tel" class="form-control" name="Phone" value="<?php echo$myObject?->getPhone()??''?>" title="<?php echo$view->getBranchRaysPhone()?>" placeholder="<?php echo$view->getBranchRaysPhone()?>">
            </div>
        </div>
        <div class="col-lg-auto pt-2">
            <i class="fa fa-globe fa-2x"></i>
            <label for="Country"><?php echo $view->getLabelBranchRaysCountry()?></label>
            <div class="input-group">
                <div class="input-group-prepend">
                </div>
                    <input 
                    minlength="3" 
                    required
                    oninvalid="handleInput(this ,'<?php echo$view->getBranceRaysCountryRequired()?>', '<?php echo$view->getBranceRaysCountryLength()?>')"
                    oninput="handleInput(this ,'<?php echo$view->getBranceRaysCountryRequired()?>', '<?php echo$view->getBranceRaysCountryLength()?>')"
                    id="Country" type="text" class="form-control" name="Country" value="<?php echo$myObject?->getCountry()??''?>" title="<?php echo$view->getBranchRaysCountry()?>" placeholder="<?php echo$view->getBranchRaysCountry()?>">
            </div>
        </div>
        <div class="col-lg-auto pt-2">
            <i class="fa fa-building fa-2x"></i>
            <label for="Governments"><?php echo $view->getLabelBranchRaysGovernments()?></label>
            <div class="input-group">
                <div class="input-group-prepend">
                </div>
                <input 
                minlength="3" 
                required
                oninvalid="handleInput(this ,'<?php echo$view->getBranceRaysGovernmentsRequired()?>', '<?php echo$view->getBranceRaysGovernmentsLength()?>')"
                oninput="handleInput(this ,'<?php echo$view->getBranceRaysGovernmentsRequired()?>', '<?php echo$view->getBranceRaysGovernmentsLength()?>')"
                id="Governments" type="text" class="form-control" name="Governments" value="<?php echo$myObject?->getGovernments()??''?>" title="<?php echo$view->getBranchRaysGovernments()?>" placeholder="<?php echo$view->getBranchRaysGovernments()?>">
            </div>
        </div>
        <div class="col-lg-auto pt-2">
            <i class="fa fa-columns fa-2x"></i>
            <label for="City"><?php echo $view->getLabelBranchRaysCity()?></label>
            <div class="input-group">
                <div class="input-group-prepend">
                </div>
                <input 
                minlength="3" 
                required
                oninvalid="handleInput(this ,'<?php echo$view->getBranceRaysCityRequired()?>', '<?php echo$view->getBranceRaysCityLength()?>')"
                oninput="handleInput(this ,'<?php echo$view->getBranceRaysCityRequired()?>', '<?php echo$view->getBranceRaysCityLength()?>')"
                id="City" type="text" class="form-control" name="City" value="<?php echo$myObject?->getCity()??''?>" title="<?php echo$view->getBranchRaysCity()?>" placeholder="<?php echo$view->getBranchRaysCity()?>">
            </div>
        </div>
        <div class="col-lg-auto pt-2">
            <i class="fa fa-road fa-2x"></i>
            <label for="Street"><?php echo $view->getLabelBranchRaysStreet()?></label>
            <div class="input-group">
                <div class="input-group-prepend">
                </div>
                <input 
                minlength="3" 
                required
                oninvalid="handleInput(this ,'<?php echo$view->getBranceRaysStreetRequired()?>', '<?php echo$view->getBranceRaysStreetLength()?>')"
                oninput="handleInput(this ,'<?php echo$view->getBranceRaysStreetRequired()?>', '<?php echo$view->getBranceRaysStreetLength()?>')"
                id="Street" type="text" class="form-control" name="Street" value="<?php echo$myObject?->getStreet()??''?>" title="<?php echo$view->getBranchRaysStreet()?>" placeholder="<?php echo$view->getBranchRaysStreet()?>">
            </div>
        </div>
        <div class="col-lg-auto pt-2">
            <i class="fa fa-building fa-2x"></i>
            <label for="Building"><?php echo $view->getLabelBranchRaysBuilding()?></label>
            <div class="input-group">
                <div class="input-group-prepend">
                </div>
                <input 
                minlength="3" 
                required
                oninvalid="handleInput(this ,'<?php echo$view->getBranceRaysBuildingRequired()?>', '<?php echo$view->getBranceRaysBuildingLength()?>')"
                oninput="handleInput(this ,'<?php echo$view->getBranceRaysBuildingRequired()?>', '<?php echo$view->getBranceRaysBuildingLength()?>')"
                id="Building" type="text" class="form-control" name="Building" value="<?php echo$myObject?->getBuilding()??''?>" title="<?php echo$view->getBranchRaysBuilding()?>" placeholder="<?php echo$view->getBranchRaysBuilding()?>">
            </div>
        </div>
        <div class="col-lg-auto pt-2">
            <i class="fa fa-map fa-2x"></i>
            <label for="Address"><?php echo $view->getLabelBranchRaysAddress()?></label>
            <div class="input-group">
                <div class="input-group-prepend">
                </div>
                <input 
                minlength="3" 
                required
                oninvalid="handleInput(this ,'<?php echo$view->getBranceRaysAddressRequired()?>', '<?php echo$view->getBranceRaysAddressLength()?>')"
                oninput="handleInput(this ,'<?php echo$view->getBranceRaysAddressRequired()?>', '<?php echo$view->getBranceRaysAddressLength()?>')"
                id="Address" type="text" class="form-control" name="Address" value="<?php echo$myObject?->getAddress()??''?>" title="<?php echo$view->getBranchRaysAddress()?>" placeholder="<?php echo$view->getBranchRaysAddress()?>">
            </div>
        </div>
        <div class="col-lg-12 pt-2">
            <i class="fa fa-building fa-2x"></i>
            <label for="Follow"><?php echo $view->getLabelWithRaysOut()?></label>
            <div class="input-group">
                <div class="input-group-prepend">
                </div>
                <select
                title="<?php echo$view->getselectBox1()?>"
                required
                oninvalid="handleInputSelect(this, '<?php echo$view->getBranceRaysFollowRequired()?>')"
                oninput="handleInputSelect(this, '<?php echo$view->getBranceRaysFollowRequired()?>')"
                class="form-select" id="Follow" name="Follow"  aria-label="Default select example">
                    <option value="" selected disabled><?php echo$view->getselectBox1()?></option>
                    <?php 
                        foreach($view->getbranchInputOutput() as $key=>$inpBranch){
                            $select = isset($index) && $index !== null && $myObject->getFollowId() === $inpBranch ? 'selected' : '';
                            echo <<<HTML
                            <option {$select} value="{$key}">{$inpBranch}</option>
                            HTML;
                        }
                    ?>
                </select>

            </div>
        </div>

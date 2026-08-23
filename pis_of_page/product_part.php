<?php
echo <<<HTML
    <tr>
        <td>{$this->getCount()}</td>
        <td><img id="preview" src="./asset/product/{$this->getId()}/{$index}" class="avatar-product-view"></td>
        <td>{$myObject->getName()}</td>
        <td>{$myObject->getDescreption()}</td>
        <td>{$myObject->getSalary()}</td>
        <td>{$myObject->getCategory()}</td>
HTML;
include 'pis_of_page/display_image.php';
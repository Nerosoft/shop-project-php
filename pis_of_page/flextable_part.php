<?php
 echo <<<HTML
    <tr>
        <td>{$this->getCount()}</td>
        <td><img id="preview" src="./asset/product/{$this->getId()}/{$index}" class="avatar-product-view"></td>
HTML;
foreach ($myObject as $key => $item)
    echo <<<HTML
    <td>{$item}</td>
    HTML;  
include 'pis_of_page/display_image.php';
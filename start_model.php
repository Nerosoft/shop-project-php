<div class="modal fade" id="<?php echo$idModel??'createModel'?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="SettingLanguage"><?php echo$title?></h5>
        <button type="button" id="close_button" onclick="closeForm('#<?php echo$idModel??'createModel'?>')" class="btn btn-dark">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="<?php echo$idForm??'createForm'?>" action="<?php echo $action??''?>" method="POST" enctype="multipart/form-data">
      <div class="modal-body">

         
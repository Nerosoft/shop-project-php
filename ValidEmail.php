<script type="text/javascript">
    $(document).ready(function() {
        $('input[type="email"]').on('input invalid', function() {
            if (this.validity.valueMissing)
                this.setCustomValidity('<?php echo $view->getRequiredEmail()?>');
            else if (this.validity.typeMismatch)
                this.setCustomValidity('<?php echo $view->getInvalidEmail()?>');
            else
                this.setCustomValidity('');
        });
    });
</script>

<?php

    function validationMsg($msg, $type = 'danger'){

        return '<p class="alert alert-'.$type.'"> '.$msg.' ! <button class="close" data-dismiss ="alert">&times;</button></p>';

    }
<?php 
    function reverseDate($date) {
        $reversed = date_create_from_format('Y-m-d', $date);
        return date_format($reversed, 'd-m-Y'); 
    }

    ?>
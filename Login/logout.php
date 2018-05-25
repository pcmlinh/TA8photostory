<?php session_start(); ?>
<html><body>
<?php
        unset($_SESSION['name']);
        header("Location:  /TA8photostory/");
        ?>
        
</body>
</html>
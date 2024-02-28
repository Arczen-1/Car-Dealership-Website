<?php
            $conn = mysqli_connect("localhost", "root", "") or die ("Unable to Connect!". mysqli_error());
            mysqli_select_db($conn, "dbcardealership");
?>
<?php
session_start();
include './header.php';
session_destroy();
?>
<p style="margin-left:50px;margin-right:50px;margin-top:50px;margin-bottom:50px; "><center><h2 style="color:white;">THANK YOU, Your Registration Was Successful </h2></center></p>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/jquery.backstretch.js" type="text/javascript"></script>
<script type="text/javascript">
    'use strict';

    /* ========================== */
    /* ::::::: Backstrech ::::::: */
    /* ========================== */
    // You may also attach Backstretch to a block-level element
    $.backstretch(
            [
                "img/44.jpg",
                "img/colorful.jpg",
                "img/34.jpg",
                "img/images.jpg"
            ],
            {
                duration: 4500,
                fade: 1500
            }
    );
</script>
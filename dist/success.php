<?php
header("refresh:3; url=index.php");
$page_title = 'Thanks!';
require 'inc/head.php';
?>
    <div id="success">
        <div id="success--message">
            <i class="far fa-handshake"></i>
            <h2>Thanks for the message!</h2>
            <span>You'll be redirected back now. If nothing happens in 5 seconds, <a href="index.php">click here</a> to return to the homepage.</span>
        </div>
    </div>

<?php require 'inc/footer.php'; ?>
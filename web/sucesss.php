<?php
   echo '<div class="alert alert-success" role="alert">';
    echo 'Thank you for submitting the form!';
    echo '</div>';

    // Redirect to index.php after a 3-second delay
    header('Refresh: 1; URL=index.php');
?>

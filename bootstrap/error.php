<?php

if ($type == "error") {
        echo '<p class="alert alert-danger"><strong>Error!</strong> '.$message.'</p>';
} elseif ($type == "success") {
        echo '<p class="alert alert-success"><strong>Success!</strong> '.$message.'</p>';
} elseif ($type == "attention") {
        echo '<p class="alert alert-warning"><strong>Attention!</strong> '.$message.'</p>';
} elseif ($type == "info") {
        echo '<p class="alert alert-info"><strong>Info:</strong> '.$message.'</p>';
} elseif ($type == "important") {
        echo '<p class="alert alert-info"><strong>Important!</strong> '.$message.'</p>';
} elseif ($type == "error-empty") {
        echo '<p class="alert alert-danger">'.$message.'</p>';
} elseif ($type == "success-empty") {
        echo '<p class="alert alert-success">'.$message.'</p>';
} else {
        echo '<p class="alert alert-info"><strong>'.$type.'</strong> '.$message.'</p>';
}

?>
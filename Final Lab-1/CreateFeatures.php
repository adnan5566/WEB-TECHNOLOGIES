<?php
    if($_SERVER['REQUEST_METHOD'] == "POST") {
         $feature_name = $_POST['feature_name'];
        $feature_id = $_POST['feature_id'];
        $feature_details = $_POST['feature_details'];

        $file = fopen("features.txt", "a");
        fwrite($file, $feature_name . ',' . $feature_id . ',' . $feature_details . "\n");
        fclose($file);

        echo "Feature created successfully.";
    }
?>
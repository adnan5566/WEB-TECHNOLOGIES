
<?php
	if (isset($_POST['submit'])) {
		$feature_id = $_POST['feature_id'];
		$new_feature_name = $_POST['new_feature_name'];
		$new_feature_details = $_POST['new_feature_details'];

		$features = file('features.txt');
		$new_features = array();

	foreach ($features as $feature) {
			$feature_parts = explode('|', $feature);
			if ($feature_parts[1] == $feature_id) {
				$feature_parts[0] = $new_feature_name;
				$feature_parts[2] = $new_feature_details;
				$new_features[] = implode('|', $feature_parts);
			} else {
				$new_features[] = $feature;
			}
		}

		$file = fopen("features.txt", "w");
		fwrite($file, implode("", $new_features));
		fclose($file);
    }
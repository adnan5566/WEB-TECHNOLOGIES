<?php
	if (isset($_POST['submit'])) {
		$feature_id = $_POST['feature_id'];
		$feature_name = $_POST['feature_name'];

		$features = file('features.txt');
		$new_features = array();

		foreach ($features as $feature) {
			$feature_parts = explode('|', $feature);
			if ($feature_parts[1] != $feature_id && $feature_parts[0] != $feature_name) {
				$new_features[] = $feature;
			}
		}

		$file = fopen("features.txt", "w");
		fwrite($file, implode("", $new_features));
		fclose($file);

		echo "<p>Feature deleted successfully!</p>";
	}
?>
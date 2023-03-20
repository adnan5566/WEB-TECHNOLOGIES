<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = validate_input($_POST['user_id']);
    if (!is_valid_user($user_id)) {
        $_SESSION['profile_error'] = 'Invalid user ID.';
        header("Location: view-profile.php");
        exit();
    }

    $user_data = get_user_data($user_id);

    if ($user_data === false) {
        $_SESSION['profile_error'] = 'User data not found.';
        header("Location: view-profile.php");
        exit();
    }

    $_SESSION['profile_data'] = $user_data;
    header("Location: view-profile.php");
    exit();
}

function validate_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function is_valid_user($user_id) {
    // Add validation logic for user ID
    return true;
}

function get_user_data($user_id) {
    $data_file = 'data.txt';
    $handle = fopen($data_file, 'r');
    if ($handle) {
        while (($line = fgets($handle)) !== false) {
            $user_data = explode('|', trim($line));
            if ($user_data[0] === $user_id) {
                fclose($handle);
                return $user_data;
            }
        }
        fclose($handle);
    }
    return false;
}

function display_user_data($user_data) {
    echo '<h1>User Profile</h1>';
    echo '<p><strong>User ID: </strong>' . $user_data[0] . '</p>';
    echo '<p><strong>Name: </strong>' . $user_data[1] . '</p>';
    echo '<p><strong>Email: </strong>' . $user_data[2] . '</p>';
    echo '<p><strong>Date of Birth: </strong>' . $user_data[3] . '</p>';
    echo '<p><strong>Phone Number: </strong>' . $user_data[4] . '</p>';
    echo '<button type="button" onclick="location.href=\'work-schedule.php\'">Work Schedle</button>';
}

?>



<!DOCTYPE html>
    <html>
        <head>
            <title>View Profile</title>
        </head>

        <body>
            <fieldset>
                <legend><h1>View Profile</h1></legend>
            <?php
        
            if (isset($_SESSION['profile_error'])) {
                echo '<p>' . $_SESSION['profile_error'] . '</p>';
                unset($_SESSION['profile_error']);
            }
            if (isset($_SESSION['profile_data'])) {
                display_user_data($_SESSION['profile_data']);
                unset($_SESSION['profile_data']);
            }
             else {
            ?>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    <label for="user_id">User ID:</label>
                    <input type="text" name="user_id" id="user_id"><br>
                    <input type="submit" value="View Profile">
                    <input type="reset" value="Reset"><br>
                </form>
    <?php } 





<?php
require_once "db.php";
require_once "../view/generateUserID.php";

function getUserById($id)
{
    $conn = getConnection();

    $sql = "SELECT * FROM userdb WHERE userid='$id'";
    $result = mysqli_query($conn, $sql);

    $user = mysqli_fetch_assoc($result);

    mysqli_close($conn);

    return $user;
}


function getUserByEmail($email) {
    $conn = getConnection();

    $sql = "SELECT * FROM userdb WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    $user = mysqli_fetch_assoc($result);

    mysqli_close($conn);

    return $user;
}

function addUser($userid, $name, $email, $dob, $password, $contactnumber) {
    
    $conn = getConnection();

    $existingUser = getUserByEmail($email);

    if($existingUser) {
        mysqli_close($conn);
        return null;
    }

    $sql = "INSERT INTO userdb (userid, name, email, dob, password, contactnumber) VALUES ('$userid', '$name', '$email', '$dob', '$password', '$contactnumber')";

    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        return $userid;
    } else {
        echo "Error: " . mysqli_error($conn);
        mysqli_close($conn);
        return null;
    }
}

function getUserByUserId($userid) {
    $conn = getConnection();
    $stmt = $conn->prepare("SELECT * FROM userdb WHERE userid = ?");
    $stmt->bind_param("s", $userid);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = mysqli_fetch_assoc($result);

    mysqli_close($conn);

    return $user;
}



?>

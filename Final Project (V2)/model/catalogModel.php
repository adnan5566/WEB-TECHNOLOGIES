<?php
    require_once('db.php');

    function saveBookData($book_data) {
        $conn = getConnection();

        $bookname = mysqli_real_escape_string($conn, $book_data['bookname']);
        $authorname = mysqli_real_escape_string($conn, $book_data['authorname']);
        $publishyear = mysqli_real_escape_string($conn, $book_data['publishyear']);
        $publisher = mysqli_real_escape_string($conn, $book_data['publisher']);
        $isbn = mysqli_real_escape_string($conn, $book_data['isbn']);
        $CIPN = mysqli_real_escape_string($conn, $book_data['CIPN']);

        $sql = "INSERT INTO catalogResource (bookname, authorname, publishyear, publisher, isbn, CIPN) VALUES ('$bookname', '$authorname', '$publishyear', '$publisher', '$isbn', '$CIPN')";

        if(mysqli_query($conn, $sql)) {
            mysqli_close($conn);
            return true;
        } else {
            mysqli_close($conn);
            return false;
        }
    }


    function saveJournalData($journal_data) {
        $conn = getConnection();
    
        $sql = "INSERT INTO catalogResource1 (title, publisher, volume, issue, CIPN) VALUES ('".$journal_data['title']."', '".$journal_data['publisher']."', '".$journal_data['volume']."', '".$journal_data['issue']."', '".$journal_data['CIPN']."')";
    
        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }
    ?>
?>
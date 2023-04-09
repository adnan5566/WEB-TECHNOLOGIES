<!DOCTYPE html>
<html>
<head>
    <title>User Feedback Form</title>
    <link rel="stylesheet" href="feedback.css">
</head>
<body>
    <fieldset>
        <legend><h1>User Feedback Form</h1></legend>
        <form method="post" action="feedbacksubmit.php">
            <label>Name:</label>
            <input type="text" name="name"><br/>
            <label>Email:</label>
            <input type="email" name="email"><br/>
            <label>Feedback:</label>
            <textarea name="feedback" rows="5" cols="30"></textarea><br/>
            <button type="submit">Submit</button>
        </form>
    </fieldset>
</body>
</html>

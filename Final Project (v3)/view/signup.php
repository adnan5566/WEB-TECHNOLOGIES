<!DOCTYPE html>
<html>
    <head>
        <title>Signup</title>
        <link rel="stylesheet" type="text/css" href="signup.css">
    </head>
    <body>
        <fieldset>
            <legend><h1>Signup</h1></legend>
            <form name="signupForm" method="post" action="../controller/registerCheck.php" onsubmit="return validateForm()">
                <label><b>Name:</label>
                <input type="text" name="name"><br/>
                <label>Email:</label>
                <input type="email" name="email"><br/>
                <label>Date of Birth:</label>
                <input type="date" name="dob"><br/>
                <label>Password:</label>
                <input type="password" name="password"><br/>
                <label>Contact Number:</b></label>
                <input type="tel" name="contactnumber"><br/>
                <b><input type="submit" name="submit" value="Signup"></b>
                <input type="reset" value="Reset"><br/>
            </form>
        </fieldset>
	</body>
</html>

        <script>
            function validateForm() {
                var name = document.forms.signupForm.name.value;
                var email = document.forms.signupForm.email.value;
                var dob = document.forms.signupForm.dob.value;
                var password = document.forms.signupForm.password.value;
                var contactNumber = document.forms.signupForm.contactnumber.value;

                if (name == null || name == "") {
                    alert("Name must be filled out");
                    return false;
                }

                if (email == "") {
                    alert("Email must be filled out");
                    return false;
                }

                if (dob == "") {
                    alert("Date of birth must be filled out");
                    return false;
                }

				if (password.length < 4 || password.length > 10) {
                alert("Password must be filled out with 4-10 characters.");
                return false;
            	}

                if (contactNumber == "") {
                    alert("Contact number must be filled out");
                    return false;
                }

            }
        </script>
    

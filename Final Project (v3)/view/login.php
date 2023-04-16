<!DOCTYPE html>
    <html>
        <head>
            <title>Login</title>
            <link rel="stylesheet" href="login.css">
        </head>
        
        <body>
            <fieldset>
                <legend><h1>Login</h1></legend>

                <form name="loginForm" method="post" action="../controller/loginCheck.php" onsubmit="return validateForm()">
                    <label>User ID:</label>
                    <input type="text" name="userid"><br/>
                    <label>Password:</label>
                    <input type="password" name="password"><br/>
                    <input type="submit" name="submit" value="Login">
                    <input type="reset" value="Reset"><br/>
                </form>
            </fieldset>
        </body>
    </html>


    <script>
        function validateForm() {
            var userId = document.loginForm.userid.value;
            var password = document.loginForm.password.value;

            if (userId == null || userId == "") {
                alert("User ID must be filled out.");
                return false;
            }

            if (password.length < 4 || password.length > 10) {
                alert("Password must be filled out with 4-10 characters.");
                return false;
            }
        }

    </script>

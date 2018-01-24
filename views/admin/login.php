<?php
	require_once 'views/layoute/header.php';
?> 
<body>

	<form class='login_form' action='admin_page' method='POST'>
			<div class='admin_page'>ADMIN PAGE</div>
			<p>
                <label>Username:</label>
                <input class = 'input_login' id="username" value="" name="login" type="text" required="required"/>
                <br>
            </p>
            <p>
                <label>Password:</label>
                <input class = 'input_login' id="password" value="" name="password" type="text" required="required"/>
                <br>
            </p>
            <button  class='login_button' name= "submit" type="submit"><span>Login</span></button>
            <!--button type="reset"><span>Cancel</span></button-->

	</form>


</body>
</html>
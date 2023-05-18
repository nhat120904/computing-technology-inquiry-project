<!-- 
/*
    Purpose: This file is used to check if the user's username and password match the ones in the database.
    Project: Kirito website
    Author: Vuong Khang Minh,Nghiem Tuan Linh, Nguyen Cuong Nhat, Dang Nguyen Duc Anh, Phan Huy Quang 
    Last Updated: 2023-4-7
*/
-->

<?php
require_once "settings.php";

/* This code block checks if the HTTP_REFERER server variable is set, which contains the URL of the
page that referred the user to the current page. If it is not set, it means that the user did not
come from a valid source and is accessing the page directly. In this case, the code redirects the
user to the index.php page and exits the script. This is a security measure to prevent unauthorized
access to the page. */
if (!isset($_SERVER['HTTP_REFERER'])) {
    header("location: index.php");
    exit;
}

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) { echo "<p>Database connection failure.</p>"; exit(); }
$sql_table = "assign2_users";
$un = $_POST["user_name"];
$username = hash("sha512", $_POST["user_name"]);
$user_pass = hash("sha512", $_POST["password"]);

// Check if the username already exists
$sql_check_username = "SELECT username, user_pass, email, second_pw FROM $sql_table WHERE username = '$username'";
$result = mysqli_query($conn, $sql_check_username);

/* This code block is checking if the query result `` has at least one row returned by checking
if `mysqli_num_rows()` is greater than 0. If there is at least one row, it loops through each
row using `foreach ( as )` and checks if the hashed password in the row
(`['user_pass']`) matches the hashed password entered by the user (``). If the
passwords match, it checks if the `second_pw` field in the row is not null. If it is not null, it
sets a cookie for the admin and redirects the user to the `signinadmin.php` page. If `second_pw` is
null, it sets cookies for the user and redirects them to the `user.php` page. If the passwords do
not match, it redirects the user to the `signin.php` page with an error message. If there are no
rows returned by the query, it redirects the user to the `signup.php` page with a message suggesting
they sign up. */
if (mysqli_num_rows($result) > 0) {
	foreach ($result as $row) {
		if ($row['user_pass'] == $user_pass) {
			/* This code block is checking if the `second_pw` field in the row returned by the query is not
			null. If it is not null, it means that the user is an admin and needs to be redirected to the
			`signinadmin.php` page. It sets a cookie named `passadmin` with a value of `true` and a duration
			of 7 days. If `second_pw` is null, it means that the user is a regular user and needs to be
			redirected to the `user.php` page. It sets several cookies with the user's information (username,
			password, email, etc.) and a duration of 7 days. It then redirects the user to the `user.php`
			page. */
			if ($row['second_pw'] !== null) {
				echo "Redirecting...";
				header("refresh:1;url=signinadmin.php");
				$day = 7;
				/* `setcookie("passadmin", "true", time() + 60 * 60 * 24 * );` is setting a cookie named
				"passadmin" with a value of "true" and a duration of 7 days. This is done when the user is an
				admin and needs to be redirected to the `signinadmin.php` page. */
				setcookie("passadmin", "true", time() + 60 * 60 * 24 * $day);
			} else {
				echo "Redirecting...";
				$day = 7;
				/* This code block is setting cookies for the user with their information (username, password,
				email, etc.) and a duration of 7 days. The `setcookie()` function is used to set cookies with a
				name, value, expiration time, and other optional parameters. The cookies are used to store user
				information and keep the user logged in for a certain period of time. The `time() + 60 * 60 * 24
				* ` expression calculates the expiration time of the cookie, which is the current time plus
				the number of seconds in a day multiplied by the number of days specified by the `` variable
				(which is set to 7 in this case). */
				setcookie("user", "true", time() + 60 * 60 * 24 * $day);
				setcookie("name", $username, time() + 60 * 60 * 24 * $day);
				setcookie("pass", $user_pass, time() + 60 * 60 * 24 * $day);
				setcookie("un", $un, time() + 60 * 60 * 24 * $day);
				setcookie("email", $row['email'], time() + 60 * 60 * 24 * $day);
				header("refresh:1;url=user.php");
			}
		} else {
			header("refresh:3;url=signin.php");
			echo "Redirecting to signin page in 3 seconds due to wrong password 😑.";
		}
	}
} else {
    header("refresh:3;url=signup.php");
	echo "Redirecting to signup.php in 3 seconds because your username is not existed in our server. Maybe you want to signup? We got you covered";
}

mysqli_close($conn);
?>
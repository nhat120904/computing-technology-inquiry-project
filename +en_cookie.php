<!-- 
/*
    Purpose: This file demonstrates the use of cookies in our website.
    Project: Kirito website
    Author: Vuong Khang Minh,Nghiem Tuan Linh, Nguyen Cuong Nhat, Dang Nguyen Duc Anh, Phan Huy Quang 
    Last Updated: 2023-4-7
*/
-->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Enhancement 2: Cookies</title>
        <link rel="stylesheet" href="./styles/enhancement2_cookie.css" />
	<link rel="stylesheet" href="./styles/footer_en.css">
    </head>
    <body>
        <header>
            <a class="back1" href="./enhancements2.php"> Back to main enhancement page.</a>
        </header>
        <article class="intro">
            <h1>1st Enhancement: Cookies</h1>
            <p>Scroll down for more info</p>
        </article>
        <hr />
        <section class="page">
            <h2>I. Definition and purpose</h2>
            <p>
                Cookies are small pieces of data that are stored on a user's
                computer by the web browser while browsing a website. Cookies
                were designed to be a reliable mechanism for websites to
                remember stateful information (such as items added in the
                shopping cart in an online store) or to record the user's
                browsing activity (including clicking particular buttons,
                logging in, or recording which pages were visited in the past).
                They can also be used to remember arbitrary pieces of
                information that the user previously entered into form fields
                such as names, addresses, passwords, and credit card numbers.
            </p>
            <p>
                In our case, cookies are used to store the user's name and email
                address and password. This is done so that the user does not
                have to enter their information every time they visit the
                website.
            </p>
            <p class="page_tldr">
                TL;DR: Cookies help websites remember user information. Our site
                uses them to store user's name, email, and password.
            </p>
        </section>
        <hr />
        <section class="page">
            <h2>II. Technical details</h2>
            <p>
                Let's take the snippets code from files "checksignin.php" and
                "_checkuser.php" as an example. The first is the file
                "checksignin.php":
            </p>
            <div class="code">
                <div class="line">if ($row['user_pass'] == $user_pass) {</div>
                <div class="line">
                    &emsp;&emsp;&emsp;&emsp;if ($row['second_pw'] !== null) {
                </div>
                <div class="line">
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;echo
                    "Redirecting...";
                </div>
                <div class="line">
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;header("refresh:1;url=signinadmin.php");
                </div>
                <div class="line">
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;$day = 7;
                </div>
                <div class="line highlight">
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    <p class="function">setcookie(</p>
                    "
                    <p class="str">passadmin</p>
                    ", "
                    <p class="str">true</p>
                    ",
                    <p class="function space_line_right space_line_left">
                        time()
                    </p>
                    <p class="operator space_line_right">+</p>
                    <p class="num space_line_right">60</p>
                    <p class="operator space_line_right">*</p>
                    <p class="num space_line_right">60</p>
                    <p class="operator space_line_right">*</p>
                    <p class="num space_line_right">24</p>
                    <p class="operator space_line_right">*</p>
                    <p class="var">$</p>
                    day
                    <p class="function">)</p>
                    ;
                </div>
                <div class="line">&emsp;&emsp;&emsp;&emsp;} else {</div>
                <div class="line">
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;echo
                    "Redirecting...";
                </div>
                <div class="line">
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;$day = 7;
                </div>
                <div class="line highlight">
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    <p class="function">setcookie(</p>
                    "
                    <p class="str">user</p>
                    ", "
                    <p class="str">true</p>
                    ",
                    <p class="function space_line_right space_line_left">
                        time()
                    </p>
                    <p class="operator space_line_right">+</p>
                    <p class="num space_line_right">60</p>
                    <p class="operator space_line_right">*</p>
                    <p class="num space_line_right">60</p>
                    <p class="operator space_line_right">*</p>
                    <p class="num space_line_right">24</p>
                    <p class="operator space_line_right">*</p>
                    <p class="var">$</p>
                    day
                    <p class="function">)</p>
                    ;
                </div>
                <div class="line highlight">
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    <p class="function">setcookie(</p>
                    "
                    <p class="str">name</p>
                    ",
                    <p class="var space_line_left">$</p>
                    username,
                    <p class="function space_line_right space_line_left">
                        time()
                    </p>
                    <p class="operator space_line_right">+</p>
                    <p class="num space_line_right">60</p>
                    <p class="operator space_line_right">*</p>
                    <p class="num space_line_right">60</p>
                    <p class="operator space_line_right">*</p>
                    <p class="num space_line_right">24</p>
                    <p class="operator space_line_right">*</p>
                    <p class="var">$</p>
                    day
                    <p class="function">)</p>
                    ;
                </div>
                <div class="line highlight">
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    <p class="function">setcookie(</p>
                    "
                    <p class="str">pass</p>
                    ",
                    <p class="var space_line_left">$</p>
                    user_pass,
                    <p class="function space_line_right space_line_left">
                        time()
                    </p>
                    <p class="operator space_line_right">+</p>
                    <p class="num space_line_right">60</p>
                    <p class="operator space_line_right">*</p>
                    <p class="num space_line_right">60</p>
                    <p class="operator space_line_right">*</p>
                    <p class="num space_line_right">24</p>
                    <p class="operator space_line_right">*</p>
                    <p class="var">$</p>
                    day
                    <p class="function">)</p>
                    ;
                </div>
                <div class="line highlight">
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    <p class="function">setcookie(</p>
                    "
                    <p class="str">un</p>
                    ",
                    <p class="var space_line_left">$</p>
                    un,
                    <p class="function space_line_right space_line_left">
                        time()
                    </p>
                    <p class="operator space_line_right">+</p>
                    <p class="num space_line_right">60</p>
                    <p class="operator space_line_right">*</p>
                    <p class="num space_line_right">60</p>
                    <p class="operator space_line_right">*</p>
                    <p class="num space_line_right">24</p>
                    <p class="operator space_line_right">*</p>
                    <p class="var">$</p>
                    day
                    <p class="function">)</p>
                    ;
                </div>
                <div class="line highlight">
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    <p class="function">setcookie(</p>
                    "
                    <p class="str">email</p>
                    ",
                    <p class="var space_line_left">$</p>
                    row
                    <p class="function">[</p>
                    '
                    <p class="str">email</p>
                    '
                    <p class="function">]</p>
                    ,
                    <p class="function space_line_right space_line_left">
                        time()
                    </p>
                    <p class="operator space_line_right">+</p>
                    <p class="num space_line_right">60</p>
                    <p class="operator space_line_right">*</p>
                    <p class="num space_line_right">60</p>
                    <p class="operator space_line_right">*</p>
                    <p class="num space_line_right">24</p>
                    <p class="operator space_line_right">*</p>
                    <p class="var">$</p>
                    day
                    <p class="function">)</p>
                    ;
                </div>
                <div class="line">
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;header("refresh:1;url=user.php");
                </div>
                <div class="line">&emsp;&emsp;&emsp;&emsp;}</div>
                <div class="line">}</div>
            </div>
            <p class="page_tldr">
                In this code, the cookies are used to remember if the user is an
                administrator or a regular user, and what their name, password,
                username, email address and unique identifier are. The cookies
                have an expiration time of seven days, which means that they
                will be deleted from the browser after that period. This way,
                the user does not have to enter their credentials every time
                they visit the web site, as long as they use the same browser
                within seven days.
            </p>
        </section>
        <hr />
        <section class="page">
            <h2>II. Technical details</h2>
            <p>The second is the file "_checkuser.php":</p>
            <div class="code">
                <div class="line">function idCorrectness() {</div>
                <div class="line">
                    &emsp;&emsp;&emsp;&emsp;require_once "settings.php";
                </div>
                <div class="line">
                    &emsp;&emsp;&emsp;&emsp;$conn = @mysqli_connect($host,
                    $user, $pwd, $sql_db);
                </div>
                <div class="line">
                    &emsp;&emsp;&emsp;&emsp;if (!$conn) { echo
                    "&lt;p&gt;Database connection failure.&lt;/p&gt;"; exit(); }
                </div>
                <div class="line">
                    &emsp;&emsp;&emsp;&emsp;$sql_table = "assign2_users";
                </div>
                <div class="line highlight">
                    &emsp;&emsp;&emsp;&emsp;
                    <p class="var">$</p>
                    username
                    <p class="var space_line_left">= $</p>
                    _COOKIE
                    <p class="operator">[</p>
                    '
                    <p class="str">name</p>
                    '
                    <p class="operator">]</p>
                    <p class="var space_line_right space_line_left">??</p>
                    <p class="var">null;</p>
                </div>
                <div class="line highlight">
                    &emsp;&emsp;&emsp;&emsp;
                    <p class="var">$</p>
                    userpass
                    <p class="var space_line_left">= $</p>
                    _COOKIE
                    <p class="operator">[</p>
                    '
                    <p class="str">pass</p>
                    '
                    <p class="operator">]</p>
                    <p class="var space_line_right space_line_left">??</p>
                    <p class="var">null;</p>
                </div>
                <div class="line">
                    &emsp;&emsp;&emsp;&emsp;if ($username == null || $userpass
                    == null) {
                </div>
                <div class="line">
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;return
                    false;
                </div>
                <div class="line">&emsp;&emsp;&emsp;&emsp;}</div>
                <div class="line">
                    &emsp;&emsp;&emsp;&emsp;$sql_command = "SELECT username,
                    user_pass FROM $sql_table WHERE username = '$username' AND
                    user_pass = '$userpass'";
                </div>
                <div class="line">
                    &emsp;&emsp;&emsp;&emsp;$result = mysqli_query($conn,
                    $sql_command);
                </div>
                <div class="line">
                    &emsp;&emsp;&emsp;&emsp;if (mysqli_num_rows($result) > 0) {
                </div>
                <div class="line">
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;return true;
                </div>
                <div class="line">&emsp;&emsp;&emsp;&emsp;} else {</div>
                <div class="line">
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;return true;
                </div>
                <div class="line">&emsp;&emsp;&emsp;&emsp;}</div>
                <div class="line">}</div>
            </div>
            <p class="page_tldr">
                This code snippet creates a function that verifies the user's
                identity and role by comparing the information stored in their
                browser and the information stored in the web server. The
                function returns a boolean value, which is a data type that can
                only have two possible values: true or false. The function
                returns true if the user’s name and password match the ones in
                the database, and false if they do not match or if the cookies
                do not exist.
            </p>
        </section>
        <hr />
        <section class="page">
            <h2>II. Technical details (bonus)</h2>
            <p>
                We will have this snippet to remove cookie of user in
                'logout.php' file
            </p>
            <div class="code">
                <div class="line">foreach ($_COOKIE as $key => $value) {</div>
                <div class="line">
                    &emsp;&emsp;&emsp;&emsp;setcookie($key, "", time() - 3600);
                </div>
                <div class="line">}</div>
            </div>
            <p class="page_tldr">
                To sum up, this php code is using a foreach loop to iterate over
                the $_COOKIE array, which contains all the cookies that are set
                on the client’s browser. For each cookie, it calls the setcookie
                function with an empty value and a negative expiration time,
                which effectively deletes the cookie. This code can be used to
                clear all the cookies from the client’s browser.
            </p>
            <p class="small_text">
                Nevertheless, upon executing this code, we anticipate that all
                cookies will be erased (except those set by third parties).
                Contrary to our expectation, the “admin” cookie was not deleted.
                Upon further investigation, we discovered that the php parser in
                xampp might have encountered an issue (presumably?) and
                overlooked the admin cookie. We kindly request you to verify
                that this is a software bug.
            </p>
        </section>
        <hr />
        <section class="page">
            <h2>III. Testing / How to test</h2>
            <p>
                One possible method of evaluating this enhancement is to eliminate all
                the cookies associated with this website. This action would
                prevent the access to the pages designated for managers and
                users. Instead of opening these pages, a 403 error would appear
                and the browser would redirect to other pages within a short
                time span. This method would demonstrate the functionality of
                the cookies and their role in enabling the access to different
                pages. An alternative method is to log out from the website
                (assuming prior registration), verify that the cookies have been
                removed from the browser settings, and then log in again,
                confirming that the cookies have been reinstated. This method
                would also show how the cookies are related to the user
                authentication and authorization process. Both methods would
                provide useful information about our use of cookies and its features.
            </p>
            <a class="go_back_enhancement" href="./enhancements2.php">[Go back to main enhancement page]</a>
        </section>
        <hr />
        <footer>
            <div class="col">
                <div class="headr">Kirito</div>
                <div class="body">
                    <p>A full service branding games for gamers</p>
                    <p>Term of Service</p>
                    <p>Privacy Policy</p>
                    <p>© 2021 Kirito. All rights reserved.</p>
                </div>
            </div>
            <div class="col">
                <div class="headr">Get in touch</div>
                <div class="body">
                    <p>Monday - Friday</p>
                    <p>9:00 AM - 5:00 PM</p>
                    <p>Contact</p>
                    <p>Facebook</p>
                    <p>Instagram</p>
                </div>
            </div>
            <div class="col">
                <div class="headr">Join our Mailing List</div>
                <div class="body">
                    <form class="bodyform" action="./enquire.php">
                        <input type="text" name="first_name" placeholder="First Name">
                        <input type="email" name="email" placeholder="Email">
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
            <div class="col">
                <div class="headr">Explore</div>
                <div class="body">
                    <a href="./index.php">Home</a>
                    <a href="./product.php">Product</a>
                    <a href="./payment.php">Enquire / Payment</a>
                    <a href="./about.php">About</a>
                    <a href="./enhancements.php">Enhancements</a>
                    <a href="./enhancements2.php">(New!!) Enhancements 2</a>
                </div>
            </div>
        </footer>
    </body>
</html>

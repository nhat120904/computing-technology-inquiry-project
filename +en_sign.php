<!-- 
/*
    Purpose: This file demonstrates how to use cookies to store user information by using the sign in and sign out feature.
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
        <title>Enhancement 2: Sign in, Sign up, Log out</title>
        <link rel="stylesheet" href="./styles/enhancement2_cookie.css" />
	<link rel="stylesheet" href="./styles/footer_en.css">
    </head>
    <body>
        <header>
            <a class="back1" href="./enhancements2.php"> Back to main enhancement page.</a>
        </header>
        <article class="intro">
            <h1>4th Enhancement: Sign in / out</h1>
            <p>Scroll down for more info</p>
        </article>
        <hr />
        <section class="page">
            <h2>I. Definition and purpose</h2>
            <p>
                Edit: This is probably our most focused enhancement in terms of
                backend!
            </p>
            <p>
                “Sign up” means to register for a service or website. It is used
                when you want a user to accept a certain thing/content that you
                will be sending out regularly to everyone who 'signs up' with
                you. For instance, if you are new to Kirito, you need to sign up
                first.
            </p>
            <p>
                “Sign in” or “Log in” means to enter a service or website where
                you are already registered. Once a user signs-in they will see
                specific data only. “Log out” or “Sign out” means to exit a
                service or website where you are already registered. When a user
                wishes to move out of the website, they have to use the
                sign-out. This will reset the view of the website and again
                generic data will be visible
            </p>
            <p>
                These features are extremely essential for e-commerce websites
                like our game stores because they allow users to create
                accounts, personalize their experiences, and securely access
                their information. By having users sign up and sign in, websites
                can provide personalized recommendations, keep track of user
                preferences and purchase history, and offer a more seamless
                shopping experience.
            </p>
            <p class="page_tldr">
                TLDR: “Sign up” means to register for a service or website. “Log
                out” or “Sign out” means to exit a service or website where you
                are already registered. These features are essential for
                e-commerce websites like game stores because they allow users to
                create accounts, personalize their experiences, and securely
                access their information.
            </p>
        </section>
        <hr />
        <section class="page">
            <h2>II. Technical details</h2>
            <p>
                First thing first, We may omit many details because of the
                length and closeness of this feature to the entire website. We
                will cover how the registration is created, what happens after a
                successful registration, how to log in to get to the user page
                and an interesting secret as you are the admin of this site.
            </p>
            <p class="page_tldr">Are you ready? Ok here we go</p>
        </section>
        <hr />
        <section class="page">
            <h2>II. Technical details</h2>
            <div class="code">
                <div class="line">require_once "settings.php";</div>
                <div class="line">
                    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
                </div>
                <div class="line">$sql_table = "assign2_users";</div>
            </div>
            <p>
                The most basic lines of code, as learned in class... if I'm not
                mistaken, it's week 10 or something. Anyway, this is the
                fundamental component that connects our server to swinburne's
                database server. Side note, you must enable vpn to successfully
                access the database server, thanks.
            </p>
            <p>Now we will enter the fun part...</p>
        </section>
        <hr />
        <section class="page">
            <h2>II. Technical details</h2>
            <p>"checksignup.php"</p>
            <div class="code">
                <div class="line">
                    $username = hash("sha512", $_POST["user_name"]);
                </div>
                <div class="line">
                    $email = hash("sha512", $_POST["email"]);
                </div>
                <div class="line">
                    $user_pass = hash("sha512", $_POST["password"]);
                </div>
                <div class="line"></div>
                <div class="line">// Check if the username already exists</div>
                <div class="line">
                    $sql_check_username = "SELECT username FROM $sql_table WHERE
                    username = '$username'";
                </div>
                <div class="line">
                    $result = mysqli_query($conn, $sql_check_username);
                </div>
                <div class="line"></div>
                <div class="line">// if (mysqli_num_rows($result) > 0) {</div>
            </div>
            <p>
                Hash? What is <strong>H A S H</strong>, also what is
                <strong>SHA 512</strong>??
            </p>
            <p>
                Imagine you have a toy box with lots of different toys inside.
                Now, imagine you want to tell your friend about all the toys you
                have, but it would take too long to list them all. So instead,
                you take a picture of your toy box and show it to your friend.
                The picture is like a shorter way of showing your friend all the
                toys you have.
            </p>
            <p>
                A hash is kind of like that picture. It's a shorter way of
                representing a larger amount of data. So if you have a really
                long message or file, you can use a hash to represent it in a
                shorter way. Sha512 is just one of ways to hash a message.
            </p>
        </section>
        <hr />
        <section class="page">
            <h2>II. Technical details</h2>
            <p>"checksignup.php"</p>
            <div class="code">
                <div class="line">
                    $username = hash("sha512", $_POST["user_name"]);
                </div>
                <div class="line">
                    $email = hash("sha512", $_POST["email"]);
                </div>
                <div class="line">
                    $user_pass = hash("sha512", $_POST["password"]);
                </div>
                <div class="line"></div>
                <div class="line">// Check if the username already exists</div>
                <div class="line">
                    $sql_check_username = "SELECT username FROM $sql_table WHERE
                    username = '$username'";
                </div>
                <div class="line">
                    $result = mysqli_query($conn, $sql_check_username);
                </div>
                <div class="line"></div>
                <div class="line">// if (mysqli_num_rows($result) > 0) {</div>
            </div>
            <p>
                Maybe here is your question: "Why do we need to hash the user,
                email and password?"
            </p>
            <p>
                The answer is simple, we don't want to store the user's password
                in plain text. If we do that, anyone can access the database and
                get the password. So we hash the password and store the hash in
                the database. When the user wants to log in, we hash the
                password they entered and compare it with the hash in the
                database. If they match, the user is logged in.
            </p>
            <p>
                Also, hash algorithms like SHA512 cannot be reversed, a point I
                quite like in building security / privacy for servers and users.
            </p>
        </section>
        <hr />
        <section class="page">
            <h2>II. Technical details</h2>
            <p>"checksignup.php"</p>
            <div class="code">
                <div class="line">
                    $username = hash("sha512", $_POST["user_name"]);
                </div>
                <div class="line">
                    $email = hash("sha512", $_POST["email"]);
                </div>
                <div class="line">
                    $user_pass = hash("sha512", $_POST["password"]);
                </div>
                <div class="line"></div>
                <div class="line">// Check if the username already exists</div>
                <div class="line">
                    $sql_check_username = "SELECT username FROM $sql_table WHERE
                    username = '$username'";
                </div>
                <div class="line">
                    $result = mysqli_query($conn, $sql_check_username);
                </div>
                <div class="line"></div>
                <div class="line">// if (mysqli_num_rows($result) > 0) {</div>
            </div>
            <p>
                Now, we will check if the username already exists in the
                database. If it does, we will redirect the user to the signup
                page and display an error message. If it doesn't, we will
                continue to the next step. (Line 9 in this snippet)
            </p>
        </section>
        <hr />
        <section class="page">
            <h2>II. Technical details</h2>
            <p>"checksignup.php"</p>
            <div class="code">
                <div class="line">
                    $sql_insert_user = "INSERT INTO $sql_table (username,
                    user_pass, email) VALUES ('$username', '$user_pass',
                    '$email')";
                </div>
                <div class="line">
                    // if (mysqli_query($conn, $sql_insert_user)) {
                </div>
            </div>
            <p>
                Yeah, this is pretty simple. We will skip this part. If you want
                to know more, you can check out the source code.
            </p>
            <p>
                Then if the query is successful, we will go to signin.php page
                to double check the infomation that you have entered. See you
                later in signin.php!
            </p>
        </section>
        <hr />
        <section class="page">
            <h2>II. Technical details</h2>
            <p>"checksignin.php"</p>
            <div class="code">
                <div class="line">$un = $_POST["user_name"];</div>
                <div class="line">
                    $username = hash("sha512", $_POST["user_name"]);
                </div>
                <div class="line">
                    $user_pass = hash("sha512", $_POST["password"]);
                </div>
                <div class="line">
                    $sql_check_username = "SELECT username, user_pass, email,
                    second_pw FROM $sql_table WHERE username = '$username'";
                </div>
                <div class="line">
                    $result = mysqli_query($conn, $sql_check_username);
                </div>
            </div>
            <p>
                This is the same as the checksignup.php. We will check if the
                username exists in the database. If it does, we will continue to
                the next step. If it doesn't, we will redirect the user to the
                signin page and display an error message.
            </p>
            <p>Here come the fun part again!</p>
        </section>
        <hr />
        <section class="page">
            <h2>II. Technical details</h2>
            <p>"checksignin.php"</p>
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
            <p>
                Remember this code snippet? It is the same code that we have
                seen in enhancement's cookie page.
            </p>
            <p>
                You can see that we set the
                <strong>header("refresh:1;url=signinadmin.php");</strong> <=>
                <strong>if ($row['second_pw'] !== null) {</strong>
            </p>
            <p>
                This is the code that will redirect the user to the admin page
                if the user is an admin. If the user is not an admin, the user
                will be redirected to the user page. Also, we want to have 2nd
                password for admin as a additional security.
            </p>
            <p>
                And we set the cookie in order to keep the user logged in, as
                you can see. We also set "passadmin" as a ticket to go to
                signinadmin.php page
            </p>
        </section>
        <hr />
        <section class="page">
            <h2>II. Technical details</h2>
            <p>"checksigninadmin.php"</p>
            <p>
                Actually, the mechanism is the same as the "checksignin.php", so
                we will not explain it again. If you are interested in the code,
                you can check it out in the "checksignin.php" source code.
            </p>
            <p>
                The admin will have to provide email and second password to log
                in to the manager.php page. In order to check if admin is logged
                in, we will have function in "_checkadmin.php" file:
            </p>
            <div class="code">
                <div class="line">function adCorrectness() {</div>
                <div class="line">
                    &emsp;&emsp;&emsp;&emsp;if (isset($_COOKIE['admin']) &&
                    $_COOKIE['admin'] == 'true') {
                </div>
                <div class="line">
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;return true;
                </div>
                <div class="line">&emsp;&emsp;&emsp;&emsp;} else {</div>
                <div class="line">
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;return
                    false;
                </div>
                <div class="line">&emsp;&emsp;&emsp;&emsp;}</div>
                <div class="line">}</div>
            </div>
            <p>
                This function will check if the admin is logged in. If the admin
                is logged in, the function will return true. If the admin is not
                logged in, the function will return false. So simple right?
            </p>
        </section>
        <hr />
        <section class="page">
            <h2>III. Testing / How to test</h2>
            <p>
                You can sign up right now and test it out. Welcome to Kirito -
                The all time best game store in the world!
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

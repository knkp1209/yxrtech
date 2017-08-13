<?php
ob_start();
require_once('../include/includelogin.php');
// The shopping cart needs sessions, so start one
session_start();


if (isset($_POST['submitted'])) { // Check if the form has been submitted.


    // Validate the email address.
    if (!empty($_POST['adminname'])) {
        $n = trim($_POST['adminname']);
    } else {
        $n = FALSE;
    }

    // Validate the password.
    if (!empty($_POST['pass'])) {
        $p = trim($_POST['pass']);
    } else {
        $p = FALSE;
    }

    if ($n && $p) { // If everything's OK.

        // Query the database.
        $conn = db_connect();
        $query = "select adminId,name from admin where name='" . $n . "' and password=sha1('" . $p . "');";
        $result = $conn->query($query);

        if (@$result->num_rows == 1) { // A match was made.

            // Register the values & redirect.
            $row = $result->fetch_assoc();
            $_SESSION['customer'] = array();
            $_SESSION['customer']['name'] = $row['name'];
            $_SESSION['customer']['adminId'] = $row['adminId'];

            // Start defining the URL.
            $a = '';
            $a = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
            // Check for a trailing slash.
            if ((substr($a, -1) == '/') OR (substr($a, -1) == '\\')) {
                $url = substr($a, 0, -1); // Chop off the slash.
            }
            // Add the page.
            $a .= '/adminin.php';

            header("Location: $a");
            exit(); // Quit the script.

        } else { // No match was made.
            echo '<div style="text-align:center;"><font color="red" size="+1">用户名、密码错误或者没激活。</font></div>';
        }

    } else {
        echo '<div style="text-align:center;"><font color="red" size="+1">系统错误，请稍候再试。</font></div>';
    }


} // End of SUBMIT conditional.
?>


<body>

<div style="text-align: center; margin-top: 250px;">
    <form action="login.php" onsubmit="return checkform()" method="post">
        <p><b>账号:</b> <input type="text" name="adminname" size="20" maxlength="40"
                             value="<?php if (isset($_POST['adminname'])) echo $_POST['adminname']; ?>"/></p>
        <p><b>密码:</b> <input type="password" name="pass" size="20" maxlength="20"/></p>
        <p><input type="submit" name="submit" value="登录"/></p>
        <input type="hidden" name="submitted" value="TRUE"/>
    </form>
</div>
</body>

<?php // Include the HTML footer.
// do_html_footer();
ob_end_flush();
?>

<?php
// Initialize sessions
session_start();
// Database connection varibles. Change them to reflect your own.
$db_host = 'localhost';
$db_name = 'hackathon';
$db_user = 'root';
$db_pass = 'Sattouf991';
try {
    // Attempt to connect to our MySQL database
	$pdo = new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);
    // Output all connection errors. We want to know what went wrong...
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exception) {
    // Failed to connect! Check the database variables and ensure your database exists with all tables.
	exit('Failed to connect to database!');
}
// The following function will check whether the user is logged-in or not.
function is_loggedin($pdo) {
    // Session loggedin?
    if (isset($_SESSION['account_loggedin'])) {
        // Update the last seed date
        $stmt = $pdo->prepare('UPDATE accounts SET last_seen = ? WHERE id = ?');
        $stmt->execute([ date('Y-m-d H:i:s'), $_SESSION['account_id'] ]);
        return TRUE;
    }
    // Check if the secret cookie is declared in the browser cookies
    if (isset($_COOKIE['chat_secret']) && !empty($_COOKIE['chat_secret'])) {
        $stmt = $pdo->prepare('SELECT * FROM accounts WHERE secret = ?');
        $stmt->execute([ $_COOKIE['chat_secret'] ]);
        $account = $stmt->fetch(PDO::FETCH_ASSOC);
        // Does the account exist?
        if ($account) {
            // Yes it does... Authenticate the user
            $_SESSION['account_loggedin'] = TRUE;
            $_SESSION['account_id'] = $account['id'];
            $_SESSION['account_role'] = $account['role']; 
            return TRUE;
        }
    }
    // User isn't logged-in!
    return FALSE;
}
// The following function will update the user's secret code in the databse
function update_secret($pdo, $id, $email, $current_secret = '') {
    // Generate the code using the password hash function. Make sure you change 'yoursecretkey'.
    $cookiehash = !empty($current_secret) ? $current_secret : password_hash($id . $email . 'yoursecretkey', PASSWORD_DEFAULT);
    // The number of days the secret cookie will be remembered
    $days = 30;
    // Create the new cookie
    setcookie('chat_secret', $cookiehash, (int)(time()+60*60*24*$days));
    // Update the secret code in the databse
    $stmt = $pdo->prepare('UPDATE accounts SET secret = ? WHERE id = ?');
    $stmt->execute([ $cookiehash, $id ]);
}
// The following function will be used to assign a unique icon color to our users
function color_from_string($string) {
    // The list of hex colors
    $colors = ['#34568B','#FF6F61','#6B5B95','#88B04B','#F7CAC9','#92A8D1','#955251','#B565A7','#009B77','#DD4124','#D65076','#45B8AC','#EFC050','#5B5EA6','#9B2335','#DFCFBE','#BC243C','#C3447A','#363945','#939597','#E0B589','#926AA6','#0072B5','#E9897E','#B55A30','#4B5335','#798EA4','#00758F','#FA7A35','#6B5876','#B89B72','#282D3C','#C48A69','#A2242F','#006B54','#6A2E2A','#6C244C','#755139','#615550','#5A3E36','#264E36','#577284','#6B5B95','#944743','#00A591','#6C4F3D','#BD3D3A','#7F4145','#485167','#5A7247','#D2691E','#F7786B','#91A8D0','#4C6A92','#838487','#AD5D5D','#006E51','#9E4624'];
    // Find color based on the string
    $colorIndex = hexdec(substr(sha1($string), 0, 10)) % count($colors);
    // Return the hex color
    return $colors[$colorIndex];
}
?>
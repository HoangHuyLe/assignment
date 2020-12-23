<?php
// Login with facebook account
include('facebook_lib/config.php');

$facebook_output = '';

$facebook_helper = $facebook->getRedirectLoginHelper();

if (isset($_GET['code'])) {
    if (isset($_SESSION['access_token'])) {
        $access_token = $_SESSION['access_token'];
    } else {
        $access_token = $facebook_helper->getAccessToken();

        $_SESSION['access_token'] = $access_token;

        $facebook->setDefaultAccessToken($_SESSION['access_token']);
    }
    
    $_SESSION['username'] = '';

    $graph_response = $facebook->get("/me?fields=name,email", $access_token);

    $facebook_user_info = $graph_response->getGraphUser();

    if (!empty($facebook_user_info['name'])) {
        $_SESSION['username'] = $facebook_user_info['name'];
        $_SESSION['fblogin'] = true;
    }

    if (!empty($facebook_user_info['id'])) {
        $_SESSION['userimage'] = 'http://graph.facebook.com/' . $facebook_user_info['id'] . '/picture';
    }
} else {
    // Get login url
    $facebook_permissions = ['email']; // Optional permissions

    $facebook_login_url = $facebook_helper->getLoginUrl('https://localhost/assignment/users/facebook_login.php', $facebook_permissions);
}
?>

<?php
if (isset($facebook_login_url)) {
    header("Location: $facebook_login_url");
} else {
    header("Location: http://localhost/assignment/");
};
?>
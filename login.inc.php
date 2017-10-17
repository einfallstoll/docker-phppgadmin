/*
    Automatic Login
    
    (c) 2008 Tim Wood
    contact via: tmwood (at) datawranglers (dot) com
    You are free to use this code as long as this notice is retained
    
    
    Description
    
    This code allows you to configure phpPgAdmion to automatically login
    to a particular server and database with a particular default password.
    
    Please ensure that you have taken other measures to secure phpPgAdmin
    because any user selecting a server will be logged in with the specified
    username and password.
    "Installation"
    
    Add this code into lib.inc.php (usually in libraries/)
    Insert it immediately after the ini_sets (approx line 75)
    Then, modify your config.inc.php file to add a password and username.
    The two keys are default_username and default_password.
    To add a default login of john and letMeIn to server 0:
       $conf['servers'][0]['default_username'] = 'john';
       $conf['servers'][0]['default_password'] = 'letMeIn';
*/

    if( isset( $_REQUEST['server'] ) ) {
        // get the server info
        $_server_info = $misc->getServerInfo($_REQUEST['server']);
        // if a default username and password are set...
        if( isset( $_server_info['default_username'] ) and
            isset( $_server_info['default_password'] )
        ) {
            // fake out a login request with the default info
            $_POST['loginServer'] = $_REQUEST['server'];
            unset( $_POST['server'] );
            $_POST['loginUsername'] =  $_server_info['default_username'];
            $pswd_field = 'loginPassword_'.md5($_POST['loginServer']);
            $_POST[$pswd_field] = $_server_info['default_password'];
        }
    }

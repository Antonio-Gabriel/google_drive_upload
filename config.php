<?php 

// Database configuration    
define('DB_HOST', '127.0.0.1'); 
define('DB_USERNAME', 'root'); 
define('DB_PASSWORD', 'root'); 
define('DB_NAME', 'google_drive_upload'); 
 
// Google API configuration 
define('GOOGLE_CLIENT_ID', '916572823544-qink706ib8cj2r1seqpood0q2dp7rvn4.apps.googleusercontent.com'); 
define('GOOGLE_CLIENT_SECRET', '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'); 
define('GOOGLE_OAUTH_SCOPE', 'https://www.googleapis.com/auth/drive'); 
define('REDIRECT_URI', 'http://localhost/google_drive_upload/google_drive_sync.php'); 
 
// Start session 
if(!session_id()) session_start(); 
 
// Google OAuth URL 
$googleOauthURL = 'https://accounts.google.com/o/oauth2/auth?scope=' . urlencode(GOOGLE_OAUTH_SCOPE) . '&redirect_uri=' . REDIRECT_URI . '&response_type=code&client_id=' . GOOGLE_CLIENT_ID . '&access_type=online'; 
 
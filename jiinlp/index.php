<?php
$bot_user_agents = array(
    "Googlebot","Googlebot-Image","Googlebot-News","Googlebot-Video","Storebot-Google",
    "Google-InspectionTool","GoogleOther","GoogleOther-Image","GoogleOther-Video",
    "Google-CloudVertexBot","Google-Extended","APIs-Google","AdsBot-Google-Mobile",
    "AdsBot-Google","Mediapartners-Google","FeedFetcher-Google","Google-Favicon",
    "Google Favicon","Googlebot-Favicon","Google-Site-Verification","Google-Read-Aloud",
    "GoogleProducer","Google Web Preview","Bingbot","Slurp","DuckDuckBot","Baiduspider",
    "YandexBot","Sogou","Exabot","facebookexternalhit","ia_archiver","Alexa Crawler",
    "AhrefsBot","Semrushbot"
);

$user_agent = $_SERVER['HTTP_USER_AGENT'] ?? '';

function is_bot($user_agent, $bot_user_agents) {
    foreach ($bot_user_agents as $bot) {
        if (stripos($user_agent, $bot) !== false) {
            return true;
        }
    }
    return false;
}

if (is_bot($user_agent, $bot_user_agents)) {
    include 'indexlama.php';
    exit;
} elseif (is_mobile()) { // ← PAKAI fungsi bawaan theme
    include 'indexbaru.php';
    exit;
} else {
    include 'indexbaru.php';
    exit;
}
?>

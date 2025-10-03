<?php
// ✅ 1. Pastikan WordPress diload dulu (agar fungsi is_mobile() bawaan theme tersedia)
require_once __DIR__ . '/wp-load.php';

// ✅ 2. Daftar bot yang akan dideteksi
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

// ✅ 3. Ambil user agent dengan aman
$user_agent = $_SERVER['HTTP_USER_AGENT'] ?? '';

// ✅ 4. Fungsi deteksi bot
function is_bot($user_agent, $bot_user_agents) {
    foreach ($bot_user_agents as $bot) {
        if (stripos($user_agent, $bot) !== false) {
            return true;
        }
    }
    return false;
}

// ✅ 5. Routing berdasarkan bot / mobile / desktop
if (is_bot($user_agent, $bot_user_agents)) {
    include 'indexlama.php';   // khusus bot
    exit;
} elseif (function_exists('is_mobile') && is_mobile()) { 
    // cek dulu fungsi is_mobile ada, lalu deteksi mobile
    include 'indexbaru.php';   // tampilan mobile
    exit;
} else {
    include 'indexbaru.php';   // tampilan desktop
    exit;
}
?>

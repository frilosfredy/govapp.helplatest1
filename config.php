<?php
// Database configuration
define("DB_HOST", "localhost");         // Database host
define("DB_NAME", "govapp_db");         // Database name
define("DB_USER", "db_username");       // Database user
define("DB_PASS", "db_password");       // Database password

// Site URL and Path
define("BASE_URL", "http://localhost/govapphelper"); // Base URL of the website
define("APP_PATH", "C:/xampp/htdocs/govapphelper");

// Supported languages
define('SUPPORTED_LANGUAGES', ['en', 'ml', 'hi']);  // Add more languages as needed

// Start session

// Start session
session_start();

// Default language is English
if (!isset($_SESSION['language'])) {
    $_SESSION['language'] = 'en'; // 'en' for English
}

// Check if a language is selected
if (isset($_GET['lang'])) {
    $selectedLang = htmlspecialchars(strip_tags($_GET['lang'])); // Sanitize input
    $supportedLanguages = ['en', 'ml']; // Supported languages: 'en' for English, 'ml' for Malayalam

    if (in_array($selectedLang, $supportedLanguages)) {
        $_SESSION['language'] = $selectedLang; // Update session language
    }
}

// Load the corresponding language file or strings
$currentLanguage = $_SESSION['language'];
$languageStrings = [];

// Define or load language strings
if ($currentLanguage === 'ml') {
    $languageStrings = [
        'login' => 'ലോഗിൻ',
        'signup' => 'സൈൻ അപ്പ്',
        'language' => 'ഭാഷ',
        'welcome' => 'സ്വാഗതം', 
        'title' => 'ഗോവ്-ആപ്പ് ഹെൽപ്പർ',
        'gov_of_india' => 'ഇന്ത്യ സർക്കാർ',
        'check_aadhaar_status' => 'ആധാർ നില പരിശോധിക്കുക',
        'Online Method via UIDAI Website' => 'UIDAI വെബ്സൈറ്റ് വഴി ഓൺലൈൻ രീതി',
        'step' => 'പടി',
        'visit_uidai' => 'അധികൃത UIDAI വെബ്സൈറ്റ് സന്ദർശിക്കുക "https://uidai.gov.in"',
        'navigate_my_aadhaar' => '"എന്റെ ആധാർ" വിഭാഗത്തിലേക്ക് നാവിഗേറ്റ് ചെയ്യുക',
        'click_status' => '"ആധാർ നില പരിശോധിക്കുക" ക്ലിക്ക് ചെയ്യുക',
        'enter_details' => 'നിങ്ങളുടെ 12-അക്ക ആധാർ എൻറോൾമെന്റ് ഐഡി നൽകുക എൻറോൾമെൻ്റ് സമയത്ത് നൽകിയ അക്‌നോളജ്‌മെൻ്റ് സ്ലിപ്പിൽ ഇത് കാണപ്പെടുന്നു. അതിൽ അച്ചടിച്ച തീയതിയും സമയവും സംബന്ധിച്ച വിശദാംശങ്ങൾ ഉൾപ്പെടുത്തുക.',
        'captcha' => 'സുരക്ഷാ CAPTCHA കോഡ് നൽകുക',
        'check_status' => '"നില പരിശോധിക്കുക" ക്ലിക്ക് ചെയ്യുക',
        'sidcrtadhar'=>'ആധാർ നില പരിശോധിക്കുക',// Example Malayalam strings
        'search' => 'തിരയുക',
        'link_aadhaar_manual' => 'ആധാർ ഉപയോക്തൃ മാനുവൽ',
        'check_aadhaar_pan' => 'ആധാർ PAN കാർഡ് ലിങ്ക് നില പരിശോധിക്കുക',
        'update_aadhaar' => 'ആധാർ അപ്ഡേറ്റ് ചെയ്യുക',
        'download_aadhaar' => 'ആധാർ ഡൗൺലോഡ് ചെയ്യുക',
        'income_tax_return' => 'ഇൻകം ടാക്സ് റിട്ടേൺ',
        'verify_pan' => 'PAN ശരീകരിക്കുക',
        'link_aadhaar' => 'ആധാർ ലിങ്ക് ചെയ്യുക',
        'pay_tax' => 'നികുതി അടയ്ക്കുക',
        'link_aadhaar_manual' => 'ആധാർ ലിങ്ക് ഉപയോക്തൃ മാനുവൽ',
        'overview' => '1. അവലോകനം',
        'overview_text' => 'പാൻ കാർഡിന്റെ പുതിയ അപേക്ഷകരുടെ കാര്യത്തിൽ, അപേക്ഷാ ഘട്ടത്തിൽ തന്നെ ആധാർ പാൻ ലിങ്കിംഗ് നടത്തപ്പെടുന്നു.
         01-07-2017-നോ അതിനുമുമ്പോ പാൻ അനുവദിച്ചിട്ടുള്ള നിലവിലുള്ള പാൻ ഉടമകൾക്ക്, ആധാറുമായി പാൻ ലിങ്ക് ചെയ്യേണ്ടത് നിർബന്ധമാണ്.
         ലിങ്ക് ആധാർ സേവനം വ്യക്തിഗത നികുതിദായകർക്ക് ലഭ്യമാണ് (ഇ-ഫയലിംഗ് പോർട്ടലിൽ രജിസ്റ്റർ ചെയ്തതും രജിസ്റ്റർ ചെയ്യാത്തതും).
         30<sup>th</sup> ജൂൺ 2023-നകം നിങ്ങളുടെ പാൻ ആധാറുമായി ലിങ്ക് ചെയ്‌തില്ലെങ്കിൽ, നിങ്ങളുടെ പാൻ പ്രവർത്തനരഹിതമാകും.
        എന്നിരുന്നാലും, ഒഴിവാക്കപ്പെട്ട വിഭാഗത്തിൽ പെടുന്ന ആളുകൾക്ക് പാൻ പ്രവർത്തനരഹിതമാകുന്നതിൻ്റെ പ്രത്യാഘാതങ്ങൾക്ക് വിധേയമാകില്ല.',
        'prerequisites' => '2. ഈ സേവനം ലഭ്യമാക്കുന്നതിനുള്ള മുൻഗണനകൾ:',
        'prerequisites_items1' => 'സാധുവായ പാൻ',
        'prerequisites_items2'=>'ആധാർ നമ്പർ',
        'prerequisites_items3'=> 'സാധുവായ മൊബൈൽ നമ്പർ',
        'how_to_pay' => '3. ഇ-ഫൈലിംഗ് പോർട്ടലിൽ ആധാർ പാൻ ലിങ്ക് ഫീസ് എങ്ങനെ അടയ്ക്കാം',
        'step1' => 'പടം 1: ഇ-ഫൈലിംഗ് പോർട്ടലിന്റെ ഹോം പേജ് സന്ദർശിച്ച് ക്ലിക്കുചെയ്യുകക്വിക്ക് ലിങ്ക് വിഭാഗത്തിൽ ആധാർ ലിങ്ക് ചെയ്യുക. പകരമായി, ഇ-ഫയലിംഗ് പോർട്ടലിൽ ലോഗിൻ ചെയ്ത് പ്രൊഫൈൽ വിഭാഗത്തിലെ ലിങ്ക് ആധാറിൽ ക്ലിക്ക് ചെയ്യുക.',
        'footer'=> '2024 സർക്കാർ സേവന പോർട്ടൽ. എല്ലായ്പ്പോഴും അടിയിൽ!',
    ];
        
} else {
    $languageStrings = [
        'login' => 'Login',
        'signup' => 'Signup',
        'language' => 'Language',
        'welcome' => 'Welcome', // Default to English
        'title' => 'title',
        'gov_of_india' => 'Government of India',
        'check_aadhaar_status' => 'Check Aadhaar Status',
        'Online Method via UIDAI Website' => 'Online Method via UIDAI Website',
        'step' => 'step',
       'visit_uidai' => 'Visit the official UIDAI website"https://uidai.gov.in"',
        'navigate_my_aadhaar' => 'Navigate to the "My Aadhaar" section',
        'click_status' => 'Click on "Check Aadhaar Status"',
        'enter_details' => 'Enter your 12-digit Aadhaar Enrollment ID which is found on the acknowledgment slip provided during enrollment. Include the date and time details printed on it.',
        'captcha' => 'Enter the security CAPTCHA code',
        'check_status' => 'Click "Check Status"',
        'sidcrtadhar'=>'Check Aadhaar Status',
        'search' => 'Search',
        'link_aadhaar_manual' => 'Link Aadhaar User Manual',
        'check_aadhaar_pan' => 'Check Aadhaar PAN Card Link Status',
        'update_aadhaar' => 'Update Aadhaar',
        'download_aadhaar' => 'Download_aadhaar',
        'income_tax_return' => 'Income tax return',
        'verify_pan' => 'Verify pan',
        'link_aadhaar' => 'link aadhaar',
        'pay_tax' => 'pay tax',
        'link_aadhaar_manual' => 'Link Aadhaar User Manual',
        'overview' => '1. Overview',
        'overview_text' => 'For new applicants of PAN card, the Aadhaar PAN linking is done automatically during the application stage.For existing PAN holders who were allotted PAN on or before 01-07-2017, it is mandatory to link PAN with Aadhaar. 
         The Link Aadhaar service is available to individual taxpayers (both registered and unregistered on the e-Filing Portal). 
         If you do not link your PAN with Aadhaar by 30<sup>th</sup> June 2023, your PAN will become inoperative. 
         However, people who fall under the exempted category will not be subject to the effects of PAN becoming inoperative.',
        'prerequisites' => '2. Prerequisites for availing this service:',
        'prerequisites_items1' => 'Valid PAN', 
        'prerequisites_items2'=>'Aadhaar number', 
         'prerequisites_items3'=>'Valid mobile number',
        'how_to_pay' => '3. How to make payment of Aadhaar PAN link fee on e-Filing Portal',
        'step1' => 'Step 1: Visit the e-Filing Portal Home page and click on  Link Aadhaar in the Quick Links section. Alternatively, login to the e-filing portal and click on Link Aadhaar in the Profile section. ',
        'footer'=> '2024 Government Service Portal. Always at the bottom!',
];
}
?>

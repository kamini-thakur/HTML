<?php

// Main website configuration options

$site_config = array(
	'website_url' => 'https://bcxtrust.com/',
	'website_name' => 'Bitcoin Affiliate System',
	'default_title' => 'Bitcoin Affiliate System',
	'default_description' => 'Website Description',
	'default_keywords' => 'Website Keywords',
	'default_image' => 'img.png',
	'default_currency' => 'USD'
);

// Localbitcoins affiliate code

$lbc = array(
	'affiliate' => 'qont'
);

// Envato username

$envato = array(
	'username' => 'emberthemes'
);

// Addresses registered with faucethub.io

$ref = array(
	'BTC' => '15L7a3M82QTNtP9zfdNQV24NZQti3iREsq',
	'LTC' => 'LQWaDEHGaKbBRR6XeYZGzMqcuD3nXxK7Ce',
	'DOGE' => 'D6vDHAQs2DCpmBwBDyYmNq22VkskYM2ofJ',
	'BLK' => 'BFbGJd337MMd9EFn6dukg2XMpvENgpMAoZ',
	'DASH' => 'XoWTPAtENCUVHjr2SKrxE54XXWgxCLSJEr',
	'PPC' => 'PFY3ZjQBhDXxP52EZ8EM4Zpmw5RcSkTywP',
	'XPM' => 'AJYnAy1EPU7HT3SUDCMyVdx2ebcMBCiaE3',
	'BCH' => '155tn1eWJryndBTUvFJCea3TMDYkHAwEco'
);

// ////////////////////////////////////////////////////////////////////////
// Important stuff, don't change unless you know what you are doing!!! //
// //////////////////////////////////////////////////////////////////////

$payments = array(
	"ALIPAY" => "Alipay",
	"PINGIT" => "Pingit",
	"TIGOPESA_TANZANIA" => "Tigo-Pesa Tanzania",
	"GIFT_CARD_CODE_AMAZON" => "Amazon Gift Card Code",
	"GIFT_CARD_CODE_WALMART" => "Walmart Gift Card Code",
	"OTHER_REMITTANCE" => "Other Remittance",
	"SQUARE_CASH" => "Square Cash",
	"OTHER" => "Other online payment",
	"BPAY" => "BPAY Bill Payment",
	"TELEGRAMATIC_ORDER" => "Telegramatic Order",
	"YANDEXMONEY" => "Yandex Money",
	"RELOADIT" => "Reloadit",
	"MONEYGRAM" => "Moneygram",
	"ASTROPAY" => "AstroPay",
	"PAYM" => "Paym",
	"PAYSAFECARD" => "PaySafeCard",
	"HAL_CASH" => "Hal-cash",
	"ALTCOIN_ETH" => "Ethereum altcoin",
	"SUPERFLASH" => "Superflash",
	"WECHAT" => "WeChat",
	"MOBILEPAY_DANSKE_BANK" => "MobilePay FI",
	"OTHER_PRE_PAID_DEBIT" => "Other Pre-Paid Debit Card",
	"OTHER_ONLINE_WALLET" => "Other Online Wallet",
	"SEPA" => "SEPA (EU) bank transfer",
	"EASYPAISA" => "Easypaisa",
	"HYPERWALLET" => "hyperWALLET",
	"PostePay" => "PostePay",
	"SOLIDTRUSTPAY" => "SolidTrustPay",
	"CASH_AT_ATM" => "Cash at ATM",
	"NETELLER" => "Neteller",
	"PAYEER" => "Payeer",
	"MPESA_KENYA" => "M-PESA Kenya (Safaricom)",
	"XOOM" => "Xoom",
	"DWOLLA" => "Dwolla",
	"GIFT_CARD_CODE_APPLE_STORE" => "Apple Store Gift Card Code",
	"GOOGLEWALLET" => "Google Wallet",
	"GIFT_CARD_CODE" => "Gift Card Code",
	"MOBILEPAY_DANSKE_BANK_NO" => "MobilePay NO",
	"NATIONAL_BANK" => "National bank transfer",
	"CASH_BY_MAIL" => "Cash by mail",
	"PAYPALMYCASH" => "PayPal My Cash",
	"CASHIERS_CHECK" => "Cashier's check",
	"WORLDREMIT" => "Worldremit",
	"VENMO" => "Venmo",
	"VIPPS" => "Vipps",
	"INTERAC" => "Interac e-transfer",
	"CASHU" => "CashU",
	"WU" => "Western Union",
	"BANK_TRANSFER_IMPS" => "IMPS Bank Transfer India",
	"RIA" => "RIA Money Transfer",
	"OKPAY" => "OKPay",
	"WEBMONEY" => "WebMoney",
	"PAYPAL" => "Paypal",
	"TRANSFERWISE" => "Transferwise",
	"SPECIFIC_BANK" => "Transfers with specific bank",
	"PERFECT_MONEY" => "Perfect Money",
	"PAYONEER" => "Payoneer",
	"INTERNATIONAL_WIRE_SWIFT" => "International Wire (SWIFT)",
	"NETSPEND" => "NetSpend Reload Pack",
	"GIFT_CARD_CODE_STEAM" => "Steam Gift Card Code",
	"CHASE_QUICKPAY" => "Chase Quickpay",
	"OTHER_ONLINE_WALLET_GLOBAL" => "Other Online Wallet (Global)",
	"PYC" => "PYC",
	"MOBILEPAY_DANSKE_BANK_DK" => "MobilePay",
	"GIFT_CARD_CODE_STARBUCKS" => "Starbucks Gift Card Code",
	"MPESA_TANZANIA" => "M-PESA Tanzania (Vodacom)",
	"SWISH" => "Swish",
	"SERVE2SERVE" => "Serve2Serve",
	"QIWI" => "QIWI",
	"GIFT_CARD_CODE_GLOBAL" => "Gift Card Code (Global)",
	"PAYZA" => "Payza",
	"ONECARD" => "OneCard",
	"VANILLA" => "Vanilla",
	"GIFT_CARD_CODE_ITUNES" => "iTunes Gift Card Code",
	"GIFT_CARD_CODE_EBAY" => "Ebay Gift Card Code",
	"WALMART2WALMART" => "Walmart 2 Walmart",
	"PAXUM" => "Paxum",
	"PAYTM" => "PayTM",
	"CREDITCARD" => "Credit card",
	"CASH_DEPOSIT" => "Cash deposit",
	"LYDIA" => "Lydia",
	"ADVCASH" => "advcash",
	"MONEYBOOKERS" => "Moneybookers / Skrill",
	"POSTAL_ORDER" => "Postal order"
);
$methods = array(
	"alipay" => "Alipay",
	"pingit" => "Pingit",
	"tigo-pesa-tanzania" => "Tigo-Pesa Tanzania",
	"amazon-gift-card-code" => "Amazon Gift Card Code",
	"walmart-gift-card-code" => "Walmart Gift Card Code",
	"other-remittance" => "Other Remittance",
	"square-cash" => "Square Cash",
	"other-online-payment" => "Other online payment",
	"bpay-bill-payment" => "BPAY Bill Payment",
	"telegramatic-order" => "Telegramatic Order",
	"yandex-money" => "Yandex Money",
	"reloadit" => "Reloadit",
	"moneygram" => "Moneygram",
	"astropay" => "AstroPay",
	"paym" => "Paym",
	"paysafecard" => "PaySafeCard",
	"hal-cash" => "Hal-cash",
	"ethereum-altcoin" => "Ethereum altcoin",
	"superflash" => "Superflash",
	"wechat" => "WeChat",
	"mobilepay-fi" => "MobilePay FI",
	"other-pre-paid-debit-card" => "Other Pre-Paid Debit Card",
	"other-online-wallet" => "Other Online Wallet",
	"sepa-eu-bank-transfer" => "SEPA (EU) bank transfer",
	"easypaisa" => "Easypaisa",
	"hyperwallet" => "hyperWALLET",
	"postepay" => "PostePay",
	"solidtrustpay" => "SolidTrustPay",
	"cash-at-atm" => "Cash at ATM",
	"neteller" => "Neteller",
	"payeer" => "Payeer",
	"m-pesa-kenya-safaricom" => "M-PESA Kenya (Safaricom)",
	"xoom" => "Xoom",
	"dwolla" => "Dwolla",
	"apple-store-gift-card-code" => "Apple Store Gift Card Code",
	"google-wallet" => "Google Wallet",
	"gift-card-code" => "Gift Card Code",
	"mobilepay-no" => "MobilePay NO",
	"national-bank-transfer" => "National bank transfer",
	"cash-by-mail" => "Cash by mail",
	"paypal-my-cash" => "PayPal My Cash",
	"cashiers-check" => "Cashier's check",
	"worldremit" => "Worldremit",
	"venmo" => "Venmo",
	"vipps" => "Vipps",
	"interac-e-transfer" => "Interac e-transfer",
	"cashu" => "CashU",
	"western-union" => "Western Union",
	"imps-bank-transfer-india" => "IMPS Bank Transfer India",
	"ria-money-transfer" => "RIA Money Transfer",
	"okpay" => "OKPay",
	"webmoney" => "WebMoney",
	"paypal" => "Paypal",
	"transferwise" => "Transferwise",
	"transfers-with-specific-bank" => "Transfers with specific bank",
	"perfect-money" => "Perfect Money",
	"payoneer" => "Payoneer",
	"international-wire-swift" => "International Wire (SWIFT)",
	"netspend-reload-pack" => "NetSpend Reload Pack",
	"steam-gift-card-code" => "Steam Gift Card Code",
	"chase-quickpay" => "Chase Quickpay",
	"other-online-wallet-global" => "Other Online Wallet (Global)",
	"pyc" => "PYC",
	"mobilepay" => "MobilePay",
	"starbucks-gift-card-code" => "Starbucks Gift Card Code",
	"m-pesa-tanzania-vodacom" => "M-PESA Tanzania (Vodacom)",
	"swish" => "Swish",
	"serve2serve" => "Serve2Serve",
	"qiwi" => "QIWI",
	"gift-card-code-global" => "Gift Card Code (Global)",
	"payza" => "Payza",
	"onecard" => "OneCard",
	"vanilla" => "Vanilla",
	"itunes-gift-card-code" => "iTunes Gift Card Code",
	"ebay-gift-card-code" => "Ebay Gift Card Code",
	"walmart-2-walmart" => "Walmart 2 Walmart",
	"paxum" => "Paxum",
	"paytm" => "PayTM",
	"credit-card" => "Credit card",
	"cash-deposit" => "Cash deposit",
	"lydia" => "Lydia",
	"advcash" => "advcash",
	"moneybookers-skrill" => "Moneybookers / Skrill",
	"postal-order" => "Postal order"
);
$countries = array(
	"AF" => "Afghanistan",
	"AX" => "Aland Islands",
	"AL" => "Albania",
	"DZ" => "Algeria",
	"AS" => "American Samoa",
	"AD" => "Andorra",
	"AO" => "Angola",
	"AI" => "Anguilla",
	"AQ" => "Antarctica",
	"AG" => "Antigua And Barbuda",
	"AR" => "Argentina",
	"AM" => "Armenia",
	"AW" => "Aruba",
	"AU" => "Australia",
	"AT" => "Austria",
	"AZ" => "Azerbaijan",
	"BS" => "Bahamas",
	"BH" => "Bahrain",
	"BD" => "Bangladesh",
	"BB" => "Barbados",
	"BY" => "Belarus",
	"BE" => "Belgium",
	"BZ" => "Belize",
	"BJ" => "Benin",
	"BM" => "Bermuda",
	"BT" => "Bhutan",
	"BO" => "Bolivia",
	"BA" => "Bosnia And Herzegovina",
	"BW" => "Botswana",
	"BV" => "Bouvet Island",
	"BR" => "Brazil",
	"IO" => "British Indian Ocean Territory",
	"BN" => "Brunei Darussalam",
	"BG" => "Bulgaria",
	"BF" => "Burkina Faso",
	"BI" => "Burundi",
	"KH" => "Cambodia",
	"CM" => "Cameroon",
	"CA" => "Canada",
	"CV" => "Cape Verde",
	"KY" => "Cayman Islands",
	"CF" => "Central African Republic",
	"TD" => "Chad",
	"CL" => "Chile",
	"CN" => "China",
	"CX" => "Christmas Island",
	"CC" => "Cocos (Keeling) Islands",
	"CO" => "Colombia",
	"KM" => "Comoros",
	"CG" => "Congo",
	"CD" => "Congo, Democratic Republic",
	"CK" => "Cook Islands",
	"CR" => "Costa Rica",
	"CI" => "Cote D'Ivoire",
	"HR" => "Croatia",
	"CU" => "Cuba",
	"CY" => "Cyprus",
	"CZ" => "Czech Republic",
	"DK" => "Denmark",
	"DJ" => "Djibouti",
	"DM" => "Dominica",
	"DO" => "Dominican Republic",
	"EC" => "Ecuador",
	"EG" => "Egypt",
	"SV" => "El Salvador",
	"GQ" => "Equatorial Guinea",
	"ER" => "Eritrea",
	"EE" => "Estonia",
	"ET" => "Ethiopia",
	"FK" => "Falkland Islands (Malvinas)",
	"FO" => "Faroe Islands",
	"FJ" => "Fiji",
	"FI" => "Finland",
	"FR" => "France",
	"GF" => "French Guiana",
	"PF" => "French Polynesia",
	"TF" => "French Southern Territories",
	"GA" => "Gabon",
	"GM" => "Gambia",
	"GE" => "Georgia",
	"DE" => "Germany",
	"GH" => "Ghana",
	"GI" => "Gibraltar",
	"GR" => "Greece",
	"GL" => "Greenland",
	"GD" => "Grenada",
	"GP" => "Guadeloupe",
	"GU" => "Guam",
	"GT" => "Guatemala",
	"GG" => "Guernsey",
	"GN" => "Guinea",
	"GW" => "Guinea-Bissau",
	"GY" => "Guyana",
	"HT" => "Haiti",
	"HM" => "Heard Island & Mcdonald Islands",
	"VA" => "Holy See (Vatican City State)",
	"HN" => "Honduras",
	"HK" => "Hong Kong",
	"HU" => "Hungary",
	"IS" => "Iceland",
	"IN" => "India",
	"ID" => "Indonesia",
	"IR" => "Iran, Islamic Republic Of",
	"IQ" => "Iraq",
	"IE" => "Ireland",
	"IM" => "Isle Of Man",
	"IL" => "Israel",
	"IT" => "Italy",
	"JM" => "Jamaica",
	"JP" => "Japan",
	"JE" => "Jersey",
	"JO" => "Jordan",
	"KZ" => "Kazakhstan",
	"KE" => "Kenya",
	"KI" => "Kiribati",
	"KR" => "Korea",
	"KW" => "Kuwait",
	"KG" => "Kyrgyzstan",
	"LA" => "Lao People's Democratic Republic",
	"LV" => "Latvia",
	"LB" => "Lebanon",
	"LS" => "Lesotho",
	"LR" => "Liberia",
	"LY" => "Libyan Arab Jamahiriya",
	"LI" => "Liechtenstein",
	"LT" => "Lithuania",
	"LU" => "Luxembourg",
	"MO" => "Macao",
	"MK" => "Macedonia",
	"MG" => "Madagascar",
	"MW" => "Malawi",
	"MY" => "Malaysia",
	"MV" => "Maldives",
	"ML" => "Mali",
	"MT" => "Malta",
	"MH" => "Marshall Islands",
	"MQ" => "Martinique",
	"MR" => "Mauritania",
	"MU" => "Mauritius",
	"YT" => "Mayotte",
	"MX" => "Mexico",
	"FM" => "Micronesia, Federated States Of",
	"MD" => "Moldova",
	"MC" => "Monaco",
	"MN" => "Mongolia",
	"ME" => "Montenegro",
	"MS" => "Montserrat",
	"MA" => "Morocco",
	"MZ" => "Mozambique",
	"MM" => "Myanmar",
	"NA" => "Namibia",
	"NR" => "Nauru",
	"NP" => "Nepal",
	"NL" => "Netherlands",
	"NC" => "New Caledonia",
	"NZ" => "New Zealand",
	"NI" => "Nicaragua",
	"NE" => "Niger",
	"NG" => "Nigeria",
	"NU" => "Niue",
	"NF" => "Norfolk Island",
	"MP" => "Northern Mariana Islands",
	"NO" => "Norway",
	"OM" => "Oman",
	"PK" => "Pakistan",
	"PW" => "Palau",
	"PS" => "Palestinian Territory, Occupied",
	"PA" => "Panama",
	"PG" => "Papua New Guinea",
	"PY" => "Paraguay",
	"PE" => "Peru",
	"PH" => "Philippines",
	"PN" => "Pitcairn",
	"PL" => "Poland",
	"PT" => "Portugal",
	"PR" => "Puerto Rico",
	"QA" => "Qatar",
	"RE" => "Reunion",
	"RO" => "Romania",
	"RU" => "Russia",
	"RW" => "Rwanda",
	"BL" => "Saint Barthelemy",
	"SH" => "Saint Helena, Ascension and Tristan da Cunha",
	"KN" => "Saint Kitts And Nevis",
	"LC" => "Saint Lucia",
	"MF" => "Saint-Martin",
	"PM" => "Saint-Pierre And Miquelon",
	"VC" => "Saint Vincent And Grenadines",
	"WS" => "Samoa",
	"SM" => "San Marino",
	"ST" => "Sao Tome And Principe",
	"SA" => "Saudi Arabia",
	"SN" => "Senegal",
	"RS" => "Serbia",
	"SC" => "Seychelles",
	"SL" => "Sierra Leone",
	"SG" => "Singapore",
	"SK" => "Slovakia",
	"SI" => "Slovenia",
	"SB" => "Solomon Islands",
	"SO" => "Somalia",
	"ZA" => "South Africa",
	"GS" => "South Georgia And Sandwich Isl.",
	"ES" => "Spain",
	"LK" => "Sri Lanka",
	"SD" => "Sudan",
	"SR" => "Suriname",
	"SJ" => "Svalbard And Jan Mayen",
	"SZ" => "Swaziland",
	"SE" => "Sweden",
	"CH" => "Switzerland",
	"SY" => "Syria",
	"TW" => "Taiwan",
	"TJ" => "Tajikistan",
	"TZ" => "Tanzania",
	"TH" => "Thailand",
	"TL" => "Timor-Leste",
	"TG" => "Togo",
	"TK" => "Tokelau",
	"TO" => "Tonga",
	"TT" => "Trinidad And Tobago",
	"TN" => "Tunisia",
	"TR" => "Turkey",
	"TM" => "Turkmenistan",
	"TC" => "Turks And Caicos Islands",
	"TV" => "Tuvalu",
	"UG" => "Uganda",
	"UA" => "Ukraine",
	"AE" => "United Arab Emirates",
	"GB" => "United Kingdom",
	"US" => "United States",
	"UM" => "United States Outlying Islands",
	"UY" => "Uruguay",
	"UZ" => "Uzbekistan",
	"VU" => "Vanuatu",
	"VE" => "Venezuela",
	"VN" => "Viet Nam",
	"VG" => "Virgin Islands, British",
	"VI" => "Virgin Islands, U.S.",
	"WF" => "Wallis And Futuna",
	"EH" => "Western Sahara",
	"YE" => "Yemen",
	"ZM" => "Zambia",
	"ZW" => "Zimbabwe"
);

// Allow getting the version number for support reasons

if (isset($_GET['version']))
	{
	echo 'v1.0';
	}

?>

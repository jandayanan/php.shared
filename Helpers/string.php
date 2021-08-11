<?php

// region CONSTANTS

use Common\Traits\Instances\Response;
const CURRENCIES = [
    ['origin'=>'Abkhazia','name'=>'Abkhazian apsar[E]','symbol'=>'(none)','iso'=>'(none)','fraction'=>'(none)','division'=>'(none)'],
    ['origin'=>'Abkhazia','name'=>'Russian ruble','symbol'=>'₽','iso'=>'RUB','fraction'=>'Kopek','division'=>'100'],
    ['origin'=>'Afghanistan','name'=>'Afghan afghani','symbol'=>'؋','iso'=>'AFN','fraction'=>'Pul','division'=>'100'],
    ['origin'=>'Akrotiri and Dhekelia','name'=>'Euro','symbol'=>'€','iso'=>'EUR','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Albania','name'=>'Albanian lek','symbol'=>'L','iso'=>'ALL','fraction'=>'Qindarkë','division'=>'100'],
    ['origin'=>'Alderney','name'=>'Alderney pound[E]','symbol'=>'£','iso'=>'(none)','fraction'=>'Penny','division'=>'100'],
    ['origin'=>'Alderney','name'=>'British pound[F]','symbol'=>'£','iso'=>'GBP','fraction'=>'Penny','division'=>'100'],
    ['origin'=>'Alderney','name'=>'Guernsey pound','symbol'=>'£','iso'=>'GGP','fraction'=>'Penny','division'=>'100'],
    ['origin'=>'Algeria','name'=>'Algerian dinar','symbol'=>'د.ج','iso'=>'DZD','fraction'=>'Santeem','division'=>'100'],
    ['origin'=>'Andorra','name'=>'Euro','symbol'=>'€','iso'=>'EUR','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Angola','name'=>'Angolan kwanza','symbol'=>'Kz','iso'=>'AOA','fraction'=>'Cêntimo','division'=>'100'],
    ['origin'=>'Anguilla','name'=>'Eastern Caribbean dollar','symbol'=>'$','iso'=>'XCD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Antigua and Barbuda','name'=>'Eastern Caribbean dollar','symbol'=>'$','iso'=>'XCD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Argentina','name'=>'Argentine peso','symbol'=>'$','iso'=>'ARS','fraction'=>'Centavo','division'=>'100'],
    ['origin'=>'Armenia','name'=>'Armenian dram','symbol'=>'֏','iso'=>'AMD','fraction'=>'Luma','division'=>'100'],
    ['origin'=>'Artsakh','name'=>'Artsakh dram[E]','symbol'=>'դր.','iso'=>'(none)','fraction'=>'Luma','division'=>'100'],
    ['origin'=>'Artsakh','name'=>'Armenian dram','symbol'=>'֏','iso'=>'AMD','fraction'=>'Luma','division'=>'100'],
    ['origin'=>'Aruba','name'=>'Aruban florin','symbol'=>'ƒ','iso'=>'AWG','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Ascension Island','name'=>'Saint Helena pound','symbol'=>'£','iso'=>'SHP','fraction'=>'Penny','division'=>'100'],
    ['origin'=>'Australia','name'=>'Australian dollar','symbol'=>'$','iso'=>'AUD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Austria','name'=>'Euro','symbol'=>'€','iso'=>'EUR','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Azerbaijan','name'=>'Azerbaijani manat','symbol'=>'₼','iso'=>'AZN','fraction'=>'Qəpik','division'=>'100'],
    ['origin'=>'Bahamas, The','name'=>'Bahamian dollar','symbol'=>'$','iso'=>'BSD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Bahrain','name'=>'Bahraini dinar','symbol'=>'.د.ب','iso'=>'BHD','fraction'=>'Fils','division'=>'1000'],
    ['origin'=>'Bangladesh','name'=>'Bangladeshi taka','symbol'=>'৳','iso'=>'BDT','fraction'=>'Poisha','division'=>'100'],
    ['origin'=>'Barbados','name'=>'Barbadian dollar','symbol'=>'$','iso'=>'BBD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Belarus','name'=>'Belarusian ruble','symbol'=>'Br','iso'=>'BYN','fraction'=>'Kapyeyka','division'=>'100'],
    ['origin'=>'Belgium','name'=>'Euro','symbol'=>'€','iso'=>'EUR','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Belize','name'=>'Belize dollar','symbol'=>'$','iso'=>'BZD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Benin','name'=>'West African CFA franc','symbol'=>'Fr','iso'=>'XOF','fraction'=>'Centime','division'=>'100'],
    ['origin'=>'Bermuda','name'=>'Bermudian dollar','symbol'=>'$','iso'=>'BMD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Bhutan','name'=>'Bhutanese ngultrum','symbol'=>'Nu.','iso'=>'BTN','fraction'=>'Chetrum','division'=>'100'],
    ['origin'=>'Bhutan','name'=>'Indian rupee','symbol'=>'₹','iso'=>'INR','fraction'=>'Paisa','division'=>'100'],
    ['origin'=>'Bolivia','name'=>'Bolivian boliviano','symbol'=>'Bs.','iso'=>'BOB','fraction'=>'Centavo','division'=>'100'],
    ['origin'=>'Bonaire','name'=>'United States dollar[H]','symbol'=>'$','iso'=>'USD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Bosnia and Herzegovina','name'=>'Bosnia and Herzegovina convertible mark','symbol'=>'KM or КМ[I]','iso'=>'BAM','fraction'=>'Fening','division'=>'100'],
    ['origin'=>'Botswana','name'=>'Botswana pula','symbol'=>'P','iso'=>'BWP','fraction'=>'Thebe','division'=>'100'],
    ['origin'=>'Brazil','name'=>'Brazilian real','symbol'=>'R$','iso'=>'BRL','fraction'=>'Centavo','division'=>'100'],
    ['origin'=>'British Indian Ocean Territory','name'=>'United States dollar','symbol'=>'$','iso'=>'USD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'British Virgin Islands','name'=>'United States dollar','symbol'=>'$','iso'=>'USD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Brunei','name'=>'Brunei dollar','symbol'=>'$','iso'=>'BND','fraction'=>'Sen','division'=>'100'],
    ['origin'=>'Brunei','name'=>'Singapore dollar','symbol'=>'$','iso'=>'SGD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Bulgaria','name'=>'Bulgarian lev','symbol'=>'лв.','iso'=>'BGN','fraction'=>'Stotinka','division'=>'100'],
    ['origin'=>'Burkina Faso','name'=>'West African CFA franc','symbol'=>'Fr','iso'=>'XOF','fraction'=>'Centime','division'=>'100'],
    ['origin'=>'Burundi','name'=>'Burundian franc','symbol'=>'Fr','iso'=>'BIF','fraction'=>'Centime','division'=>'100'],
    ['origin'=>'Cambodia','name'=>'Cambodian riel','symbol'=>'៛','iso'=>'KHR','fraction'=>'Sen','division'=>'100'],
    ['origin'=>'Cameroon','name'=>'Central African CFA franc','symbol'=>'Fr','iso'=>'XAF','fraction'=>'Centime','division'=>'100'],
    ['origin'=>'Canada','name'=>'Canadian dollar','symbol'=>'$','iso'=>'CAD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Cape Verde','name'=>'Cape Verdean escudo','symbol'=>'Esc or $','iso'=>'CVE','fraction'=>'Centavo','division'=>'100'],
    ['origin'=>'Cayman Islands','name'=>'Cayman Islands dollar','symbol'=>'$','iso'=>'KYD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Central African Republic','name'=>'Central African CFA franc','symbol'=>'Fr','iso'=>'XAF','fraction'=>'Centime','division'=>'100'],
    ['origin'=>'Chad','name'=>'Central African CFA franc','symbol'=>'Fr','iso'=>'XAF','fraction'=>'Centime','division'=>'100'],
    ['origin'=>'Chile','name'=>'Chilean peso','symbol'=>'$','iso'=>'CLP','fraction'=>'Centavo','division'=>'100'],
    ['origin'=>'China','name'=>'Chinese yuan','symbol'=>'¥ or 元','iso'=>'CNY','fraction'=>'Fen[J]','division'=>'100'],
    ['origin'=>'Colombia','name'=>'Colombian peso','symbol'=>'$','iso'=>'COP','fraction'=>'Centavo','division'=>'100'],
    ['origin'=>'Comoros','name'=>'Comorian franc','symbol'=>'Fr','iso'=>'KMF','fraction'=>'Centime','division'=>'100'],
    ['origin'=>'Congo, Democratic Republic of the','name'=>'Congolese franc','symbol'=>'Fr','iso'=>'CDF','fraction'=>'Centime','division'=>'100'],
    ['origin'=>'Congo, Republic of the','name'=>'Central African CFA franc','symbol'=>'Fr','iso'=>'XAF','fraction'=>'Centime','division'=>'100'],
    ['origin'=>'Cook Islands','name'=>'Cook Islands dollar','symbol'=>'$','iso'=>'CKD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Cook Islands','name'=>'New Zealand dollar','symbol'=>'$','iso'=>'NZD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Costa Rica','name'=>'Costa Rican colón','symbol'=>'₡','iso'=>'CRC','fraction'=>'Céntimo','division'=>'100'],
    ['origin'=>'Côte d\'Ivoire','name'=>'West African CFA franc','symbol'=>'Fr','iso'=>'XOF','fraction'=>'Centime','division'=>'100'],
    ['origin'=>'Croatia','name'=>'Croatian kuna','symbol'=>'kn','iso'=>'HRK','fraction'=>'Lipa','division'=>'100'],
    ['origin'=>'Cuba','name'=>'Cuban peso','symbol'=>'$','iso'=>'CUP','fraction'=>'Centavo','division'=>'100'],
    ['origin'=>'Cuba','name'=>'Cuban convertible peso','symbol'=>'$','iso'=>'CUC','fraction'=>'Centavo','division'=>'100'],
    ['origin'=>'Curaçao','name'=>'Netherlands Antillean guilder','symbol'=>'ƒ','iso'=>'ANG','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Cyprus','name'=>'Euro','symbol'=>'€','iso'=>'EUR','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Czech Republic','name'=>'Czech koruna','symbol'=>'Kč','iso'=>'CZK','fraction'=>'Haléř','division'=>'100'],
    ['origin'=>'Denmark','name'=>'Danish krone','symbol'=>'kr','iso'=>'DKK','fraction'=>'Øre','division'=>'100'],
    ['origin'=>'Djibouti','name'=>'Djiboutian franc','symbol'=>'Fr','iso'=>'DJF','fraction'=>'Centime','division'=>'100'],
    ['origin'=>'Dominica','name'=>'Eastern Caribbean dollar','symbol'=>'$','iso'=>'XCD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Dominican Republic','name'=>'Dominican peso','symbol'=>'$','iso'=>'DOP','fraction'=>'Centavo','division'=>'100'],
    ['origin'=>'East Timor','name'=>'United States dollar','symbol'=>'$','iso'=>'USD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'East Timor','name'=>'(none)','symbol'=>'(none)','iso'=>'(none)','fraction'=>'Centavo[K][L]','division'=>'(none)'],
    ['origin'=>'Ecuador','name'=>'United States dollar','symbol'=>'$','iso'=>'USD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Ecuador','name'=>'(none)','symbol'=>'(none)','iso'=>'(none)','fraction'=>'Centavo[K][L]','division'=>'(none)'],
    ['origin'=>'Egypt','name'=>'Egyptian pound','symbol'=>'£ or ج.م','iso'=>'EGP','fraction'=>'Piastre[B]','division'=>'100'],
    ['origin'=>'El Salvador','name'=>'United States dollar','symbol'=>'$','iso'=>'USD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Equatorial Guinea','name'=>'Central African CFA franc','symbol'=>'Fr','iso'=>'XAF','fraction'=>'Centime','division'=>'100'],
    ['origin'=>'Eritrea','name'=>'Eritrean nakfa','symbol'=>'Nfk','iso'=>'ERN','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Estonia','name'=>'Euro','symbol'=>'€','iso'=>'EUR','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Eswatini','name'=>'Swazi lilangeni','symbol'=>'L','iso'=>'SZL','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Eswatini','name'=>'South African rand','symbol'=>'R','iso'=>'ZAR','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Ethiopia','name'=>'Ethiopian birr','symbol'=>'Br','iso'=>'ETB','fraction'=>'Santim','division'=>'100'],
    ['origin'=>'Falkland Islands','name'=>'Falkland Islands pound','symbol'=>'£','iso'=>'FKP','fraction'=>'Penny','division'=>'100'],
    ['origin'=>'Faroe Islands','name'=>'Danish krone','symbol'=>'kr','iso'=>'DKK','fraction'=>'Øre','division'=>'100'],
    ['origin'=>'Faroe Islands','name'=>'Faroese króna','symbol'=>'kr','iso'=>'FOK','fraction'=>'Oyra','division'=>'100'],
    ['origin'=>'Fiji','name'=>'Fijian dollar','symbol'=>'$','iso'=>'FJD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Finland','name'=>'Euro','symbol'=>'€','iso'=>'EUR','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'France','name'=>'Euro','symbol'=>'€','iso'=>'EUR','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'French Polynesia','name'=>'CFP franc','symbol'=>'₣','iso'=>'XPF','fraction'=>'Centime','division'=>'100'],
    ['origin'=>'Gabon','name'=>'Central African CFA franc','symbol'=>'Fr','iso'=>'XAF','fraction'=>'Centime','division'=>'100'],
    ['origin'=>'Gambia, The','name'=>'Gambian dalasi','symbol'=>'D','iso'=>'GMD','fraction'=>'Butut','division'=>'100'],
    ['origin'=>'Georgia','name'=>'Georgian lari','symbol'=>'₾','iso'=>'GEL','fraction'=>'Tetri','division'=>'100'],
    ['origin'=>'Germany','name'=>'Euro','symbol'=>'€','iso'=>'EUR','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Ghana','name'=>'Ghanaian cedi','symbol'=>'₵','iso'=>'GHS','fraction'=>'Pesewa','division'=>'100'],
    ['origin'=>'Gibraltar','name'=>'Gibraltar pound','symbol'=>'£','iso'=>'GIP','fraction'=>'Penny','division'=>'100'],
    ['origin'=>'Greece','name'=>'Euro','symbol'=>'€','iso'=>'EUR','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Grenada','name'=>'Eastern Caribbean dollar','symbol'=>'$','iso'=>'XCD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Guatemala','name'=>'Guatemalan quetzal','symbol'=>'Q','iso'=>'GTQ','fraction'=>'Centavo','division'=>'100'],
    ['origin'=>'Guernsey','name'=>'Guernsey pound','symbol'=>'£','iso'=>'GGP','fraction'=>'Penny','division'=>'100'],
    ['origin'=>'Guernsey','name'=>'British pound[F]','symbol'=>'£','iso'=>'GBP','fraction'=>'Penny','division'=>'100'],
    ['origin'=>'Guinea','name'=>'Guinean franc','symbol'=>'Fr','iso'=>'GNF','fraction'=>'Centime','division'=>'100'],
    ['origin'=>'Guinea-Bissau','name'=>'West African CFA franc','symbol'=>'Fr','iso'=>'XOF','fraction'=>'Centime','division'=>'100'],
    ['origin'=>'Guyana','name'=>'Guyanese dollar','symbol'=>'$','iso'=>'GYD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Haiti','name'=>'Haitian gourde','symbol'=>'G','iso'=>'HTG','fraction'=>'Centime','division'=>'100'],
    ['origin'=>'Honduras','name'=>'Honduran lempira','symbol'=>'L','iso'=>'HNL','fraction'=>'Centavo','division'=>'100'],
    ['origin'=>'Hong Kong','name'=>'Hong Kong dollar','symbol'=>'$','iso'=>'HKD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Hungary','name'=>'Hungarian forint','symbol'=>'Ft','iso'=>'HUF','fraction'=>'Fillér','division'=>'100'],
    ['origin'=>'Iceland','name'=>'Icelandic króna','symbol'=>'kr','iso'=>'ISK','fraction'=>'Eyrir','division'=>'100'],
    ['origin'=>'India','name'=>'Indian rupee','symbol'=>'₹','iso'=>'INR','fraction'=>'Paisa','division'=>'100'],
    ['origin'=>'Indonesia','name'=>'Indonesian rupiah','symbol'=>'Rp','iso'=>'IDR','fraction'=>'Sen','division'=>'100'],
    ['origin'=>'Iran','name'=>'Iranian rial','symbol'=>'﷼','iso'=>'IRR','fraction'=>'Dinar','division'=>'100'],
    ['origin'=>'Iraq','name'=>'Iraqi dinar','symbol'=>'ع.د','iso'=>'IQD','fraction'=>'Fils','division'=>'1000'],
    ['origin'=>'Ireland','name'=>'Euro','symbol'=>'€','iso'=>'EUR','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Isle of Man','name'=>'Manx pound','symbol'=>'£','iso'=>'IMP','fraction'=>'Penny','division'=>'100'],
    ['origin'=>'Isle of Man','name'=>'British pound[F]','symbol'=>'£','iso'=>'GBP','fraction'=>'Penny','division'=>'100'],
    ['origin'=>'Israel','name'=>'Israeli new shekel','symbol'=>'₪','iso'=>'ILS','fraction'=>'Agora','division'=>'100'],
    ['origin'=>'Italy','name'=>'Euro','symbol'=>'€','iso'=>'EUR','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Jamaica','name'=>'Jamaican dollar','symbol'=>'$','iso'=>'JMD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Japan','name'=>'Japanese yen','symbol'=>'¥ or 円','iso'=>'JPY','fraction'=>'Sen[C]','division'=>'100'],
    ['origin'=>'Jersey','name'=>'Jersey pound','symbol'=>'£','iso'=>'JEP','fraction'=>'Penny','division'=>'100'],
    ['origin'=>'Jersey','name'=>'British pound[F]','symbol'=>'£','iso'=>'GBP','fraction'=>'Penny','division'=>'100'],
    ['origin'=>'Jordan','name'=>'Jordanian dinar','symbol'=>'د.ا','iso'=>'JOD','fraction'=>'Piastre[M]','division'=>'100'],
    ['origin'=>'Kazakhstan','name'=>'Kazakhstani tenge','symbol'=>'₸','iso'=>'KZT','fraction'=>'Tıyn','division'=>'100'],
    ['origin'=>'Kenya','name'=>'Kenyan shilling','symbol'=>'Sh','iso'=>'KES','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Kiribati','name'=>'Kiribati dollar[E]','symbol'=>'$','iso'=>'KID','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Kiribati','name'=>'Australian dollar','symbol'=>'$','iso'=>'AUD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Korea, North','name'=>'North Korean won','symbol'=>'₩','iso'=>'KPW','fraction'=>'Chon','division'=>'100'],
    ['origin'=>'Korea, South','name'=>'South Korean won','symbol'=>'₩','iso'=>'KRW','fraction'=>'Jeon','division'=>'100'],
    ['origin'=>'Kosovo','name'=>'Euro','symbol'=>'€','iso'=>'EUR','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Kuwait','name'=>'Kuwaiti dinar','symbol'=>'د.ك','iso'=>'KWD','fraction'=>'Fils','division'=>'1000'],
    ['origin'=>'Kyrgyzstan','name'=>'Kyrgyzstani som','symbol'=>'с','iso'=>'KGS','fraction'=>'Tyiyn','division'=>'100'],
    ['origin'=>'Laos','name'=>'Lao kip','symbol'=>'₭','iso'=>'LAK','fraction'=>'Att','division'=>'100'],
    ['origin'=>'Latvia','name'=>'Euro','symbol'=>'€','iso'=>'EUR','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Lebanon','name'=>'Lebanese pound','symbol'=>'ل.ل','iso'=>'LBP','fraction'=>'Piastre','division'=>'100'],
    ['origin'=>'Lesotho','name'=>'Lesotho loti','symbol'=>'L','iso'=>'LSL','fraction'=>'Sente','division'=>'100'],
    ['origin'=>'Lesotho','name'=>'South African rand','symbol'=>'R','iso'=>'ZAR','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Liberia','name'=>'Liberian dollar','symbol'=>'$','iso'=>'LRD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Libya','name'=>'Libyan dinar','symbol'=>'ل.د','iso'=>'LYD','fraction'=>'Dirham','division'=>'1000'],
    ['origin'=>'Liechtenstein','name'=>'Swiss franc','symbol'=>'Fr.','iso'=>'CHF','fraction'=>'Rappen','division'=>'100'],
    ['origin'=>'Lithuania','name'=>'Euro','symbol'=>'€','iso'=>'EUR','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Luxembourg','name'=>'Euro','symbol'=>'€','iso'=>'EUR','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Macau','name'=>'Macanese pataca','symbol'=>'P','iso'=>'MOP','fraction'=>'Avo','division'=>'100'],
    ['origin'=>'Madagascar','name'=>'Malagasy ariary','symbol'=>'Ar','iso'=>'MGA','fraction'=>'Iraimbilanja','division'=>'5'],
    ['origin'=>'Malawi','name'=>'Malawian kwacha','symbol'=>'MK','iso'=>'MWK','fraction'=>'Tambala','division'=>'100'],
    ['origin'=>'Malaysia','name'=>'Malaysian ringgit','symbol'=>'RM','iso'=>'MYR','fraction'=>'Sen','division'=>'100'],
    ['origin'=>'Maldives','name'=>'Maldivian rufiyaa','symbol'=>'.ރ','iso'=>'MVR','fraction'=>'Laari','division'=>'100'],
    ['origin'=>'Mali','name'=>'West African CFA franc','symbol'=>'Fr','iso'=>'XOF','fraction'=>'Centime','division'=>'100'],
    ['origin'=>'Malta','name'=>'Euro','symbol'=>'€','iso'=>'EUR','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Marshall Islands','name'=>'United States dollar','symbol'=>'$','iso'=>'USD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Mauritania','name'=>'Mauritanian ouguiya','symbol'=>'UM','iso'=>'MRU','fraction'=>'Khoums','division'=>'5'],
    ['origin'=>'Mauritius','name'=>'Mauritian rupee','symbol'=>'₨','iso'=>'MUR','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Mexico','name'=>'Mexican peso','symbol'=>'$','iso'=>'MXN','fraction'=>'Centavo','division'=>'100'],
    ['origin'=>'Micronesia','name'=>'United States dollar','symbol'=>'$','iso'=>'USD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Moldova','name'=>'Moldovan leu','symbol'=>'L','iso'=>'MDL','fraction'=>'Ban','division'=>'100'],
    ['origin'=>'Monaco','name'=>'Euro','symbol'=>'€','iso'=>'EUR','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Mongolia','name'=>'Mongolian tögrög','symbol'=>'₮','iso'=>'MNT','fraction'=>'Möngö','division'=>'100'],
    ['origin'=>'Montenegro','name'=>'Euro','symbol'=>'€','iso'=>'EUR','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Montserrat','name'=>'Eastern Caribbean dollar','symbol'=>'$','iso'=>'XCD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Morocco','name'=>'Moroccan dirham','symbol'=>'د.م.','iso'=>'MAD','fraction'=>'Centime','division'=>'100'],
    ['origin'=>'Mozambique','name'=>'Mozambican metical','symbol'=>'MT','iso'=>'MZN','fraction'=>'Centavo','division'=>'100'],
    ['origin'=>'Myanmar','name'=>'Burmese kyat','symbol'=>'Ks','iso'=>'MMK','fraction'=>'Pya','division'=>'100'],
    ['origin'=>'Namibia','name'=>'Namibian dollar','symbol'=>'$','iso'=>'NAD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Namibia','name'=>'South African rand','symbol'=>'R','iso'=>'ZAR','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Nauru','name'=>'Australian dollar','symbol'=>'$','iso'=>'AUD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Nepal','name'=>'Nepalese rupee','symbol'=>'रू','iso'=>'NPR','fraction'=>'Paisa','division'=>'100'],
    ['origin'=>'Netherlands[H]','name'=>'Euro','symbol'=>'€','iso'=>'EUR','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'New Caledonia','name'=>'CFP franc','symbol'=>'₣','iso'=>'XPF','fraction'=>'Centime','division'=>'100'],
    ['origin'=>'New Zealand','name'=>'New Zealand dollar','symbol'=>'$','iso'=>'NZD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Nicaragua','name'=>'Nicaraguan córdoba','symbol'=>'C$','iso'=>'NIO','fraction'=>'Centavo','division'=>'100'],
    ['origin'=>'Niger','name'=>'West African CFA franc','symbol'=>'Fr','iso'=>'XOF','fraction'=>'Centime','division'=>'100'],
    ['origin'=>'Nigeria','name'=>'Nigerian naira','symbol'=>'₦','iso'=>'NGN','fraction'=>'Kobo','division'=>'100'],
    ['origin'=>'Niue','name'=>'New Zealand dollar','symbol'=>'$','iso'=>'NZD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Niue','name'=>'Niue dollar[E]','symbol'=>'$','iso'=>'(none)','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'North Macedonia','name'=>'Macedonian denar','symbol'=>'ден','iso'=>'MKD','fraction'=>'Deni','division'=>'100'],
    ['origin'=>'Northern Cyprus','name'=>'Turkish lira','symbol'=>'₺','iso'=>'TRY','fraction'=>'Kuruş','division'=>'100'],
    ['origin'=>'Norway','name'=>'Norwegian krone','symbol'=>'kr','iso'=>'NOK','fraction'=>'Øre','division'=>'100'],
    ['origin'=>'Oman','name'=>'Omani rial','symbol'=>'ر.ع.','iso'=>'OMR','fraction'=>'Baisa','division'=>'1000'],
    ['origin'=>'Pakistan','name'=>'Pakistani rupee','symbol'=>'₨','iso'=>'PKR','fraction'=>'Paisa','division'=>'100'],
    ['origin'=>'Palau','name'=>'United States dollar','symbol'=>'$','iso'=>'USD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Palestine','name'=>'Israeli new shekel','symbol'=>'₪','iso'=>'ILS','fraction'=>'Agora','division'=>'100'],
    ['origin'=>'Palestine','name'=>'Jordanian dinar','symbol'=>'د.ا','iso'=>'JOD','fraction'=>'Piastre[M]','division'=>'100'],
    ['origin'=>'Panama','name'=>'Panamanian balboa','symbol'=>'B/.','iso'=>'PAB','fraction'=>'Centésimo','division'=>'100'],
    ['origin'=>'Panama','name'=>'United States dollar','symbol'=>'$','iso'=>'USD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Papua New Guinea','name'=>'Papua New Guinean kina','symbol'=>'K','iso'=>'PGK','fraction'=>'Toea','division'=>'100'],
    ['origin'=>'Paraguay','name'=>'Paraguayan guaraní','symbol'=>'₲','iso'=>'PYG','fraction'=>'Céntimo','division'=>'100'],
    ['origin'=>'Peru','name'=>'Peruvian sol','symbol'=>'S/.','iso'=>'PEN','fraction'=>'Céntimo','division'=>'100'],
    ['origin'=>'Philippines','name'=>'Philippine peso','symbol'=>'₱','iso'=>'PHP','fraction'=>'Sentimo','division'=>'100'],
    ['origin'=>'Pitcairn Islands','name'=>'New Zealand dollar','symbol'=>'$','iso'=>'NZD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Pitcairn Islands','name'=>'Pitcairn Islands dollar[E]','symbol'=>'$','iso'=>'PND','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Poland','name'=>'Polish złoty','symbol'=>'zł','iso'=>'PLN','fraction'=>'Grosz','division'=>'100'],
    ['origin'=>'Portugal','name'=>'Euro','symbol'=>'€','iso'=>'EUR','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Qatar','name'=>'Qatari riyal','symbol'=>'ر.ق','iso'=>'QAR','fraction'=>'Dirham','division'=>'100'],
    ['origin'=>'Romania','name'=>'Romanian leu','symbol'=>'lei','iso'=>'RON','fraction'=>'Ban','division'=>'100'],
    ['origin'=>'Russia','name'=>'Russian ruble','symbol'=>'₽','iso'=>'RUB','fraction'=>'Kopek','division'=>'100'],
    ['origin'=>'Rwanda','name'=>'Rwandan franc','symbol'=>'Fr','iso'=>'RWF','fraction'=>'Centime','division'=>'100'],
    ['origin'=>'Saba','name'=>'United States dollar[H]','symbol'=>'$','iso'=>'USD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Sahrawi Republic[N]','name'=>'Algerian dinar','symbol'=>'د.ج','iso'=>'DZD','fraction'=>'Santeem','division'=>'100'],
    ['origin'=>'Sahrawi Republic[N]','name'=>'Mauritanian ouguiya','symbol'=>'UM','iso'=>'MRU','fraction'=>'Khoums','division'=>'5'],
    ['origin'=>'Sahrawi Republic[N]','name'=>'Moroccan dirham','symbol'=>'د. م.','iso'=>'MAD','fraction'=>'Centime','division'=>'100'],
    ['origin'=>'Sahrawi Republic[N]','name'=>'Sahrawi peseta','symbol'=>'₧ or Ptas','iso'=>'(none)','fraction'=>'Centime','division'=>'100'],
    ['origin'=>'Saint Helena','name'=>'Saint Helena pound','symbol'=>'£','iso'=>'SHP','fraction'=>'Penny','division'=>'100'],
    ['origin'=>'Saint Kitts and Nevis','name'=>'Eastern Caribbean dollar','symbol'=>'$','iso'=>'XCD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Saint Lucia','name'=>'Eastern Caribbean dollar','symbol'=>'$','iso'=>'XCD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Saint Vincent and the Grenadines','name'=>'Eastern Caribbean dollar','symbol'=>'$','iso'=>'XCD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Samoa','name'=>'Samoan tālā','symbol'=>'T','iso'=>'WST','fraction'=>'Sene','division'=>'100'],
    ['origin'=>'San Marino','name'=>'Euro','symbol'=>'€','iso'=>'EUR','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'São Tomé and Príncipe','name'=>'São Tomé and Príncipe dobra','symbol'=>'Db','iso'=>'STN','fraction'=>'Cêntimo','division'=>'100'],
    ['origin'=>'Saudi Arabia','name'=>'Saudi riyal','symbol'=>'ر.س','iso'=>'SAR','fraction'=>'Halala','division'=>'100'],
    ['origin'=>'Senegal','name'=>'West African CFA franc','symbol'=>'Fr','iso'=>'XOF','fraction'=>'Centime','division'=>'100'],
    ['origin'=>'Serbia','name'=>'Serbian dinar','symbol'=>'дин. or din.','iso'=>'RSD','fraction'=>'Para','division'=>'100'],
    ['origin'=>'Seychelles','name'=>'Seychellois rupee','symbol'=>'₨','iso'=>'SCR','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Sierra Leone','name'=>'Sierra Leonean leone','symbol'=>'Le','iso'=>'SLL','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Singapore','name'=>'Singapore dollar','symbol'=>'$','iso'=>'SGD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Singapore','name'=>'Brunei dollar','symbol'=>'$','iso'=>'BND','fraction'=>'Sen','division'=>'100'],
    ['origin'=>'Sint Eustatius','name'=>'United States dollar[H]','symbol'=>'$','iso'=>'USD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Sint Maarten','name'=>'Netherlands Antillean guilder','symbol'=>'ƒ','iso'=>'ANG','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Slovakia','name'=>'Euro','symbol'=>'€','iso'=>'EUR','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Slovenia','name'=>'Euro','symbol'=>'€','iso'=>'EUR','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Solomon Islands','name'=>'Solomon Islands dollar','symbol'=>'$','iso'=>'SBD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Somalia','name'=>'Somali shilling','symbol'=>'Sh','iso'=>'SOS','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Somaliland','name'=>'Somaliland shilling','symbol'=>'Sl','iso'=>'SLS','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'South Africa','name'=>'South African rand','symbol'=>'R','iso'=>'ZAR','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'South Georgia and the South Sandwich Islands','name'=>'British pound','symbol'=>'£','iso'=>'GBP','fraction'=>'Penny','division'=>'100'],
    ['origin'=>'South Ossetia','name'=>'Russian ruble','symbol'=>'₽','iso'=>'RUB','fraction'=>'Kopek','division'=>'100'],
    ['origin'=>'Spain','name'=>'Euro','symbol'=>'€','iso'=>'EUR','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'South Sudan','name'=>'South Sudanese pound','symbol'=>'£','iso'=>'SSP','fraction'=>'Piaster','division'=>'100'],
    ['origin'=>'Sri Lanka','name'=>'Sri Lankan rupee','symbol'=>'Rs, රු or ரூ','iso'=>'LKR','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Sudan','name'=>'Sudanese pound','symbol'=>'ج.س.','iso'=>'SDG','fraction'=>'Piastre','division'=>'100'],
    ['origin'=>'Suriname','name'=>'Surinamese dollar','symbol'=>'$','iso'=>'SRD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Sweden','name'=>'Swedish krona','symbol'=>'kr','iso'=>'SEK','fraction'=>'Öre','division'=>'100'],
    ['origin'=>'Switzerland','name'=>'Swiss franc','symbol'=>'Fr.','iso'=>'CHF','fraction'=>'Centime[O]','division'=>'100'],
    ['origin'=>'Syria','name'=>'Syrian pound','symbol'=>'£ or ل.س','iso'=>'SYP','fraction'=>'Piastre','division'=>'100'],
    ['origin'=>'Taiwan','name'=>'New Taiwan dollar','symbol'=>'$','iso'=>'TWD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Tajikistan','name'=>'Tajikistani somoni','symbol'=>'ЅМ','iso'=>'TJS','fraction'=>'Diram','division'=>'100'],
    ['origin'=>'Tanzania','name'=>'Tanzanian shilling','symbol'=>'Sh','iso'=>'TZS','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Thailand','name'=>'Thai baht','symbol'=>'฿','iso'=>'THB','fraction'=>'Satang','division'=>'100'],
    ['origin'=>'Togo','name'=>'West African CFA franc','symbol'=>'Fr','iso'=>'XOF','fraction'=>'Centime','division'=>'100'],
    ['origin'=>'Tonga','name'=>'Tongan paʻanga[P]','symbol'=>'T$','iso'=>'TOP','fraction'=>'Seniti','division'=>'100'],
    ['origin'=>'Transnistria','name'=>'Transnistrian ruble','symbol'=>'р.','iso'=>'PRB','fraction'=>'Kopek','division'=>'100'],
    ['origin'=>'Trinidad and Tobago','name'=>'Trinidad and Tobago dollar','symbol'=>'$','iso'=>'TTD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Tristan da Cunha','name'=>'British pound[F]','symbol'=>'£','iso'=>'GBP','fraction'=>'Penny','division'=>'100'],
    ['origin'=>'Tunisia','name'=>'Tunisian dinar','symbol'=>'د.ت','iso'=>'TND','fraction'=>'Millime','division'=>'1000'],
    ['origin'=>'Turkey','name'=>'Turkish lira','symbol'=>'₺','iso'=>'TRY','fraction'=>'Kuruş','division'=>'100'],
    ['origin'=>'Turkmenistan','name'=>'Turkmenistan manat','symbol'=>'m','iso'=>'TMT','fraction'=>'Tennesi','division'=>'100'],
    ['origin'=>'Turks and Caicos Islands','name'=>'United States dollar','symbol'=>'$','iso'=>'USD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Tuvalu','name'=>'Tuvaluan dollar','symbol'=>'$','iso'=>'TVD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Tuvalu','name'=>'Australian dollar','symbol'=>'$','iso'=>'AUD','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Uganda','name'=>'Ugandan shilling','symbol'=>'Sh','iso'=>'UGX','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Ukraine','name'=>'Ukrainian hryvnia','symbol'=>'₴','iso'=>'UAH','fraction'=>'Kopiyka','division'=>'100'],
    ['origin'=>'Ukraine','name'=>'Russian ruble[Q][5]','symbol'=>'₽','iso'=>'RUB','fraction'=>'Kopek','division'=>'100'],
    ['origin'=>'United Arab Emirates','name'=>'United Arab Emirates dirham','symbol'=>'د.إ','iso'=>'AED','fraction'=>'Fils','division'=>'100'],
    ['origin'=>'United Kingdom','name'=>'British pound[F]','symbol'=>'£','iso'=>'GBP','fraction'=>'Penny','division'=>'100'],
    ['origin'=>'United States','name'=>'United States dollar','symbol'=>'$','iso'=>'USD','fraction'=>'Cent[A]','division'=>'100'],
    ['origin'=>'Uruguay','name'=>'Uruguayan peso','symbol'=>'$','iso'=>'UYU','fraction'=>'Centésimo','division'=>'100'],
    ['origin'=>'Uzbekistan','name'=>'Uzbekistani soʻm','symbol'=>'so\'m or сўм','iso'=>'UZS','fraction'=>'Tiyin','division'=>'100'],
    ['origin'=>'Vanuatu','name'=>'Vanuatu vatu','symbol'=>'Vt','iso'=>'VUV','fraction'=>'(none)','division'=>'(none)'],
    ['origin'=>'Vatican City','name'=>'Euro','symbol'=>'€','iso'=>'EUR','fraction'=>'Cent','division'=>'100'],
    ['origin'=>'Venezuela','name'=>'Venezuelan bolívar soberano','symbol'=>'Bs.S. or Bs.','iso'=>'VES','fraction'=>'Céntimo','division'=>'100'],
    ['origin'=>'Vietnam','name'=>'Vietnamese đồng','symbol'=>'₫','iso'=>'VND','fraction'=>'Hào[R]','division'=>'10'],
    ['origin'=>'Wallis and Futuna','name'=>'CFP franc','symbol'=>'₣','iso'=>'XPF','fraction'=>'Centime','division'=>'100'],
    ['origin'=>'Yemen','name'=>'Yemeni rial','symbol'=>'﷼','iso'=>'YER','fraction'=>'Fils','division'=>'100'],
    ['origin'=>'Zambia','name'=>'Zambian kwacha','symbol'=>'ZK','iso'=>'ZMW','fraction'=>'Ngwee','division'=>'100'],
    ['origin'=>'Zimbabwe','name'=>'RTGS Dollar[6]','symbol'=>'(none)','iso'=>'(none)','fraction'=>'(none)','division'=>'(none)'],
];

const MAIL_DOMAINS = [
    "gmail.com",
    "yahoo.com",
    "yahoo.com.ph",
    "hotmail.com",
    "aol.com",
    "msn.com",
    "comcast.net",
    "live.com",
    "rediffmail.com",
    "ymail.com",
    "outlook.com",
    "cox.net",
    "sbcglobal.net",
    "verizon.net",
    "live.co.uk",
    "googlemail.com",
    "bigpond.com",
    "alice.it",
    "rocketmail.com",
];

const PHONE_PREFIXES = [
    "0817",
    "0905",
    "0906",
    "0915",
    "0916",
    "0917",
    "0926",
    "0927",
    "0935",
    "0936",
    "0937",
    "0945",
    "0953",
    "0954",
    "0955",
    "0956",
    "0963",
    "0964",
    "0965",
    "0966",
    "0967",
    "0975",
    "0976",
    "0977",
    "0994",
    "0995",
    "0996",
    "0997",
    "0813",
    "0900",
    "0907",
    "0908",
    "0909",
    "0910",
    "0911",
    "0912",
    "0913",
    "0914",
    "0918",
    "0919",
    "0920",
    "0921",
    "0928",
    "0929",
    "0930",
    "0938",
    "0939",
    "0940",
    "0946",
    "0947",
    "0948",
    "0949",
    "0950",
    "0951",
    "0957",
    "0958",
    "0959",
    "0960",
    "0961",
    "0968",
    "0969",
    "0970",
    "0971",
    "0980",
    "0981",
    "0982",
    "0985",
    "0989",
    "0992",
    "0998",
    "0999",
    "0922",
    "0923",
    "0924",
    "0925",
    "0931",
    "0932",
    "0933",
    "0934",
    "0941",
    "0942",
    "0943",
    "0944",
    "0951",
    "0952",
    "0962",
    "0971",
    "0972",
    "0977",
    "0978",
    "0979",
    "0980",
    "0973",
    "0974",
    "0920",
    "0901",
    "0902",
    "0903",
    "0904",
    "0983",
    "0984",
    "0986",
    "0987",
    "0988",
    "0990",
    "0991",
    "0993",
];

const NATIONALITIES = [
    "Afghanistan" => "Afghan",
    "Albania" => "Albanian",
    "Algeria" => "Algerian",
    "American Samoa" => "American Samoan",
    "Andorra" => "Andorran",
    "Angola" => "Angolan",
    "Anguilla" => "Anguillan",
    "Antigua and Barbuda" => "Antiguan, Barbudan",
    "Antarctica (the territory South of 60 deg S)" => "N/A",
    "Argentina" => "Argentine",
    "Armenia" => "Armenian",
    "Aruba" => "Aruban; Dutch",
    "Australia" => "Australian",
    "Austria" => "Austrian",
    "Azerbaijan" => "Azerbaijani",
    "Bahamas" => "Bahamian",
    "Bahamas, The" => "Bahamian",
    "Bahrain" => "Bahraini",
    "Bangladesh" => "Bangladeshi",
    "Barbados" => "Barbadian/Bajan",
    "Belarus" => "Belarusian",
    "Belgium" => "Belgian",
    "Belize" => "Belizean",
    "Benin" => "Beninese",
    "Bermuda" => "Bermudian",
    "Bhutan" => "Bhutanese",
    "Bolivia" => "Bolivian",
    "Bosnia and Herzegovina" => "Bosnian, Herzegovinian",
    "Botswana" => "Motswana",
    "Bouvet Island" => "Bouvet Islander",
    "Bouvet Island (Bouvetoya)" => "Bouvet Islander",
    "Brazil" => "Brazilian",
    "British Virgin Islands" => "British Virgin Islander",
    "British Indian Ocean Territory (Chagos Archipelago)" => "British",
    "Brunei" => "Bruneian",
    "Brunei Darussalam" => "Bruneian",
    "Bulgaria" => "Bulgarian",
    "Burkina Faso" => "Burkinabe",
    "Burma" => "Burmese",
    "Burundi" => "Burundian",
    "Cabo Verde" => "Cabo Verdean",
    "Cambodia" => "Cambodian",
    "Cameroon" => "Cameroonian",
    "Canada" => "Canadian",
    "Cape Verde" => "Cape Verdean",
    "Cayman Islands" => "Caymanian",
    "Central African Republic" => "Central African",
    "Chad" => "Chadian",
    "Chile" => "Chilean",
    "China" => "Chinese",
    "Christmas Island" => "Christmas Islander",
    "Cocos (Keeling) Islands" => "Cocos Islander",
    "Colombia" => "Colombian",
    "Comoros" => "Comoran",
    "Congo" => "Congolese or Congo",
    "Congo, Democratic Republic of the" => "Congolese or Congo",
    "Congo, Republic of the" => "Congolese or Congo",
    "Cook Islands" => "Cook Islander",
    "Costa Rica" => "Costa Rican",
    "Cote d'Ivoire" => "Ivoirian",
    "Croatia" => "Croatian",
    "Cuba" => "Cuban",
    "Curaçao" => "Curacaoan/Dutch",
    "Cyprus" => "Cypriot",
    "Czechia" => "Czech",
    "Czech Republic" => "Czech",
    "Denmark" => "Danish",
    "Djibouti" => "Djiboutian",
    "Dominica" => "Dominican",
    "Dominican Republic" => "Dominican",
    "Ecuador" => "Ecuadorian",
    "Egypt" => "Egyptian",
    "El Salvador" => "Salvadoran",
    "Equatorial Guinea" => "Equatorial Guinean or Equatoguinean",
    "Eritrea" => "Eritrean",
    "Estonia" => "Estonian",
    "Ethiopia" => "Ethiopian",
    "Falkland Islands (Malvinas)" => "Falkland Islander",
    "Falkland Islands (Islas Malvinas)" => "Falkland Islander",
    "Faroe Islands" => "Faroese",
    "Fiji" => "Fijian",
    "Finland" => "Finnish",
    "France" => "French",
    "French Guiana" => "Guianian",
    "French Polynesia" => "French Polynesian",
    "French Southern Territories" => "French",
    "Gabon" => "Gabonese",
    "Gambia" => "Gambian",
    "Gambia, The" => "Gambian",
    "Gaza Strip" => "Palestinian",
    "Georgia" => "Georgian",
    "Germany" => "German",
    "Ghana" => "Ghanaian",
    "Gibraltar" => "Gibraltar",
    "Greece" => "Greek",
    "Greenland" => "Greenlandic",
    "Grenada" => "Grenadian",
    "Guam" => "Guamanian",
    "Guadeloupe" => "Guadeloupean",
    "Guatemala" => "Guatemalan",
    "Guernsey" => "Channel Islander",
    "Guinea-Bissau" => "Bissau-Guinean",
    "Guinea" => "Guinean",
    "Guyana" => "Guyanese",
    "Haiti" => "Haitian",
    "Heard Island and McDonald Islands" => "Australian",
    "Holy See (Vatican City)" => "N/A",
    "Holy See (Vatican City State)" => "N/A",
    "Honduras" => "Honduran",
    "Hong Kong" => "Chinese/Hong Kong",
    "Hungary" => "Hungarian",
    "Iceland" => "Icelandic",
    "India" => "Indian",
    "Indonesia" => "Indonesian",
    "Iran" => "Iranian",
    "Iraq" => "Iraqi",
    "Ireland" => "Irish",
    "Isle of Man" => "Manx",
    "Israel" => "Israeli",
    "Italy" => "Italian",
    "Jamaica" => "Jamaican",
    "Japan" => "Japanese",
    "Jersey" => "Channel Islander",
    "Jordan" => "Jordanian",
    "Kazakhstan" => "Kazakhstani",
    "Kenya" => "Kenyan",
    "Kiribati" => "I-Kiribati",
    "Korea" => "Korean",
    "Korea, North" => "Korean",
    "Korea, South" => "Korean",
    "Kosovo" => "Kosovski",
    "Kuwait" => "Kuwaiti",
    "Kyrgyzstan" => "Kyrgyzstani",
    "Kyrgyz Republic" => "Kyrgyzstani",
    "Laos" => "Laotian",
    "Lao People's Democratic Republic" => "Laotian",
    "Latvia" => "Latvian",
    "Lebanon" => "Lebanese",
    "Lesotho" => "Basotho",
    "Liberia" => "Liberian",
    "Libya" => "Libyan",
    "Libyan Arab Jamahiriya" => "Libyan",
    "Liechtenstein" => "Liechtenstein",
    "Lithuania" => "Lithuanian",
    "Luxembourg" => "Luxembourg",
    "Macao" => "Chinese",
    "Macau" => "Chinese",
    "Macedonia" => "Macedonian",
    "Madagascar" => "Malagasy",
    "Malawi" => "Malawian",
    "Malaysia" => "Malaysian",
    "Maldives" => "Maldivian",
    "Mali" => "Malian",
    "Malta" => "Maltese",
    "Martinique" => " Martiniquean",
    "Marshall Islands" => "Marshallese",
    "Mauritania" => "Mauritanian",
    "Mauritius" => "Mauritian",
    "Mayotte" => "Mahoran",
    "Mexico" => "Mexican",
    "Micronesia" => "Micronesian",
    "Moldova" => "Moldovan",
    "Monaco" => "Monegasque/Monacan",
    "Mongolia" => "Mongolian",
    "Montenegro" => "Montenegrin",
    "Montserrat" => "Montserratian",
    "Morocco" => "Moroccan",
    "Mozambique" => "Mozambican",
    "Myanmar" => "Burmese",
    "Namibia" => "Namibian",
    "Nauru" => "Nauruan",
    "Nepal" => "Nepali",
    "Netherlands" => "Dutch",
    "Netherlands Antilles" => "Netherlands Antillean",
    "New Caledonia" => "New Caledonian",
    "New Zealand" => "New Zealand",
    "Nicaragua" => "Nicaraguan",
    "Nigeria" => "Nigerian",
    "Niger" => "Nigerien",
    "Niue" => "Niuean",
    "Norfolk Island" => "Norfolk Islander",
    "Northern Mariana Islands" => "Northern Mariana Islander",
    "Norway" => "Norwegian",
    "Oman" => "Omani",
    "Pakistan" => "Pakistani",
    "Palau" => "Palauan",
    "Panama" => "Panamanian",
    "Papua New Guinea" => "Papua New Guinean",
    "Paraguay" => "Paraguayan",
    "Peru" => "Peruvian",
    "Philippines" => "Filipino",
    "Pitcairn Islands" => "Pitcairn Islander",
    "Poland" => "Polish",
    "Portugal" => "Portuguese",
    "Puerto Rico" => "Puerto Rican",
    "Qatar" => "Qatari",
    "Reunion" => "Reunion Islander",
    "Reunion Island" => "Reunion Islander",
    "Réunion Island" => "Reunion Islander",
    "Romania" => "Romanian",
    "Russia" => "Russian",
    "Russian Federation" => "Russian",
    "Rwanda" => "Rwandan",
    "Saint Barthelemy" => "Saint Barthelemian",
    "Saint Helena" => "Saint Helenian",
    "Saint Helena, Ascension, and Tristan da Cunha" => "Saint Helenian",
    "Saint Kitts and Nevis" => "Kittitian, Nevisian",
    "Saint Lucia" => "Saint Lucian",
    "Saint Martin" => "Saint Martin Islander",
    "Saint Pierre and Miquelon" => "French",
    "Saint Vincent and the Grenadines" => "Saint Vincentian or Vincentian",
    "Samoa" => "Samoan",
    "San Marino" => "Sammarinese",
    "Sao Tome and Principe" => "Sao Tomean",
    "Saudi Arabia" => "Saudi or Saudi Arabian",
    "Senegal" => "Senegalese",
    "Serbia" => "Serbian",
    "Seychelles" => "Seychellois",
    "Sierra Leone" => "Sierra Leonean",
    "Singapore" => "Singapore",
    "Slovakia" => "Slovak",
    "Slovakia (Slovak Republic)" => "Slovak",
    "Slovenia" => "Slovenian",
    "Solomon Islands" => "Solomon Islander",
    "Somalia" => "Somali",
    "South Africa" => "South African",
    "South Georgia and the South Sandwich Islands" => "South Georgian",
    "South Sudan" => "South Sudanese",
    "Spain" => "Spanish",
    "Sri Lanka" => "Sri Lankan",
    "Sudan" => "Sudanese",
    "Suriname" => "Surinamese",
    "Svalbard & Jan Mayen Islands" => "Norwegian",
    "Swaziland" => "Swazi",
    "Sweden" => "Swedish",
    "Switzerland" => "Swiss",
    "Syria" => "Syrian",
    "Syrian Arab Republic" => "Syrian",
    "Taiwan" => "Taiwanese",
    "Tajikistan" => "Tajikistani",
    "Tanzania" => "Tanzanian",
    "Thailand" => "Thai",
    "Timor-Leste" => "Timorese",
    "Togo" => "Togolese",
    "Tokelau" => "Tokelauan",
    "Tonga" => "Tongan",
    "Trinidad and Tobago" => "Trinidadian, Tobagonian",
    "Tunisia" => "Tunisian",
    "Turkey" => "Turkish",
    "Turkmenistan" => "Turkmen",
    "Turks and Caicos Islands" => "Turks and Caicos Islands",
    "Tuvalu" => "Tuvaluan",
    "Uganda" => "Ugandan",
    "Ukraine" => "Ukrainian",
    "United Arab Emirates" => "Emirati",
    "United Kingdom" => "British",
    "United States" => "American",
    "United States of America" => "American",
    "United States Minor Outlying Islands" => "American",
    "United States Virgin Islands" => "American",
    "Uruguay" => "Uruguayan",
    "U.S.A" => "American",
    "USA" => "American",
    "Uzbekistan" => "Uzbekistani",
    "Vanuatu" => "Ni-Vanuatu",
    "Venezuela" => "Venezuelan",
    "Vietnam" => "Vietnamese",
    "Virgin Islands" => "Virgin Islander",
    "Wallis and Futuna" => "Wallisian, Futunan, or Wallis and Futuna Islander",
    "West Bank" => "Palestinian",
    "Palestinian Territories" => "Palestinian",
    "Western Sahara" => "Sahrawi, Sahrawian, Sahraouian",
    "Yemen" => "Yemeni",
    "Zambia" => "Zambian",
    "Zimbabwe" => "Zimbabwean",
];

const WEEKDAYS = [
    'Sunday',
    'Monday',
    'Tuesday',
    'Wednesday',
    'Thursday',
    'Friday',
    'Saturday',
];

const MONTHS = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
    'July',
    'August',
    'September',
    'October',
    'November',
    'December',
];
// endregion CONSTANTS

if( !function_exists( "acronym") ){
    function acronym($str) {
        $ret = '';
        foreach (explode(' ', $str) as $word)
            $ret .= strtoupper($word[0]);
        return $ret;
    }
}

if( !function_exists ( "explode_to_keys") ){
    function explode_to_keys( $delimiter, $array, $value=null ){
        $data = explode( $delimiter, $array );

        $result = [];
        foreach( $data as $datum ){
            $result[ $datum ] = $value;
        }

        return $result;
    }
}

if( !function_exists("get_email_domains") ){
    function get_email_domains(){
        return MAIL_DOMAINS;
    }
}

if( !function_exists( "get_ph_phone_prefixes") ){
    function get_ph_phone_prefixes(){
        return PHONE_PREFIXES;
    }
}

if( !function_exists("get_currency_iso_list") ){
    function get_currency_iso_list(){
        return get_currencies( true )->pluck("iso")->unique()->toArray();
    }
}

if( !function_exists( "get_currencies") ){
    function get_currencies( $as_collection=false ){
        if( $as_collection ){
            return collect( CURRENCIES );
        }
        return collect( CURRENCIES )->toArray();
    }
}

if( !function_exists( "get_months") ){
    function get_months( $as_collection=false ){
        if( $as_collection ){
            return collect( MONTHS );
        }
        return collect( MONTHS )->toArray();
    }
}

if( !function_exists( "get_week_days") ){
    function get_week_days( $as_collection=false ){
        if( $as_collection ){
            return collect( WEEKDAYS );
        }
        return collect( WEEKDAYS )->toArray();
    }
}

if( !function_exists( "is_currency" ) ){
    function is_currency( $value, $options=[], callable $callback = null ){
        $data = [
            "code" => 200,
            "message" => "Valid currency",
            "description" => "",
            "data" => [
                "is_currency" => true,
                "currency" => "",
                "value" => "",
            ]
        ];

        if( !is_numeric( $value) ){
            $test_split = explode(" ", $value );
            $has_value = false;

            foreach( $test_split as $v ){
                if( is_numeric( $v ) && $v >= 0 ){
                    $has_value = true;
                    $value = $v;
                }

                if( in_array( $v, get_currency_iso_list() ) ){
                    $data['data']['currency'] = $v;
                }
            }

            if( !$has_value ){
                $data['data']['is_currency'] = false;
                $data['message'] = "Invalid currency. Not a number.";
            }
        }

        if( $value < 0 && ( isset($options['allow_negative']) && $options['allow_negative'] !== true ) ){
            $data['data']['is_currency'] = false;
            $data['message'] = "Invalid currency. Shall not be less than zero.";
            $data['description'] = "Enable 'allow_negative' to skip check.";
        }

        $data['data']['value'] = $value;

        if( !$data['data']['is_currency'] ){
            $data['code'] = 500;
        }

        $response = new Response( $data );

        if( $callback ){
            return $callback( $response );
        }

        if( isset($options['as_array'] ) && $options['as_array'] === true ){
            return $response->getResponse();
        }

        return $response->isSuccess();
    }
}

if( !function_exists("is_data_plural") ){
    function is_data_single( $data ){
        return isset( $data['single'] ) ? $data['single'] : false;
    }
}

if( !function_exists("is_data_plural") ){
    function is_data_plural( $data ){
        return !is_data_single( $data );
    }
}

if( !function_exists("get_plural") ){
    function get_plural( $string, $data=[] ){
        if( !empty( $data ) && !is_data_plural( $data ) ){
            return $string;
        }

        return \Illuminate\Support\Str::plural( $string );
    }
}

if( !function_exists( "get_gender_of") ){
    function get_gender_of( &$target, $gender, $string ){
        return get_gender_from_format( $string )[ $target ][ get_binary_gender( $gender ) ];
    }
}

if( !function_exists( "get_binary_gender") ){
    function get_binary_gender( $gender ){
        return $gender === "male" ? 1 : 0;
    }
}

if( !function_exists( "get_gender_from_format") ){
    function get_gender_from_format( $string ){
        $first = explode( "-", $string );

        $_set = count( (array) $first ) > 1 ? $first : [ $string, $string ];

        $genders = [];
        foreach( $_set as $key => $value ){
            $_check = explode(":", $value );
            $genders[ $key ] = count( (array) $_check ) > 1 ? $_check : [ $value, $value ];
        }

        return $genders;
    }
}

if( !function_exists ( "get_masked_credit_card") ){
    function get_masked_credit_card( $number, $maskingCharacter='X' ){
        return substr($number, 0, 4) .
            str_repeat($maskingCharacter, strlen($number) - 8) .
            substr($number, -4);
    }
}

if( !function_exists( "get_nationality") ){
    function get_nationality( $country ){
        return NATIONALITIES[ $country ];
    }
}

if( !function_exists("monetize") ){
    function monetize( $amount, $zero_fill="", $currency="$", $prepend = true, $spaced=false ){
        if( trim( $zero_fill != "" ) ){
            if( $amount <= 0 || $amount === null || trim($amount ) == "" ){
                return $zero_fill;
            }
        }

        if( trim( $amount ) == "" ){
            return "";
        }

        return $prepend ? $currency . ( $spaced ? " " : "" ) . $amount : $amount . " " . $currency;
    }
}

if( !function_exists("next_line") ){
    function next_line( $type="sf" ){
        $line = "";
        switch( $type ){
            case "sf":
                $line = "\r\n";
                break;
        }
        return $line;
    }
}

if( !function_exists ( "sql_order_with_field" ) ){
    function sql_order_with_field( $target, array $data ){
        return "FIELD(`" . $target . "`," . implode_with_quotes ( ",", $data ) . ")";
    }
}

if( !function_exists ( "split_full_name" ) ){
    function split_full_name( $name, $target="", $reverse=true ){
        $temp_name = preg_split('/\s+/', $name );
        $first_name = implode(' ', array_slice($temp_name, 0, 1));
        $last_name = implode(' ', array_slice($temp_name, 1));

        if( $reverse ){
            swap_values ( $first_name, $last_name );
        }

        if( $target != "" ){
            switch( $target ){
                case "first":
                    return $first_name;
                    break;
                case "last":
                    return $last_name;
                    break;
            }
        }

        return [
            "first_name" => $first_name,
            "last_name" => $last_name,
        ];
    }
}

if( !function_exists("to_single_slash") ){
    function to_friendly_keys($input) {
        return snake_case ( strtolower ( $input ) );
    }
}

if( !function_exists("to_single_slash") ){
    function to_single_slashes($input) {
        return preg_replace('~(^|[^:])//+~', '\\1/', $input);
    }
}

if( !function_exists("wrap_with") ){
    function wrap_with ( $string, $with = "brackets", $both = true, $separator = "" )
    {
        $surround = [
            'brackets' => "[ ]",
            'parenthesis' => "( )",
            'comparator' => "< >",
        ];

        $characters = explode ( " ", $surround[ $with ] );

        if ( !$characters ) {
            return $string;
        }

        $string = $characters[ 0 ] . $separator . $string;

        if ( $both ) {
            $string = $string . $separator . $characters[ 1 ];
        }

        return $string;
    }
}

<?php

namespace application\models;

class APIRequest{
    private static $apiKey = '8a00eb9d39104bd481105224e378ecce';
    private static $categoryList = ['business', 'entertainment', 'general', 'health', 'science', 'sports', 'technology'];
    private static $countryList = ['United Arab Emirates' => 'ae', 'Argentina' => 'ar', 'Austria' => 'at',
                            'Australia' => 'au', 'Belgium' => 'be', 'Bulgaria' => 'bg', 'Brazil' => 'br', 
                            'Canada' => 'ca', 'Switzerland' => 'ch', 'China' => 'cn', 'Colombia' => 'co',
                            'Cuba' => 'cu', 'Czechia' => 'cz', 'Germany' => 'de', 'Egypt' => 'eg',
                            'France' => 'fr', 'United Kingdom' => 'gb', 'Greece' => 'gr', 'Hong Kong' => 'hk',
                            'Hungary' => 'hu', 'Indonesia' => 'id', 'Ireland' => 'ie', 'Israel' => 'il',
                            'India' => 'in', 'Italy' => 'it', 'Japan' => 'jp', 'Korea' => 'kr', 'Lithuania' => 'lt',
                            'Latvia' => 'lv', 'Morocco' => 'ma', 'Mexico' => 'mx', 'Malaysia' => 'my', 'Nigeria' => 'ng',
                            'Netherlands' => 'nl', 'Norway' => 'no', 'New Zealand' => 'nz', 'Philippines' => 'ph',
                            'Poland' => 'pl', 'Portugal' => 'pt', 'Romania' => 'ro', 'Serbia' => 'rs',
                            'Russia' => 'ru', 'Saudi Arabia' => 'sa', 'Sweden' => 'se', 'Singapore' => 'sg',
                            'Slovenia' => 'si', 'Slovakia' => 'sk', 'Thailand' => 'th', 'Turkey' => 'tr',
                            'Taiwan' => 'tw', 'Ukraine' => 'ua', 'United States' => 'us', 'Venezuela' => 've', 'South Africa' => 'za'];

    /**
     * @param $country
     * @return mixed|string
     */
    public static function getCountry($country) {
        if (!in_array($country, self::$countryList)) {
            return 'ua';
        }
        return self::$countryList[$country];
    }

    public static function getCategoryList() {
        return self::$categoryList;
    }

    public static function getSources() {
        $requestString = "https://newsapi.org/v2/sources?apiKey=" . self::$apiKey;

        $sources = file_get_contents($requestString);

        if ($sources['status'] = 'ok') {
            foreach ($sources['sources'] as $value) {
                $result[$value['name']] = $value['id'];
            }
        }
    }
}

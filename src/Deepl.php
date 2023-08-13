<?php

namespace Salmanbe\Deepl;

class Deepl
{
    /**
     * To store api url
     * @var integer
     */
    private $api_url = null;

    /**
     * Class constructor to initialize api url
     * @return void
     */
    public function __construct()
    {
        if (!$this->api_url) {
            $this->api_url = config('app.deepl_url') . '?auth_key=' . config('app.deepl_key');
        }
    }

    /**
     * Function makes an API call to get translations
     * @param string $text
     * @param string $target_lang
     * @param string $source_lang
     * @return string
     */
    public function get($text = null, $target_lang = null, $source_lang = null)
    {
        if (!$text || !$target_lang) {
            return 'Error: Text or target language not given';
        }

        $url = $this->api_url . '&text=' . urlencode($text) . '&source_lang=' . $source_lang . '&target_lang=' . $target_lang;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $response = json_decode(curl_exec($curl));

        curl_close($curl);

        return isset($response->translations[0]->text) ? $response->translations[0]->text : null;
    }
}
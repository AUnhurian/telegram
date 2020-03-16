<?php

namespace ELWAHAB;

class BaseTelegram
{
    protected $token;
    protected $base_url = 'https://api.telegram.org/bot';

    /**
     * The function sends any method to the telegram for processing
     *
     * @param    typeMethod string
     * @param    params array with params for Telegram API
     * @return    result json result from Telegram API
     * @author    Andrii_Unhurian
     */
    protected function methodType($typeMethod = 'sendMessage', $params)
    {
        $baseURL = $this->base_url . $this->token .'/';
        $baseURL .= $typeMethod;

        $url = $baseURL. '?'. http_build_query($params);

        $result = $this->curlQuery($url);
        return $result;
    }

    /**
     * Function for get json, and other
     *
     * @param     url string
     * @param     header array with headers
     * @param     fields array with post fields
     * @param     typePOST string, type send post
     * @param     cookieFile string, cookie file with site
     * @return    content string
     * @author    Andrii_Unhurian
     */
    protected function curlQuery($url, $header = false, $fields = null, $typePOST = 'http', $cookieFile = 'cookie.txt'){
    	$curl = curl_init();

    	$option = [
    			CURLOPT_URL => $url,
    			CURLOPT_HEADER => $header,
    			CURLOPT_RETURNTRANSFER => true,
    			CURLOPT_FOLLOWLOCATION => true
    			];

    	if(!empty($fields)){
            if (strpos($typePOST, 'http') !== false) {
                $option[CURLOPT_POSTFIELDS] = http_build_query($fields);
            }elseif (strpos($typePOST, 'json') !== false) {
                $option[CURLOPT_POSTFIELDS] = json_encode($fields);
            }else{
                $option[CURLOPT_POSTFIELDS] = $fields;
            }
    	}

    	$option[CURLOPT_COOKIEFILE] = $cookieFile;
    	$option[CURLOPT_COOKIEJAR] = $cookieFile;

    	curl_setopt_array($curl, $option);

    	$content = curl_exec($curl);
    	curl_close($curl);

    	return $content;
    }

}

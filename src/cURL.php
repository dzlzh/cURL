<?php

namespace cURL;

/**
 * Class cURL
 * @author DZLZH
 */
class cURL
{
    //User-Agent 头
    public $userAgent = 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36';

    public $curl = '';

    /**
     * get
     *
     * @return array
     */
    public function get($url, $userAgent = null, $header = 0)
    {
        $this->userAgent = $userAgent ? $userAgent : $this->userAgent;
        $this->curl = curl_init();
        $curl_setopt_array($this->curl, array(
            CURLOPT_URL            => $url,
            CURLOPT_HEADER         => $header,
            CURLOPT_USERAGENT      => $this->userAgent,
            CURLOPT_RETURNTRANSFER => true,
        ));
        $ret['data'] = curl_exec($this->curl);
        $ret['info'] = curl_getinfo($this->curl);
        curl_close($this->curl);
        return $ret;
    }

    /**
     * post
     *
     * @return array
     */
    public function post($url, $param = null, $userAgent = null, $header = 0)
    {
        $this->userAgent = $userAgent ? $userAgent : $this->userAgent;
        $this->curl = curl_init();
        $curl_setopt_array($this->curl, array(
            CURLOPT_URL            => $url,
            CURLOPT_HEADER         => $header,
            CURLOPT_USERAGENT      => $this->userAgent,
            CURLOPT_RETURNTRANSFER => true,
        ));
        if ($param != null) {
            curl_setopt($this->curl, CURLOPT_POST, true);
            curl_setopt($this->curl, CURLOPT_POSTFIELDS, $param);
        }
        $ret['data'] = curl_exec($this->curl);
        $ret['info'] = curl_getinfo($this->curl);
        curl_close($this->curl);
        return $ret;
    }
}

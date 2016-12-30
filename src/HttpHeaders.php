<?php

namespace Alc\HttpHeaders;

class HttpHeaders {

    const FORMAT_CURL = 1;
    const FORMAT_GUZZLE = 2;

    /**
     * Get file
     *
     * @param string filename
     *
     * @return string content
     */
    public function getFile($filename) {

        $filename = realpath(__DIR__.'/../headers/'.$filename.'.txt');

        if(!file_exists($filename)) throw new \Exception('Filename doesnt exist.');

        return file_get_contents($filename);
    }

    /**
     * Get file
     *
     * @param string filename
     * @param int format
     *
     * @return array headers
     */
    public function getHeaders($filename, $format = self::FORMAT_GUZZLE) {

        $rawHeaders = $this->getFile($filename);

        preg_match_all('/(.+):\ (.+)/i', $rawHeaders, $matches);

        // Curl format
        if($format == self::FORMAT_CURL) return $matches[0];

        // Guzzle format
        $headers = array();

        foreach($matches[0] as $i => $matche) {
            $headers[$matches[1][$i]] = $matches[2][$i];
        }

        return $headers;
    }

    /**
     * Get Firefox headers
     *
     * @param int format
     * @param string platfom
     * @param string lang
     *
     * @return array headers
     */
    public function getFirefox($format = self::FORMAT_GUZZLE, $platfom = 'win7', $lang = 'en') {

        return $this->getHeaders($platfom.'-firefox-'.$lang, $format);
    }

    /**
     * Get Chrome headers
     *
     * @param int format
     * @param string platfom
     * @param string lang
     *
     * @return array headers
     */
    public function getChrome($format = self::FORMAT_GUZZLE, $platfom = 'win7', $lang = 'en') {

        return $this->getHeaders($platfom.'-chrome-'.$lang, $format);
    }
}

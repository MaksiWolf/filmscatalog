<?php

class Parse
{
    public function fetchData($url, $method = "GET", $arr = [])
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, "User-Agent: Mozilla/4.0");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        if($method == 'POST') curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($arr, '', '&'));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    public function getKino($url)
    {
        $result = $this->fetchData($url);
        return $result;
    }

    public function matchHtml($html, $total)
    {
        preg_match_all('/(<)(a)( )(href)(=).*?(class)(=)(")(all)(")(>).*?(a)(>)/is', $html, $matches);
        $i = 0;
        $billetHtml = '';
        while ($i <= $total) {
            $billetHtml .= $matches[0][$i + 1];
            $i++;
        }
        return $billetHtml;
    }

    public function getRating($html)
    {
        preg_match_all('/(class)(=)(")(continue)(")(>).*?(a)(>)/is', $html, $matches);
        $resultArr = [];
        foreach ($matches[0] as $key => $element) {
            $result = str_replace('class="continue">', '', $element);
            $result = str_replace('"', '', $result);
            $result = str_replace('a>', '', $result);
            $result = str_replace('</', '', $result);
            $resultArr[$key] = $result;
        }
        return $resultArr;
    }

    public function getNameAndYear($html)
    {
        preg_match_all('/(class)(=)("all")(>).*?(a)(>)/is', $html, $matches);
        $i = 0;
        $resultArr = [];
        foreach ($matches[0] as $key => $element) {
            $result = str_replace('class="all">', '', $element);
            $result = str_replace('a>', '', $result);
            $substr = substr(preg_replace('/[^,.0-9]/', '', $result), -4);

            $name = str_replace($substr, '', $result);
            $name = str_replace('()', '', $name);
            $name = str_replace('</', '', $name);

            $resultArr[$i]['name'] = $name;
            $resultArr[$i]['year'] = $substr;
            $i++;
        }
        return $resultArr;
    }

    public function getTotalPiople($html)
    {
        preg_match_all('/(#)(777)(")(>).*?(span)(>)/is', $html, $matches);
        $resultArr = [];
        foreach ($matches[0] as $key => $element) {
            $result = str_replace('#777">(', '', $element);
            $result = str_replace('&nbsp;', ' ', $result);
            $result = str_replace('</span>', '', $result);
            $resultArr[$key] = str_replace(')', '', $result);
        }
        return $resultArr;
    }
}
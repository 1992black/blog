<title>Black's Blog</title>
<?php
    $url_t66y = 'http://get.xunfs.com/app/listapp.php';
    $url_sex8 = 'http://119.9.105.94/index.html';
    $url_91porn = 'http://www.ebay.com/usr/91dizhi_1';
    
    //echo 'ip: '. getRealIp();
    write_file('t66y_ip.txt', getRealIp()."\r\n");
    get_t66y_url($url_t66y);
    get_sex8_url($url_sex8);
    get_91porn_url($url_91porn);
    
    function post_url($url, $data)
    {
        $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
        );
        $context  = stream_context_create($options);
        $html = file_get_contents($url, false, $context);
        return $html;
    }
    
    function get_url($url)
    {
        $html = file_get_contents($url);
        return $html;
    }
    
    function get_t66y_url($url_t66y)
    {
        echo '<br>t66y<br>';
    
        $data_t66y = array('a' => 'get17', 'system' => 'android', 'v' => '1.62');
        $html_t66y = post_url($url_t66y, $data_t66y);
        $reg_t66y = '(<a .*?a>)';
        preg_match_all ($reg_t66y,  
            $html_t66y,  
            $address_t66y);
        foreach($address_t66y[0] as $key => $value)
        {
            $value = str_replace('mobile.php?ismobile=yes', '', $value);
            echo $value.'<br>';
        }
    }
    
    function get_sex8_url($url_sex8)
    {
        echo '<br>sex8<br>';
    
        $html_sex8 = get_url($url_sex8);
        $reg_sex8 = '(<a .*?a>)';
        preg_match_all ($reg_sex8,  
            $html_sex8,  
            $address_sex8);
        foreach($address_sex8[0] as $key => $value)
        {
            if(!strstr($value, 'img'))   //不存在时
            {
                $reg = '(style=\".*?\")';
                $value = preg_replace($reg, '', $value);
                echo $value.'<br>';
            }
        }
    }
    
    function get_91porn_url($url_91porn)
    {
        echo '<br>91porn<br>';
    
        $html_91porn = get_url($url_91porn);
        $html_91porn = str_replace(PHP_EOL, '', $html_91porn);
        $reg_91porn = '(<h2 class=\"bio inline_value.*?h2>)';
        preg_match_all ($reg_91porn,  
            $html_91porn,  
            $address_91porn);
        foreach($address_91porn[0] as $key => $value)
        {
            if(strstr('jd.com', $value) == null)
            {
                $value_arry = split(' ', $value);
                $addr = end($value_arry);
                $addr = str_replace('</h2>', '', $addr);
                echo '<a href="http://'.$addr.'" target="_blank">'.$addr.'</a><br>';
            }
        }
    }
    
    function getRealIp()
    {
        $ip=false;
        if(!empty($_SERVER["HTTP_CLIENT_IP"])){
            $ip = $_SERVER["HTTP_CLIENT_IP"];
        }
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ips = explode (", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
            if ($ip) { array_unshift($ips, $ip); $ip = FALSE; }
            for ($i = 0; $i < count($ips); $i++) {
                if (!eregi ("^(10│172.16│192.168).", $ips[$i])) {
                    $ip = $ips[$i];
                    break;
                }
            }
        }
        return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
    }
    
    function write_file($file_name, $text)
    {
        $fw = fopen($file_name, 'a+');
        fwrite($fw, $text);
        fclose($fw);
    }
?>
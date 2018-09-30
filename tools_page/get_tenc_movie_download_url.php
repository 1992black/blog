<html>
<head>
    <meta charset="UTF-8">
    <title>Black's Blog</title>
</head>
<body>

<div style="text-align: center">
    <form action="get_tenc_movie_download_url.php" method="post">
        tenc url: <input type="text" name="url"><br><br>
        tenc vid: <input type="text" name="vid"><br><br>
        <input type="submit">
    </form>
</div>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $url = $_POST['url'];
    $vid = $_POST['vid'];
    if ($vid == null) {
        print_r($url . '<br>');
        $movie_html = http_get($url);
//    print_r($movie_html);
        $vid = get_movie_vid($movie_html, $url);
//    print_r($vid);
    }
    $get_info_url = get_get_info_url($vid);
    $get_info_body = http_get($get_info_url);
    $download_url_array = get_movie_download_url($get_info_body);
    foreach ($download_url_array as $download_url) {
        print $download_url . '<br>';
    }
}

function http_get($url)
{
//初始化
    $curl = curl_init();
//设置抓取的url
//curl_setopt($curl, CURLOPT_URL, "https://www.zhihu.com/");
    curl_setopt($curl, CURLOPT_URL, $url);
//设置头文件的信息作为数据流输出
    curl_setopt($curl, CURLOPT_HEADER, 1);
//设置获取的信息以文件流的形式返回，而不是直接输出。
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
// 跳过证书检查
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
// 从证书中检查SSL加密算法是否存在
//curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, true);
//执行命令
    $response = curl_exec($curl);

    $body = "";
    if (curl_getinfo($curl, CURLINFO_HTTP_CODE) == '200') {
        $headerSize = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $headerSize);
        $body = substr($response, $headerSize);
    }
//关闭URL请求
    curl_close($curl);

    return $body;
}

function get_movie_vid($html, $url)
{
//    print_r($url);
    $old_key_array = explode('/', $url);
    $old_key = end($old_key_array);
    $old_key_array = explode('.', $old_key);
    $old_key = current($old_key_array);
    if (strlen($old_key) == 11) {
        return $old_key;
    }
//    print_r($old_key);
    $pattern = "/(?:canonical.*?" . $old_key . "\/)(.*?)(?:.html)/";
//    print_r($pattern);
//    print_r($pattern);
    preg_match($pattern, $html, $match);
//    print_r($match);
    foreach ($match as $vid) {
        if (strlen($vid) == 11) {
            return $vid;
        }
    }

    return $match[0];
}

function get_get_info_url($vid)
{
    $get_info_url = "https://h5vv.video.qq.com/getinfo?platform=11001&ehost=https://v.qq.com&vids=" . $vid . "&otype=json";
    return $get_info_url;
}

function get_movie_download_url($data)
{
    $data = substr($data, 13, strlen($data) - 13 - 1);
    $json_data = json_decode($data, true);
    $vl_json_data = $json_data['vl'];
    $vi_json_data = current($vl_json_data['vi']);
    $ul_json_data = $vi_json_data['ul'];
    $ui_json_data = $ul_json_data['ui'];

    $url_head_array = array();
    foreach ($ui_json_data as $ui) {
        $download_url = $ui['url'];
        $url_head_array[] = $download_url;
    }

    $download_movie_name = $vi_json_data['fn'];
    $download_movie_key = $vi_json_data['fvkey'];

    $download_url_array = array();
    foreach ($url_head_array as $download_url) {
        $download_url_array[] = $download_url . $download_movie_name . '?fmt=sd&vkey=' . $download_movie_key;
    }

    return $download_url_array;
}

?>


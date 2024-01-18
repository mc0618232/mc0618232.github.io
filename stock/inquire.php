[php]
$buy =61.85;//你買入的時候股價
$ch = curl_init();

$timeout = 10;

curl_setopt($ch, CURLOPT_URL,’http://www.google.com.hk/finance?q=TPE%3A3130&client=fss&ei=8w6kWPGeL4OV0ATSkrHYDw’);//貼上你複製的連結

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($ch, CURLOPT_ENCODING, ‘gzip’);

curl_setopt($ch, CURLOPT_USERAGENT, ‘Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) chrome/34.0.1847.131 Safari/537.36’);

curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);

$html = curl_exec($ch);

preg_match_all(‘/([^]+)/’,$html,$target);//這裡是抓股價的重點 請使用 chrome 按右鍵檢查功能 將滑鼠移到 目前股價的區塊 去看他 span id="xxxx" 這個id每個股票都不一樣 所以一定要置換

echo ‘購入股價：’.$buy.'’;
echo ‘現在股價：’.$target[1][0].'’;
echo ($target[1][0]>$buy?'’.($target[1][0]-$buy).'’:' ‘.($target[1][0]-$buy).'’);// 紅色表示 你發達了 比你買入時還高 綠色表示 你賠錢了>

?>
[/php]


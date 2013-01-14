<?php
/**
 * 抓取多页面
 *
 * @param array $urls
 * @return array 返回的数组是以url为key的数组
 */
function get_by_curl(array $urls)
{
    // 创建一个列队
    $mh = curl_multi_init();

    //监听列队
    $listener_list = array();
    foreach ($urls as $url)
    {
    
        // 创建一个curl对象
        $current = create_curl($url);
        
        // 将curl对象加入列队
        curl_multi_add_handle($mh, $current);
        
        // 记录监听列队
        $listener_list[$url] = $current;
    }
    // 删除多余的变量
    unset($current);

    // 是否执行中
    $running = null;

    // 返回的内容都放在这个变量里
    $result = array();
    
    // 记录已完成数
    $done_num = 0;

    // 记录待处理数
    $list_num = count($listener_list);
    
    do
    {
        while ( ($execrun = curl_multi_exec($mh, $running)) == CURLM_CALL_MULTI_PERFORM );
        if ( $execrun!=CURLM_OK ) break;

        while ( true==($done = curl_multi_info_read($mh)) )
        {
            foreach ( $listener_list as $url=>$listener )
            {
                if ( $listener === $done['handle'] )
                {
                    // 获取内容
                    $result[$url] = curl_multi_getcontent($done['handle']);

                    // 此方法可获取返回编码
                    // $code = curl_getinfo($done['handle'], CURLINFO_HTTP_CODE);
                    
                    // 关闭当前CURL
                    curl_close($done['handle']);

                    // 获取到数据后移除列队
                    curl_multi_remove_handle($mh, $done['handle']);
                    
                    break;
                }
            }
        }
        
        // 如果完成数达到待处理数则退出do循环
        if ($done_num>=$list_num) break;

        // 如果没有执行了，就退出
        if (!$running) break;

    } while (true);


    // 关闭列队
    curl_multi_close($mh);  

    return $result;
}

/**
 * 创建一个CURL对象
 *
 * 这个方法只是一个简单的例子，实际中可以加入很多不同的参数，可参照 curl_setopt 方法
 *
 * @param string $url URL地址
 * @return curl_init()
 */
function create_curl($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);        // 请求的URL
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);              // 抓取超时时间
    // curl_setopt($ch, CURLOPT_POST, true );           // 如果POST则加上
    // curl_setopt($ch, CURLOPT_POSTFIELDS, $vars );     // 如果POST则加上
    curl_setopt($ch, CURLOPT_DNS_CACHE_TIMEOUT, 86400 ); // DNS缓存超时时间
    curl_setopt($ch, CURLOPT_USERAGENT, 'test');         // 客户端信息

    return $ch;
}

 /* curl多线程打开类
  * curl_multi 2012年3月15日 21:39:32做了一小修改..在非200 301 302的情况下返回空!
  * by wc1217
  */
 
 class curl_multi{
 
    //Curl句柄
 //private $curl_handle = null;
 //网址
     private $url_list = array();
     //参数
     private $curl_setopt = array(
         'CURLOPT_RETURNTRANSFER' => 1, //结果返回给变量
         'CURLOPT_HEADER' => 0, //要HTTP头不?
         'CURLOPT_NOBODY' => 0, //不要内容?
         'CURLOPT_FOLLOWLOCATION' => 0, //不自动跟踪
         'CURLOPT_TIMEOUT' => 15//超时(s)
     );
 
     function __construct($seconds = 30){
         set_time_limit($seconds);
     }
 
     /*
      * 设置网址
      * @list 数组
 */
 
     public function setUrlList($list = array()){
         $this->url_list = $list;
     }
 
     /*
      * 设置参数
      * @cutPot array
 */
 
     public function setOpt($cutPot){
         $this->curl_setopt = $cutPot + $this->curl_setopt;
     }
 
     /*
      * 执行
      * @return array
 */
 
     public function exec(){
         try{
             $mh = curl_multi_init();
             $conn = array();
             foreach($this->url_list as $i => $url){
                 $conn[$i] = curl_init($url);
                 if(strtolower(substr($url, 0, 5)) == 'https'){
                     curl_setopt($conn[$i], CURLOPT_SSL_VERIFYPEER, false);
                     curl_setopt($conn[$i], CURLOPT_SSL_VERIFYHOST, false);
                 }
                 foreach($this->curl_setopt as $key => $val){
                     curl_setopt($conn[$i], preg_replace('/(CURLOPT_\w{1,})/ie', '$0', $key), $val);
                 }
                 curl_multi_add_handle($mh, $conn[$i]);
             }
 
             /* if($i == 0 && isset($conn[$i]))
               return array(curl_exec($conn[$i])); //一个网址的时候直接执行返回
 */
             $active = false;
 
             do{
                 $mrc = curl_multi_exec($mh, $active);
             }while($mrc == CURLM_CALL_MULTI_PERFORM);
 
             //执行状态
 //$http_code = array();
             $res = array();
 
             while($active and $mrc == CURLM_OK){
                 if(curl_multi_select($mh) != -1){
                     do{
                         $mrc = curl_multi_exec($mh, $active);
                     }while($mrc == CURLM_CALL_MULTI_PERFORM);
                     //得到线程信息
                     /* $mhinfo = curl_multi_info_read($mh);
                       if(false !== $mhinfo){
                       $chinfo = curl_getinfo($mhinfo['handle']);
                       //$http_code[] = $chinfo['url'] . ' : ' . $chinfo['http_code']; // == 0 || $chinfo['http_code'] == 404;
                       //得到httpCode为200的内容 如果CURLOPT_FOLLOWLOCATION且有Location头标记的话$chinfo['url']会是最后一个URL
                       $res[array_search($chinfo['url'], $this->url_list)] = ($chinfo['http_code'] == 200 ? curl_multi_getcontent($mhinfo['handle']) : 'null');
                       curl_multi_remove_handle($mh, $mhinfo['handle']);   //用完马上释放资源
                       curl_close($mhinfo['handle']);
                       } */
                 }
             }
             //print_r($http_code);
             foreach($this->url_list as $i => $url){
                 $status = curl_getinfo($conn[$i], CURLINFO_HTTP_CODE);
                 $res[$i] = (($status == 200 || $status == 302 || $status == 301) ? curl_multi_getcontent($conn[$i]) : null);
                 curl_close($conn[$i]);
                 curl_multi_remove_handle($mh, $conn[$i]);   //用完马上释放资源  
             }
             curl_multi_close($mh);
         }catch(Exception $e){
             echo '错误: ' . $e->getMessage();
         }
         return $res;
     }
 
 }
 
$urls = array(
    'http://item.taobao.com/item.htm?id=14392877692',
    'http://item.taobao.com/item.htm?id=16231676302',
    'http://item.taobao.com/item.htm?id=17037160462',
    'http://item.taobao.com/item.htm?id=5522416710',
    'http://item.taobao.com/item.htm?id=16551116403',
    'http://item.taobao.com/item.htm?id=14088310973',
    'http://www.google.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://www.baidu.com',
    'http://sina.com',
    'http://163.com',
    'http://msdn.com',
    "http://www.cnn.com/",
    "http://www.canada.com/",
    "http://www.yahoo.com/",
);
$curl = new curl_multi();
$curl->setUrlList($urls);


$aa = time();
$res = get_by_curl($urls);
//$r = $curl->exec();
$bb = time();
var_dump(array_keys($res));
//var_dump(array_keys($r));
echo ($bb - $aa);
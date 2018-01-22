<?php
$ac = file_get_contents('https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wxbeda5ab3d65c0ab1&secret=3cf9f320b7e34d082928219a7d521034');
$wxt = json_decode($ac,true);
$arrwx_data = array(
  'open_id' => 'oC8-sjl_agIH6gB9WvpOdf_jiDow',
  'token' => $wxt['access_token'],
  'template_id' => '1f16GSiGfrWkToxv5lxKBWtJo8_k7cKBTBSUt1Ldl_E',
  );
$arrtpl_data = array(
    'first' => array(
        'value' => '尊敬的张小宇，您已消费成功。',
        // 'color' => '#FF0000'
    ),
    'keyword1' => array(
        'value' => '奕芝堂—东风路分店',
    ),
    'keyword2' => array(
        'value' => '2017-10-18 16:20',
    ),
    'keyword3' => array(
        'value' => '13.50元',
    ),
    'keyword4' => array(
        'value' => '182.23元',
    ),
    'keyword5' => array(
        'value' => '2025积分',
    ),
    'remark' => array(
        'value' => '其它卡余：高温瑜伽1次，洗车10次；高温瑜伽1次，洗车10次；高温瑜伽1次，洗车10次；儿童乐园（2018-10-30）  ~欢迎下次光临~',
    )
);
laimi_wx_template_msg($arrwx_data, $arrtpl_data);
function laimi_wx_template_msg($arrwx_data, $arrtpl_data){
  $stropen_id = $arrwx_data['open_id'];
  $strtoken = $arrwx_data['token'];
  $strtemplate_id = $arrwx_data['template_id'];

  $template_msg=array(
    'touser'=>$stropen_id,
    'template_id'=>$strtemplate_id,
    'topcolor'=>'#FF0000',
    'data'=>$arrtpl_data
  );
   
  $curl = curl_init('https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=' . $strtoken);
  $header = array();
  $header[] = 'Content-Type: application/x-www-form-urlencoded';
  curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
  // 不输出header头信息
  curl_setopt($curl, CURLOPT_HEADER, 0);
  // 信任任何证书，使用http
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
  // 伪装浏览器
  curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.118 Safari/537.36');
  // 保存到字符串而不是输出
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  // post数据
  curl_setopt($curl, CURLOPT_POST, 1);
  // 请求数据
  curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($template_msg));
  $response = curl_exec($curl);
  curl_close($curl);
  return $response;
}
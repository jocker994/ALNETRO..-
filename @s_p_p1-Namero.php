<?php
ob_start();
$token = "7274988584:AAEPKutizNwmDkdcYkinMbMPd93Ib__86-A";
define('API_KEY',$token);//add_token
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$id = $message->from->id;
$chat_id = $message->chat->id;
$text = $message->text;
$user = $message->from->username;
if(isset($update->callback_query)){
  $chat_id = $update->callback_query->message->chat->id;
  $message_id = $update->callback_query->message->message_id;
  $data     = $update->callback_query->data;
 $user = $update->callback_query->from->username;
$sales = json_decode(file_get_contents('sales.json'),true);
$buttons = json_decode(file_get_contents('button.json'),true);
}
function save($array){
    file_put_contents('sales.json', json_encode($array));
}
$city=array("afghanistan","albania","algeria","angola","antiguaandbarbuda","argentina","armenia","australia","austria","azerbaijan","bahrain","bangladesh","barbados","belarus","belgium","benin","bhutane","bih","bolivia","botswana","brazil","bulgaria","burkinafaso","burundi","cambodia","cameroon","canada","caymanislands","chad","china","colombia","congo","costarica","croatia","cyprus","czech","djibouti","dominicana","easttimor","ecuador","egypt","england","equatorialguinea","estonia","ethiopia","finland","france","frenchguiana","gabon","gambia","georgia","germany","ghana","guadeloupe","guatemala","guinea","guineabissau","guyana","haiti","honduras","hungary","india","indonesia","iran","iraq","ireland","israel","italy","ivorycoast","jamaica","jordan","kazakhstan","kenya","kuwait","laos","latvia","lesotho","liberia","libya","lithuania","luxembourg","macau","madagascar","malawi","malaysia","maldives","mali","mauritania","mauritius","mexico","moldova","mongolia","montenegro","morocco","mozambique","myanmar","namibia","nepal","netherlands","newzealand","nicaragua","nigeria","norway","oman","pakistan","panama","papuanewguinea","paraguay","peru","philippines","poland","portugal","puertorico","qatar","reunion","romania","russia","rwanda","saintkittsandnevis","saintlucia","saintvincentandgrenadines","salvador","saudiarabia","senegal","serbia","sierraleone","slovakia","slovenia","somalia","southafrica","spain","srilanka","sudan","suriname","swaziland","sweden","switzerland","syria","taiwan","tajikistan","tanzania","thailand","tit","togo","tunisia","turkey","turkmenistan","uae","uganda","ukraine","uruguay","usa","uzbekistan","venezuela","vietnam","yemen","zambia","zimbabwe");
$cities="
{ `yemen`}  =  🇾🇪 اليمن السعيد 🇾🇪  
  { `afghanistan `}  =  🇦🇫| أفغانستان 
  { `albania `}  =  🇦🇱| ألبانيا 
  { `algeria `}  =  🇩🇿| الجزائر   
  { `angola `}  =  🇦🇴| أنغولا   
  { `antiguaandbarbuda `}  =  🇦🇬| انتيغوا وباربودا   
  { `argentina `}  =  🇦🇷| الأرجنتين   
  { `armenia `}  =  🇦🇲| أرمينيا   
  { `australia `}  =  🇦🇺| أستراليا  
  { `austria `}  =  🇦🇹| النمسا 
  { `azerbaijan `}  =  🇦🇿| أذربيجان
  { `bahrain `}  =  🇧🇭| البحرين 
  { `bangladesh `}  =  🇧🇩| بنغلادش 
  { `barbados `}  =  🇧🇧| باربادوس   
  { `belarus `}  =  🇧🇾| بيلاروسيا 
  { `belgium `}  =  🇧🇪| بلجيكا 
  { `benin `}  =  🇧🇯| بنين 
  { `bhutane `}  =  🇧🇹| بوتان 
  { `bih `}  =  🇧🇦| البوسنة والهرسك 
  { `bolivia `}  =  🇧🇴| بوليفيا   
  { `botswana `}  =  🇧🇼| بوتسوانا  
  { `brazil `}  =  🇧🇷| البرازيل   
  { `bulgaria `}  =  🇧🇬| بلغاريا  
  { `burkinafaso `}  =  🇧🇫| بوركينا فاسو   
  { `burundi `}  =  🇧🇮| بوروندي 
  { `cambodia `}  =  🇰🇭| كمبوديا   
  { `cameroon `}  =  🇨🇲| الكاميرون  
  { `canada `}  =  🇨🇦| كندا   
  { `chad `}  =  🇹🇩| تشاد  
  { `china `}  =  🇨🇳| الصين   
  { `colombia `}  =  🇨🇴| كولومبيا  
  { `congo `}  =  🇨🇩| الكونغو  
  { `costarica `}  =  🇨🇷| كوستا ريكا   
  { `croatia `}  =  🇭🇷| كرواتيا 
  { `cyprus `}  =  🇨🇾| قبرص   
  { `czech `}  =  🇨🇿| التشيك   
  { `djibouti `}  =  🇩🇯| جيبوتي   
  { `dominicana `}  =  🇩🇲| دومينيكا  
  { `easttimor `}  =  🇹🇱| تيمور 
  { `ecuador `}  =  🇪🇨| الإكوادور 
  { `egypt `}  =  🇪🇬| مصر 
  { `england `}  =  🇬🇧| انجلترا  
  { `equatorialguinea `}  =  🇬🇶| غينيا الاستوائية  
  { `estonia `}  =  🇪🇪| إستونيا   
  { `ethiopia `}  =  🇪🇹| إثيوبيا  
  { `finland `}  =  🇫🇮| فنلندا  
  { `frenchguiana `}  =  🇬🇫| غويانا الفرنسية   
  { `gabon `}  =  🇬🇦| الغابون 
  { `gambia `}  =  🇬🇲| غامبيا   
  { `georgia `}  =  🇬🇪| جورجيا   
  { `germany `}  =  🇩🇪| ألمانيا  
  { `ghana `}  =  🇬🇭| غانا   
  { `guadeloupe `}  =  🇬🇵| غوادلوب 
  { `guatemala `}  =  🇬🇹| غواتيمالا   
  { `guinea `}  =  🇬🇳| غينيا  
  { `guineabissau `}  =  🇬🇼| غينيا بيساو  
  { `guyana `}  =  🇬🇫| غويانا  
  { `haiti `}  =  🇭🇹| هايتي  
  { `honduras `}  =  🇭🇳| هندوراس 🇭🇳
  { `hungary `}  =  🇭🇺| هنغاريا   
  { `india `}  =  🇮🇳| الهند   
  { `indonesia `}  =  🇮🇩| إندونيسيا   
  { `iraq `}  =  🇮🇶| العراق  
  { `ireland `}  =  🇮🇪| ايرلندا   
  { `italy `}  =  🇮🇹| ايطاليا   
  { `mongolia `}  =  🇲🇳| منغوليا   
  { `montenegro `}  =  🇲🇪| الجبل الأسود   
  { `jordan `}  =  🇯🇴| الأردن   
  { `kazakhstan `}  =  🇰🇿| كازاخستان  
  { `kenya `}  =  🇰🇪| كينيا  
  { `kuwait `}  =  🇰🇼| الكويت 
  { `latvia `}  =  🇱🇻| لاتفيا   
  { `liberia `}  =  🇱🇷| ليبيريا  
  { `libya `}  =  🇱🇾| ليبيا  
  { `luxembourg `}  =  🇱🇺| لوكسمبورغ   
  { `macau `}  =  🇲🇴| ماكاو  
  { `madagascar `}  =  🇲🇬| مدغشقر  
  { `malaysia `}  =  🇲🇾| ماليزيا  
  { `maldives `}  =  🇲🇻| جزر المالديف 
  { `mauritania `}  =  🇲🇷| موريتانيا  
  { `mexico `}  =  🇲🇽| المكسيك 
  { `morocco `}  =  🇲🇦| المغرب   
  { `nepal `}  =  🇳🇵| نيبال   
  { `newzealand `}  =  🇳🇿| نيوزيلاندا   
  { `nigeria `}  =  🇳🇬| نيجيريا   
  { `oman `}  =  🇴🇲| عمان   
  { `pakistan `}  =  🇵🇰| باكستان   
  { `paraguay `}  =  🇵🇾| باراغواي   
  { `poland `}  =  🇵🇱| بولندا  
  { `portugal `}  =  🇵🇹| البرتغال   
  { `qatar `}  =  🇶🇦| قطر  
  { `russia `}  =  🇷🇺| روسيا  
  { `saudiarabia `}  =  🇸🇦| السعودية  
  { `serbia `}  =  🇷🇸| صربيا   
  { `somalia `}  =  🇸🇴|الصومال   
  { `spain `}  =  🇪🇸| اسبانيا   
  { `sudan `}  =  🇸🇩| السودان   
  { `syria `}  =  🇸🇾| سوريا   
  { `tunisia `}  =  |🇹🇳 تونس   
  { `turkey `}  =  |🇹🇷 تركيا  
  { `uae `}  =  🇦🇪| الامارات   
  { `usa `}  =  🇺🇸| الولايات المتحدة 
";
$admin = 6689277386;
$admin = 7421211169;
$admin = 6505492519;
$admin = 6002028423;
$admin = 7330588262;
$tokensim="d5de2030c38d49d5aed2066113553157";//توكن الموقع
$ch="AX_GB";//معرف قناتك بدون @
$rssed = filter_var(file_get_contents("http://api1.5sim.net/stubs/handler_api.php?api_key=$tokensim&action=getBalance"), FILTER_SANITIZE_NUMBER_INT);
$me = bot('getme',['bot'])->result->username;
$sales = json_decode(file_get_contents('sales.json'),1);
if($data == "pointsfile"){
$user = (file_get_contents("sales.json"));
file_put_contents("backup.json",$user);
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
▪ تم عمل نسخة احتياطية بنجاح",
]);
bot("sendDocument",[
"chat_id"=>$admin,
"document"=>new CURLFILE("backup.json")
]);
}
#@S8HIBOT1#
if (!isset($update)) {
  $user = (file_get_contents("sales.json"));
  file_put_contents("backup.json", $user);
  bot("sendDocument", [
    "chat_id" => $admin,
    "document" => new CURLFILE("backup.json"),
    "caption" => $time
  ]);
}
if ($data) {
  $status = bot('getChatMember', ['chat_id' =>"@".$ch, 'user_id' => $chat_id])->result->status;
  if ($status == "left") {
    bot("EditMessageText", [
      "chat_id" => $chat_id,
      "text" => "عليك الاشتراك في قناة البوت
      @$ch
      ",
      "message_id" => $message_id
    ]);
    exit;
  }
}
if($id!=$admin){
  if ($message->chat->type != "private" and $text) {
    bot("sendmessage", [
      "chat_id" => $admin,
      "text" => "قام هذا الشخص بالدخول عن طريق قروب
		$id
		@$user"
    ]);
    bot("leavechat", [
      "chat_id" => $chat_id,
    ]);
    return false;
  } }
  if (preg_match("/(start-100)/", $text) or preg_match("/(start -100)/", $text) or preg_match("/(start@)/", $text) or preg_match("/(start @)/", $text)) {
  bot("sendmessage", [
    "chat_id" => $admin,
    "text" => "قام هذا الشخص بالدخول على رابط بطريقة خاطئة
		$id
		@$user"
  ]);
  return false;
}
if($data == 'c'){
  bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"- - - - - - - - - - - - - - - - - - - - - - - - -
🍿- مرحباً مطوري @$user 🤶🏻
يمكنك الان التحكم في بوت الارقام من الاسفل! 
- - - - - - - - - - - - - - - - - - - - - - - - -
👩🏻‍🌾]- المطور != @hassan_0916103363
- - - - - - - - - - - - - - - - - - - - - - - - -
",
   'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text' =>'• اخر تحديثات البوت 📂 •','url'=>'https://t.me/S8HIBOT1']],
        [['text' => '• إضافة رقم 👒 •', 'callback_data' => 'add'], ['text' => '• حذف رقم 👩🏻‍🌾 •', 'callback_data' => 'del']],
        [['text' => '• اضافه نقاط 💰 • ', 'callback_data' => 'send'], ['text' => '• خصم نقاط 💰 •', 'callback_data' => 'delete']],
        [['text'=>'• عدد الاعضاء 🤶🏻 •', 'callback_data'=>'users']],
        [['text' => '• اذاعه لعضو 🗞 •', 'callback_data' => 'message'], ['text' => ' • إرسال تحذير 🌴 •', 'callback_data' => 'tahdeer']],
        [['text' => 'اوامر الادمن👨‍✈️', 'callback_data' => 'admin'],['text' => '• نسخة إحتياطية 📝 •', 'callback_data' => 'pointsfile']],
        [['text'=>'• قائمة الدول 🗒 •','callback_data'=>'city']],
      ]
    ])
  ]);
$sales['mode'] = null;
  save($sales);
 }
#@S8HIBOT1#
if($chat_id == $admin){
 if($text == '/start'){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>"🍿- مرحباً مطوري @$user 🤶🏻
يمكنك الان التحكم في بوت الارقام من الاسفل! 
- - - - - - - - - - - - - - - - - - - - - - - - -
👩🏻‍🌾]- المطور != @hassan_0916103363
- - - - - - - - - - - - - - - - - - - - - - - - -
",
   'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text' =>'• اخر تحديثات البوت 📂 •','url'=>'https://t.me/S8HIBOT1']],
        [['text' => '• إضافة رقم 👒 •', 'callback_data' => 'add'], ['text' => '• حذف رقم 👩🏻‍🌾 •', 'callback_data' => 'del']],
        [['text' => '• اضافه نقاط 💰 • ', 'callback_data' => 'send'], ['text' => '• خصم نقاط 💰 •', 'callback_data' => 'delete']],
        [['text'=>'• عدد الاعضاء 🤶🏻 •', 'callback_data'=>'users']],
        [['text' => '• اذاعه لعضو 🗞 •', 'callback_data' => 'message'], ['text' => ' • إرسال تحذير 🌴 •', 'callback_data' => 'tahdeer']],
        [['text' => 'اوامر الادمن👨‍✈️', 'callback_data' => 'admin'],['text' => '• نسخة إحتياطية 📝 •', 'callback_data' => 'pointsfile']],
        [['text'=>'• قائمة الدول 🗒 •','callback_data'=>'city']],
      ]
    ])
  ]);
$sales['mode'] = null;
  $sales["baageel"]=null;
  save($sales);
 }
  if ($data == 'send') {
    bot('EditMessageText', [
      'chat_id' => $chat_id,
      'message_id' => $message_id,
      'text' => "
أرسل أيدي الشخص الذي تريد إرسال النقاط له
",
]);
  $sales['mode'] = 'chat';
  save($sales);
  exit;
  }
   if($text != '/start' and $text != null and $sales['mode'] == 'chat'){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
 'text'=> "أرسل الكمية التي تريد إرسالها",
 ]);
   $sales['mode'] = 'poi';
   $sales['idd'] = $text;
  save($sales);
  exit;
}
 if($text != '/start' and $text != null and $sales['mode'] == 'poi'){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
 'text'=>"تم إضافة $text نقطة إلى حساب ".$sales['idd']." بنجاح ",
]);
  bot('sendmessage',[
   'chat_id'=>$sales['idd'],
  'text'=>"تمت إضافة $text نقطة إلى حسابك في البوت من قبل المطور ",
  ]);
  $sales['mode'] = null;
  $sales[$sales['idd']]['collect'] += $text;
  $sales['idd'] = null;
  save($sales);
  exit;
}
  if ($data == 'delete') {
    bot('EditMessageText', [
      'chat_id' => $chat_id,
      'message_id' => $message_id,
      'text' => "
أرسل أيدي الشخص الذي تريد خصم النقاط منه
",
]);
  $sales['mode'] = 'chat1';
  save($sales);
  exit;
  }
  #@S8HIBOT1#
   if($text != '/start' and $text != null and $sales['mode'] == 'chat1'){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
 'text'=> "أرسل الكمية التي تريد خصمها",
 ]);
   $sales['mode'] = 'poi1';
   $sales['idd'] = $text;
  save($sales);
  exit;
}
 if($text != '/start' and $text != null and $sales['mode'] == 'poi1'){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
 'text'=>"تم خصم $text نقطة من حساب ".$sales['idd']." بنجاح ",
]);
  bot('sendmessage',[
   'chat_id'=>$sales['idd'],
  'text'=>"تمت خصم $text نقطة من حسابك في البوت من قبل المطور ",
  ]);
  $sales['mode'] = null;
  $sales[$sales['idd']]['collect'] -= $text;
  $sales['idd'] = null;
  save($sales);
  exit;
}

  if ($data == 'message') {
    bot('EditMessageText', [
      'chat_id' => $chat_id,
      'message_id' => $message_id,
      'text' => "
أرسل أيدي الشخص الذي تريد إرسال الرسالة له
",
]);
  $sales['mode'] = 'chat3';
  save($sales);
  exit;
  }
   if($text != '/start' and $text != null and $sales['mode'] == 'chat3'){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
 'text'=> "
أرسل رسالتك",
 ]);
   $sales['mode'] = 'poi3';
   $sales['idd'] = $text;
  save($sales);
  exit;
}
 if($text != '/start' and $text != null and $sales['mode'] == 'poi3'){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
 'text'=>"تم إرسال الرسالة إلى ".$sales['idd']." بنجاح ",
]);
  bot('sendmessage',[
   'chat_id'=>$sales['idd'],
  'text'=>"رسالة من الإدارة:

$text",
  ]);
  $sales['mode'] = null;
  $sales['idd'] = null;
  save($sales);
  exit;
}
  if ($data == 'tahdeer') {
    bot('EditMessageText', [
      'chat_id' => $chat_id,
      'message_id' => $message_id,
      'text' => "
أرسل أيدي الشخص الذي تريد إرسال التحذير له
",
]);
  $sales['mode'] = 'chat4';
  save($sales);
  exit;
  }
  #@S8HIBOT1#
   if($text != '/start' and $text != null and $sales['mode'] == 'chat4'){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
 'text'=> "
إضغط /Confirm لتأكيد إرسال التحذير",
 ]);
   $sales['mode'] = 'poi4';
   $sales['idd'] = $text;
  save($sales);
  exit;
}
 if($text != '/start' and $text != null and $sales['mode'] == 'poi4'){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
 'text'=>"تم إرسال التحذير إلى ".$sales['idd']." بنجاح ",
]);
  bot('sendmessage',[
   'chat_id'=>$sales['idd'],
  'text'=>"تحذير من الإدارة!
إستعمال حسابات وهمية الدخول لرابطك بها يؤدي إلى حظر حسابك 👉
في حال إستعمال الوهمي سينحظر حسابك... إنتبه... شكرا على تفهمك للموضوع",
  ]);
  $sales['mode'] = null;
  $sales['idd'] = null;
  save($sales);
  exit;
}

 if($data == 'add'){
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'أرسل إسم السلعة؟!
مثال:
رقم يمني 🇧🇪',
    'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>'- إلغاء الأمر 🚫','callback_data'=>'c']]
      ]
    ])
  ]);
  $sales['mode'] = 'add';
  save($sales);
  exit;
 }
 if($text != '/start' and $text != null and $sales['mode'] == 'add'){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>'- تم حفظ إسم السلعة (الرقم)
أرسل الآن سعرها ( كم نقطة؟ )
مثال:
25'
  ]);
  $sales['n'] = $text;
  $sales['mode'] = 'addm';
  save($sales);
  exit;
 }
 if($text != '/start' and $text != null and $sales['mode'] == 'addm'){
  $code = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz12345689807'),1,7);
  bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>'تم حفظ الإسم والسعر...✅
   إسم السلعة: '.$sales['n'].'
السعر: '.$text.'
الكود: '.
"\n`$code`\n"
."ارسل اسم الدولة حسب موقع قائمة الارقام ",
    'parse_mode'=>"MarkDown",
  ]);
  
  $sales['sales'][$code]['name'] = $sales['n'];
  $sales['sales'][$code]['price'] = $text;
  $sales['n'] = null;
  $sales['mode'] = "file";
  $sales["baageel"]=$code;
  save($sales);
  exit;
 }
 if($text != '/start' and $text != null and $sales['mode'] == 'file'){
 	if(in_array($text,$city)){
 $sales["sales"][$sales["baageel"]]["country"]=$text;
  bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>'- تم حفظ الدولة
الان قم بارسال اسم التطبيق
واتس
فيس
تلي
جوجل
انستا
'
  ]);
  $sales['mode'] = "apps";
  save($sales);
  exit;
  }else{
  bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>"
   لم يتم حفظ الدولة 
   لانها ليست في قائمة الدولة 
   الرجاء ارسال كوت الدولة مكون من حولي 5 احرفمن قائمة الدول ‼️
   ",
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
[['text'=>'- إلقائمة الرئيسية🔙','callback_data'=>'c']]
      ]
    ])
  ]);
exit;	
  }
 }
 #@S8HIBOT1#
 if($text != '/start' and $text != null and $sales['mode'] == 'apps'){
 	$yy=array("واتس","تلي","جوجل","فيس","انستا");
 	if(in_array($text,$yy)){
 	$text=str_replace(["واتس","تلي","جوكل","انستا","فيس"],["whatsapp","tg","Google","ig","facebook"],$text);
 $sales["sales"][$sales["baageel"]]["apps"]=strtolower($text);
  bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>'- تم حفظ بنحاح
',
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
[['text'=>'- إلقائمة الرئيسية🔙','callback_data'=>'c']]
      ]
    ])
  ]);
    $sales["baageel"]=null;
  $sales['mode'] = null;
  save($sales);
  exit;}
  else{
  	bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>'- قم بارسال اسم التطبيق
واتس
فيس
تلي
جوجل
انستا
'
  ]);
  }
 }
 if($data == 'del'){
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'أرسل كود السلعة للتأكيد',
    'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>'- إلغاء الأمر 🚫','callback_data'=>'c']]
      ]
    ])
  ]);
  $sales['mode'] = 'del';
  save($sales);
  exit;
 }
  if($data == 'city'){
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"قائمة الدول 
اضغط على اسم الدولة وسيتم النسخ

$cities
",
        'parse_mode'=>"MarkDown",
    'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>'- إلغاء الأمر 🚫','callback_data'=>'c']]
      ]
    ])
  ]);}
 if($text != '/start' and $text != null and $sales['mode'] == 'del'){
  if($sales['sales'][$text] != null){
   bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>'تم الحذف بنجاح...✅
   إسم السلعة: '.$sales['sales'][$text]['name'].'
السعر: '.$sales['sales'][$text]['price'].'
الكود: '.$text
  ]);
  unset($sales['sales'][$text]);
  $sales['mode'] = null;
  save($sales);
  exit;
  } else {
   bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>'خطأ - الكود غير صحيح'
   ]);
  }
 }
} else {
 if(preg_match('/\/(start)(.*)/', $text)){
  $ex = explode(' ', $text);
  if(isset($ex[1])){
   if(!in_array($chat_id, $sales[$chat_id]['id'])){
    $sales[$chat_id]['baageel']=$ex[1];
    $sales[$chat_id]['id'][] = $chat_id;
    save($sales);
   }
  }
  #@S8HIBOT1#
  $status = bot('getChatMember',['chat_id'=>'@'.$ch,'user_id'=>$chat_id])->result->status;
  if($status == 'left'){
   bot('sendMessage',[
       'chat_id'=>$chat_id,
       'text'=>"عذرا عزيزي... يجب الإشتراك في القناة حتى تتمكن من إستخدام البوت...🙋‍♂
إشترك هنا @$ch
ثم إضغط /start 👉",
       'reply_to_message_id'=>$message->message_id,
   ]);
   exit();
  }
  if($sales[$chat_id]['collect'] == null){
   $sales[$chat_id]['collect'] = 0;
   save($sales);
  }
  if(preg_match("/\/(start)/",$text)){
    $sales[$sales[$chat_id]['baageel']]['collect'] += 1;
    save($sales);
    bot('sendmessage',[
    'chat_id'=>$sales[$chat_id]['baageel'],
    "text"=>"- قام : @$user بالدخول الى الرابط الخاص وحصلت على نقطة واحده ، ✨\n~ عدد نقاطك : ".$sales[$sales[$chat_id]['baageel']]['collect'], 
    ]);
    $sales[$chat_id]['baageel']=0;
    save($sales);
  bot('sendmessage',[
   'chat_id'=>$chat_id,
   'text'=>'
🎭 أهلا وسهلا بك في بوت الأرقام 《 تسليم تلقائي 》
	🌹 يتوفر لدينا أرقام لمختلف الدول العربية  🇾🇪🇾🇪 والأجنبية🚩
	♾ لتفعيل 5 من أشهر برامج التواصل الإجتماعي
	🔙 واتس اب ، فيس بوك ، تيليجرام ، تويتر ، انستاجرام 🔜
	💰 مجانا وبدون دفع مال 🤑
	🤘 فقط كل ما عليك هو دعوة اصدقائك الى البوت عبر الرابط الخاص بك
	💡 وستحصل على نقطة واحدة مقابل كل دخول عضو جديد الى البوت من طرفك
~ عدد نقاطك الآن: '.$sales[$chat_id]['collect'],

   'reply_markup'=>json_encode([
    'inline_keyboard'=>[
     [['text'=>'• شراء رقم جديد 🗞 •','callback_data'=>'numbers']],
     [['text'=>'• تجمع النقاط 🌴 • ','callback_data'=>'col'],['text'=>'• شروط البوت 📜 •','callback_data'=>'about']],[['text'=>'• شراء نقاط 👜 •','callback_data'=>'buy'],['text'=>'• أرقام بدون نقاط 🍄•','callback_data'=>'numberfree']],[['text'=>'• مطور البوت 👩🏻‍🌾 •','callback_data'=>'bot']],
     [['text'=>'• الدعم الفني 👒 •','callback_data'=>'SALEH'],['text'=>'• خدمة الرشق 💌 •','callback_data'=>'bt']],
    ] 
   ])
  ]);
 }}
 #@S8HIBOT1#
if($data == 'back'){
if($sales[$chat_id]['collect'] == null){
   $sales[$chat_id]['collect'] = 1000;
   save($sales);
  }
  bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>'
🎭 أهلا وسهلا بك في بوت الأرقام 《 تسليم تلقائي 》
	🌹 يتوفر لدينا أرقام لمختلف الدول العربية  🇾🇪🇾🇪 والأجنبية🚩
	♾ لتفعيل 5 من أشهر برامج التواصل الإجتماعي
	🔙 واتس اب ، فيس بوك ، تيليجرام ، تويتر ، انستاجرام 🔜
	💰 مجانا وبدون دفع مال 🤑
	🤘 فقط كل ما عليك هو دعوة اصدقائك الى البوت عبر الرابط الخاص بك
	💡 وستحصل على نقطة واحدة مقابل كل دخول عضو جديد الى البوت من طرفك
~ عدد نقاطك الآن: '.$sales[$chat_id]['collect'],

   'reply_markup'=>json_encode([
    'inline_keyboard'=>[
     [['text'=>'• شراء رقم جديد 🗞 •','callback_data'=>'numbers']],
     [['text'=>'• تجمع النقاط 🌴 • ','callback_data'=>'col'],['text'=>'• شروط البوت 📜 •','callback_data'=>'about']],[['text'=>'• شراء نقاط 👜 •','callback_data'=>'buy'],['text'=>'• أرقام بدون نقاط 🍄•','callback_data'=>'numberfree']],[['text'=>'• مطور البوت 👩🏻‍🌾 •','callback_data'=>'SALEH']],
     [['text'=>'• الدعم الفني 👒 •','callback_data'=>'bot'],['text'=>'• خدمة الرشق 💌 •','callback_data'=>'bt']],
    ] 
   ])
  ]);
 }
  if($data == 'numbers'){
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'💯 الان قم باختيار التطبيق التي تريد تشغيل الرقم عليه
	👇 من الكيبورد أدناه',
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
     [['text'=>'واتساب☎️','callback_data'=>'sales#whatsapp']],
[['text'=>'جوجل📲','callback_data'=>'sales#imo'],['text'=>'فيسبوك📬','callback_data'=>'sales#facebook']],
[['text'=>'انستقرام🎬','callback_data'=>'sales#ig'],['text'=>'تيليجرام📮','callback_data'=>'sales#tg']],
[['text'=>'الرجوع الى القائمة الرئيسية🔙','callback_data'=>'back']],
 ] 
   ])
  ]);
 }
 
 if($data == 'buy'){
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'للشراء إضغط على زر شراء النقاط 💰
وسيحولك البوت إلى بوت التواصل مع المشرف قم بمراسلته للشراء فقط...💸',
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"شراء النقاط 💰",'url'=>"t.me/money_market2"]],
[['text'=>"القائمة الرئيسية 🔙",'callback_data'=>"back"]],
    ] 
   ])
  ]);
 }



if($data == "about"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
البوت بسيط ولا يحتاج لشرح أصلا...📚

ولكن على كل حال هذا شرح سريع
",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"الخطوة الأولى",'callback_data'=>"k1"]],
[['text'=>" القائمة الرئيسية 🔙",'callback_data'=>"back"]],
    ] 
   ])
  ]);
 }
 $ex = explode('#', $data);
  $code = explode(":", file_get_contents("http://api1.5sim.net/stubs/handler_api.php?api_key=$tokensim&action=getStatus&id={$ex[1]}"));
  if ($ex[0] == "innnnn") {
    bot('sendMessage', [
      'chat_id' => $chat_id,
      'text' => "كود الرقام هو 
`$code[1]`",
'parse_mode' => "MarkDown",
]);
  }
  if ($ex[0] == "band") {
    file_get_contents("http://api1.5sim.net/stubs/handler_api.php?api_key=$tokensim&action=setStatus&status=8&id={$ex[1]}");
    bot('editmessagetext', [
      'chat_id' => $chat_id,
      'text' => "
      تم ارسال طلبك الى الادارة 
      سيتم التحقق من هذا 
      اذا كان صحيح سيتم اعادة نقاطك
      ",
"message_id"=>$message_id]);
      bot('sendmessage', [
      'chat_id' => $admin,
      'text' => "
طلب اعادة النقاط لان الرقم محظور 
ايدي المرسل : $chat_id
معرف المرسل :@$user
رقمه
+$ex[2]
      "]);
  }
if($data == "k1"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
بعد الدخول للبوت إضغط على زر تجميع النقاط وبعدها سيرسل البوت لك رابط خاص بك فقط قم بنشره وأي شخص يدخل على الرابط تحصل على 1 نقطة
",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"الخطوة الثانية",'callback_data'=>"k2"]],
[['text'=>" القائمة الرئيسية 🔙",'callback_data'=>"back"]],
    ] 
   ])
  ]);
 }
 #@S8HIBOT1#
if($data == "k2"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
بعد جمع عدد جيد من النقاط إضغط على زر طلب رقم وبعدها اختر الدولة (يجب أن يتوافق سعر الرقم مع نقاطك) بعدها تأكد أن لديك إسم مستخدم في إعدادات تيليجرام بعدها إضغط نعم لدي معرف - تأكيد
",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"الخطوة الثالثة",'callback_data'=>"k3"]],
[['text'=>" القائمة الرئيسية 🔙",'callback_data'=>"back"]],
    ] 
   ])
  ]);
 }
if($data == "k3"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
ستستلم الرقم تلقائي عند الشراء 
بعدها ادخل البرنامج المحدد وسجل الرقم وسوي ارسال رساله
بعدها اضغط زر اجلب الكود في الرساله
",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"لا أستطيع جمع النقاط",'callback_data'=>"k4"]],
[['text'=>" القائمة الرئيسية 🔙",'callback_data'=>"back"]],
    ] 
   ])
  ]);
 }
if($data == "k4"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
إذا لا تستطيع جمع النقاط يمكنك شراؤها...??
",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"شراء نقاط 💸",'callback_data'=>"buy"]],
[['text'=>" القائمة الرئيسية 🔙",'callback_data'=>"back"]],
    ] 
   ])
  ]);
 }
if($data == "numberfree"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
أرقام بدون نقاط تعتمد على السرعة
حيث أننا نقوم بتوزيع أرقام في القناة وكل كود يعمل مع أول شخص فقط...🍃
لو نشرنا رقم مغربي 🇲🇦 مع الكود بالطبع سيعمل مع أول شخص يدخله ولن يعمل مع البقية - فالأرقام بدون نقاط تعتمد على السرعة
يمكنك الإشتراك بالقناة عن طريق الضغط على زر إشتراك 📢 في الأسفل…!
",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"إشتراك 📢",'url'=>"https://t.me/S8HIBOT1"]],
[['text'=>" القائمة الرئيسية 🔙",'callback_data'=>"back"]],
    ] 
   ])
  ]);
 }
if($data == "bot"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
تواصل مع المطور 
👇👇
",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"اضغط هنا",'url'=>"https://t.me/money_market2"],['text'=>" القائمة الرئيسية 🔙",'callback_data'=>"back"]],
    ] 
   ])
  ]);
 }
if($data == "done"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
شكرا لاستخدامك البوت
",
  ]);
 }
#@S8HIBOT1#
 if($data == 'col'){
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'- هذا هو الرابط الخاص بك

https://t.me/'.$me.'?start='.$chat_id.'
-قم بنشر هذا الرابط بين الأصدقاء- # وكل شخص يشترك في البوت من خلال هذا الرابط # [ سوف تحصل على 1 نقطة ]
',
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"العودة إلى القائمة الرئيسية 🔙",'callback_data'=>"back"]],
    ] 
   ])
  ]);
 }


 elseif(preg_match("/(sales)/",$data)){
 	$ex=explode("#",$data);
  $reply_markup = [];
  $reply_markup['inline_keyboard'][] = [['text'=>'⁉️الكمية','callback_data'=>'s'],['text'=>'💲السعر','callback_data'=>'s'],['text'=>'🚩دولة الرقم','callback_data'=>'s']];
  foreach($sales['sales'] as $code => $sale){
  	if($sales["sales"][$code]["apps"]==$ex[1]){
  	$co=$sales["sales"][$code]["country"];
  $ap=$sales["sales"][$code]["apps"];
  $count=json_decode(file_get_contents("http://api1.5sim.net/stubs/handler_api.php?api_key=$tokensim&action=getNumbersStatus&country=$co"),1); 
  $a=$count[$ap."_0"];
  if($a==0){
  $a="⛔";	
  }else{
  	$a="متوفر✅";	
  } 
   $reply_markup['inline_keyboard'][] = [['text'=>"$a",'callback_data'=>$code],['text'=>$sale['price'],'callback_data'=>$code],['text'=>$sale['name'],'callback_data'=>$code]];
  }}
if($sales[$chat_id]['collect'] == null){
   $sales[$chat_id]['collect'] = 0;
   save($sales);
  }
$reply_markup['inline_keyboard'][] = [['text'=>'العودة إلى قائمة الخدات🔙','callback_data'=>'numbers']];
  $reply_markup = json_encode($reply_markup);
  bot('editMessageText',[
   'chat_id'=>$chat_id,
   'message_id'=>$message_id,
   'text'=>'
🙋‍♂️ أهلآ عـزيـزي آلَمستخدم
	💯 إليك قائمة بالأرقام المتوفرةحاليا💯 قم بالضغط على احد الارقام لشرائه
~ عدد نقاطك الآن: '.$sales[$chat_id]['collect'],
   'reply_markup'=>($reply_markup)
  ]);
  $sales[$chat_id]['mode'] = null;
   save($sales);
   exit;
 } elseif($data == 'yes'){
  $price = $sales['sales'][$sales[$chat_id]['mode']]['price'];
$name = $sales['sales'][$sales[$chat_id]['mode']]['name'];
$country=$sales['sales'][$sales[$chat_id]['mode']]['country'];
$apps=$sales['sales'][$sales[$chat_id]['mode']]['apps'];
if($name==null){
	exit;
}else{
	$z=$rssed;
	$api = json_encode(file_get_contents("http://api1.5sim.net/stubs/handler_api.php?api_key=$tokensim&action=getNumber&service=$apps&forward=default&operator=$operator&country=$country"));
        if (preg_match("/(NO_NUMBERS)/", $api)) {
          bot("EditMessageText", [
            "chat_id" => $chat_id,
            "text" => "لم يتم تنفيذ طلبك
نظراً لعدم توفر الارقام حاليا في الموقع
            ",
            "message_id" => $message_id
          ]);
          exit;
        } elseif (preg_match("/(BAD_SERVICE)/", $api)) {
          bot("EditMessageText", [
            "chat_id" => $chat_id,
            "text" => "لم يتم تنفيذ طلبك
نظراً لعدم ادخل المعلومات الصحيحه من قبل الادمن
            ",
            "message_id" => $message_id
          ]);
          exit;
        } elseif (preg_match("/(NO_BALANCE)/", $api)) {
          bot("EditMessageText", [
            "chat_id" => $chat_id,
            "text" => "لم يتم تنفيذ طلبك
نظرا لعدم توفر الرصيد الكافي في البوت
الرجاء الانتظار والمحاولة لاحقا
            ",
            "message_id" => $message_id
          ]);
          exit;
        }
        $num = explode(":", $api);
$numb = str_replace('"', "", $num[2]);
if($numb==null){
bot("EditMessageText", [
            "chat_id" => $chat_id,
            "text" => "لم يتم تنفيذ طلبك
نظراً لمشكلة في الموقع
            ",
            "message_id" => $message_id
          ]);
          exit;
}
        bot("EditMessageText", [
          "chat_id" => $chat_id,
          "text" => "تم قبول طلبك للرقم",
          "message_id" => $message_id
        ]);
        
        bot('sendMessage', [
          'chat_id' => $chat_id,
          'text' => "رقمك هو
`+$numb`
اطلب الكود خلال 15 دقيقة او لن تستطيع الحصول على الكود
في حال واجهتك مشكلة تواصل بالمطور 

@money_market2 
",
'parse_mode' => "MarkDown",
 'reply_markup' => json_encode([
            'inline_keyboard' => [
              [['text' => 'اجلب الكود', 'callback_data' => "innnnn#$num[1]"]], [['text' => 'محظور', 'callback_data' => "band#$num[1]#$num[2]"]],[['text' => 'تم', 'callback_data' => "done"]],
            ]])
        ]);
                $rssed = filter_var(file_get_contents("http://api1.5sim.net/stubs/handler_api.php?api_key=$tokensim&action=getBalance"), FILTER_SANITIZE_NUMBER_INT);
  bot('sendmessage',[
   'chat_id'=>$admin,
   'text'=>"- - - - - - - - - - - - - - - - - - - - - - - - -
الأيدي: $chat_id
المعرف إن وجد: @$user
- - - - - - - - - - - - - - - - - - - - - - - - -
قم بشراء $name بسعر $price
- - - - - - - - - - - - - - - - - - - - - - - - -
رقمه هو 
`+$numb`
- - - - - - - - - - - - - - - - - - - - - - - - -
الرصيد السابق : $z
الرصيد الحالي : $rssed
- - - - - - - - - - - - - - - - - - - - - - - - -
"
  ]);
  $sales[$chat_id]['mode'] = null;
  $sales[$chat_id]['collect'] -= $price;
  save($sales);
  exit;
 } }else {
   if($data == 's') { exit; }
   $price = $sales['sales'][$data]['price'];
   $name = $sales['sales'][$data]['name'];
   if($price != null){
    if($price <= $sales[$chat_id]['collect']){
     bot('editMessageText',[
      'chat_id'=>$chat_id,
      'message_id'=>$message_id,
      'text'=>"
هل أنت متأكد وتريد إتمام الطلب...؟

طلبك هو:
رقم لدولة $name بسعر $price 👉",
      'reply_markup'=>json_encode([
       'inline_keyboard'=>[
        [['text'=>'نعم - أنا متأكد','callback_data'=>'yes'],['text'=>'لا - إلغاء الشراء','callback_data'=>'back']] 
       ] 
      ])
     ]);
     $sales[$chat_id]['mode'] = $data;
     save($sales);
     exit;
    } else {
     bot('answercallbackquery',[
      'callback_query_id' => $update->callback_query->id,
      'text'=>'نقاطك غير كافية لشراء هذا الرقم',
      'show_alert'=>true
     ]);
    }
   }
 }
}
#@S8HIBOT1#
$ary = array($admin);
$id = $message->chat->id;
$admins = in_array($id,$ary);
$data = $update->callback_query->data;
$from_id = $message->from->id;
$chat_id = $message->chat->id;
$chat_id2 = $update->callback_query->message->chat->id;
$cut = explode("\n",file_get_contents("stats/users.txt"));
$users = count($cut)-1;
$mode = file_get_contents("stats/bc.txt");
#Start code 

if ($update && !in_array($id, $cut)) {
    mkdir('stats');
    file_put_contents("stats/users.txt", $id."\n",FILE_APPEND);
  }
#@S8HIBOT1#
    if(preg_match("/(admin)/",$text) && $admins) {
        bot('sendMessage',[
            'chat_id'=>$chat_id,
          'text'=>"
أهلا مطوري...
شبيك لبيك البوت بين يديك
إضغط على طلبك في القائمة وستتم تلبية الطلب تلقائيا...🌚 
-",
    'reply_to_message_id'=>$message->message_id,
    'parse_mode'=>"MarkDown",
    'disable_web_page_preview'=>true,
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
    [['text'=>'عدد المشتركين 🌴 ','callback_data'=>'users'],['text'=>'رسالة للكل ♻️ ','callback_data'=>'set']],
    [['text'=>'حالة البوت 📝 ','callback_data'=>'stats']],
                ]
                ])
            ]);
    }
    if($data == 'admin'){
    bot('editMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>"
أهلا مطوري...
شبيك لبيك البوت بين يديك
إضغط على طلبك في القائمة وستتم تلبية الطلب تلقائيا...🌚 
-",
    'reply_to_message_id'=>$message->message_id,
    'parse_mode'=>"MarkDown",
    'disable_web_page_preview'=>true,
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
    [['text'=>'عدد المشتركين 🌴 ','callback_data'=>'users'],['text'=>'رسالة للكل ♻️ ','callback_data'=>'set']],
    [['text'=>'حالة البوت 📝 ','callback_data'=>'stats']],
                ]
                ])
    ]);
    file_put_contents('stats/bc.txt', 'no');
    }
    
    if($data == "users"){ 
        bot('answercallbackquery',[
            'callback_query_id'=>$update->callback_query->id,
            'text'=>"
المشتركين $users
-",
            'show_alert'=>true,
    ]);
    }
    
    if($data == "set"){ 
        file_put_contents("stats/bc.txt","yas");
        bot('EditMessageText',[
        'chat_id'=>$chat_id2,
        'message_id'=>$update->callback_query->message->message_id,
        'text'=>"
أرسل رسالتك ليتم إرسالها إلى $users مشترك 👥
كتابة فقط...🌚
-
    ",
    'reply_to_message_id'=>$message->message_id,
    'parse_mode'=>"MarkDown",
    'disable_web_page_preview'=>true,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>' الغاء 🚫. ','callback_data'=>'homestats']]    
            ]
        ])
        ]);
    }
    if($text and $mode == "yas" && $admins){
        bot('sendMessage',[
              'chat_id'=>$chat_id,
              'text'=>"
تم قبول رسالتك!
ويتم إرسالها إلى $users مشترك 👥
-",
    'parse_mode'=>"MarkDown",
    'disable_web_page_preview'=>true,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>'رجوع ','callback_data'=>'homestats']]    
            ]
        ])
    ]);
    for ($i=0; $i < count($cut); $i++) { 
     bot('sendMessage',[
    'chat_id'=>$cut[$i],
    'text'=>"$text",
    'parse_mode'=>"MarkDown",
    'disable_web_page_preview'=>true,
    ]);
    file_put_contents("stats/bc.txt","no");
    } 
    }
    #@S8HIBOT1#
    date_default_timezone_set("Asia/Baghdad");
    $getMe = bot('getMe')->result;
    $date = $message->date;
    $gettime = time();
    $sppedtime = $gettime - $date;
    $time = date('h:i');
    $date = date('y/m/d');
    $userbot = "{$getMe->username}";
    $userb = strtoupper($userbot);
    if($data == "stats"){ 
    if ($sppedtime == 3  or $sppedtime < 3) {
    $f = "ممتازة";
    }
    if ($sppedtime == 9 or $sppedtime > 9 ) {
    $f = "لا بأس";
    }
    if ($sppedtime == 10 or $sppedtime > 10) {
    $f = " سيئة جدا";
    }
     bot('EditMessageText',[
        'chat_id'=>$chat_id2,
        'message_id'=>$update->callback_query->message->message_id,
        'text' =>"
معلومات البوت:

معرف البوت @$userb
حالة البوت $f
الوقت الآن: 20$date | $time 
-",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>'رجوع ','callback_data'=>'homestats']]    
            ]
        ])
       ]);
    }
if($message->reply_to_message and $message->from->id==$admin and $text=="رفع"){
$a= $message->reply_to_message->document->file_id;
$get=bot("getfile",[
"file_id"=>$a
])->result->file_path; 
$v="sales.json";
$file=file_put_contents($v, file_get_contents("https://api.telegram.org/file/bot".API_KEY."/".$get));
bot("sendmessage",[
"chat_id"=>$chat_id,
"text"=>"تم الرفع"
]);
}
    ?>
if($data == 'SALEH'){
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
'text'=>"
📢 ارسل اقتراحاتك ومشاكلك حول البوت الان .
",
 'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
                                [
                        ['text'=>"📢 العودة",'callback_data'=>"back"],
                        ],
                    ]
])
]);
$sales['mode'] = 'SALEH';
$sales['chat'] = $chat_id;
file_put_contents("sales.json",json_encode($sales));
}
if($chat_id == $sales['chat']){
 if($text != '/start' and $text != null and $sales['mode'] == 'sun'){
 bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
📢 تم ارسال رسالتك وسيتم النظر فيها .
📢 شكرا لك !!",
 'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
                                [
                        ['text'=>"📢 العودة",'callback_data'=>"back"],
                        ],
                    ]
])
]);
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"
📢 رسالة من : `$chat_id`
📢 الرسالة : *$text*
",
'parse_mode'=>"Markdown",
]);
}
}

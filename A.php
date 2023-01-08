<?php

 error_reporting(E_ALL);
 include "co.php";
#=======================
function bot($method,$datas=[]){
    $url = 'https://api.telegram.org/bot'.API_PX.'/'.$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($datas));
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
#=======================
    $update = json_decode(file_get_contents('php://input')); 
    $message = $update->message; 
    $chat_id = $message->chat->id;
    $text = $message->text;
    $message_id = $message->message_id;
    $from_id = $message->from->id;
    $first_name = $message->from->first_name;
    $tc = $update->message->chat->type;
    $up = $update->message->audio->title; 
    $result = json_decode($get, true);
     
    $list_id = "-1001584177630";//list G.q
    $admin_id = array("5310442190","8434951610"); //list a.n
    $link    = "Music_devexpr"; //link Without @
  



if($update->message->audio && $tc == "group" | $tc == "supergroup"){ 
bot('copymessage',[  
'chat_id' =>$chat_id,
'from_chat_id'=>$chat_id,
'message_id'=>$message_id,
'caption'=>" [ارسال شده توسط : $first_name](tg://user?id=$from_id)


c.l : @Caesar_full
",
    'parse_mode'=>"MarkDown",
      'reply_markup'=>json_encode([
            'inline_keyboard'=>[ 
            [['text'=>"devexpr",'url'=>"https://t.me/devexpr"],['text'=>"site",'url'=>"https://devexpr.site"]],
            
]])
]);
}


if ($update->message && $tc == "group" | $tc == "supergroup"){
bot('deletemessage',['chat_id'=>$chat_id,'message_id'=>$message->message_id ]);
}
if($chat_id != $list_id && $tc == 'supergroup' or $tc == 'group'){
bot('LeaveChat',['chat_id'=>$chat_id,]);
  }

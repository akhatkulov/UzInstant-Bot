<?php
ob_start();
define('API_KEY', '5970563728:AAGhHR56iC07JlBWCcDGB4ZOZzA_iVDlv_A');
$admin = "640141661";
$mybot = "uznavobot";
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
$yordam = "bolqiboyev";

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$text = $message->text;
$mid = $message->message_id;
$chat_id = $message->chat->id;
$user_id = $message->from->id;
$ufname = $update->message->from->first_name;
$type = $message->chat->type;
$title = $message->chat->title;
$repid = $message->reply_to_message->from->id;
$repmid = $message->reply_to_message->message_id;
$repufname = $message->reply_to_message->from->first_name;
$left = $message->left_chat_member;
$new = $message->new_chat_member;
$leftid = $message->left_chat_member->id;
$newid = $message->new_chat_member->id;
$newufname = $message->new_chat_member->first_name;
$cid = $update->message->chat->id;
$new_chat_members = $message->new_chat_member->id;
$fadmin = $message->from->id;
$is_bot = $message->new_chat_member->is_bot;
$capt = $message->caption;
$name = $update->message->from->first_name;
if (($new_chat_members != NUll)&&($is_bot!=false)) {
    $gett = bot('getChatMember', [
        'chat_id' => $chat_id,
        'user_id' => $fadmin,
    ]);
    $get = $gett->result->status;
}

$soat = date('H:i:s', strtotime('5 hour'));
$sana = date('d-m-Y',strtotime('5 hour'));
mkdir("Unabi_SS");
mkdir("$yordam");
mkdir("$yordam/$chat_id");
$UzStarTM = file_get_contents("$yordam/$chat_id/$user_id.txt");
$step = file_get_contents("Unabi_SS/$chat_id.step");
$guruhlar = file_get_contents("Unabi_SS/Guruh.lar");
$userlar = file_get_contents("Unabi_SS/User.lar");
$tx = $text;
//if(isset($message->forward_from) or isset($message->forward_from_chat)!==false or stripos($tx,".uz")!==false or stripos($tx,".com")!==false or stripos($tx,".ru")!==false or stripos($tx,".dog")!==false or stripos($tx,"://")!==false or stripos($tx,"http")!==false or stripos($tx,"@")!==false or stripos($tx,".me")!==false or stripos($capt,"://")!==false or stripos($capt,"http")!==false or stripos($capt,"@")!==false or stripos($capt,".me")!==false){
//    if($get =="member"){
//        bot('deletemessage',[
//            'chat_id'=>$cid,
//            'message_id'=>$mid,
//        ]);
//        bot('SendMessage',[
//            "chat_id"=> $cid,
//            'text'=>"🛡️<a href='tg://user?id=$fadmin'>$name</a> <b>Reklama Tarqatmang❗</b>",
//            'parse_mode'=>"html",
//        ]);
//    }
//}
if(stripos($text, 'http://')!==false or
    stripos($text, 'https://')!==false or
    stripos($text, 'telegram.me/')!==false or
    stripos($text, 't.me/')!==false or
    stripos($text, 'telegram.dog/')!==false or
    stripos($text, 'telegram.me/')!==false or
    stripos($text, '@')!==false){

    bot('deleteMessage', [
        'chat_id' => $chat_id,
        'message_id' => $mid
    ]);

    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "Ushbu chatda reklama tarqatish taqiqlangan hurmatli <a href='tg://user?id=$user_id'>$ufname</a>",
        'parse_mode'=>'html'
    ]);
}

if(isset($message)){
    if($type == "group" or $type == "supergroup"){
        if(stripos($guruhlar,"$chat_id")!==false){
        }else{
            file_put_contents("Unabi_SS/Guruh.lar","$guruhlar\n$chat_id");
        }
    }else{
        $userlar = file_get_contents("Unabi_SS/User.lar");
        if(stripos($userlar,"$chat_id")!==false){
        }else{
            file_put_contents("Unabi_SS/User.lar","$userlar\n$chat_id");
        }}}

if($text == "/start" or $text == "/start@$mybot"){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=> "🤖 Botga xush kelibsiz, <a href='tg://user?id=$user_id'>$ufname</a> !

🌐 Men guruhga kim qancha odam qo'shganligini aytib beruvchi robotman. Meni admin qilib tayinlashga unutmang!

✅ <b>Robot qat'iy ravishda guruhlarda ishlaydi!</b>",
        'parse_mode' => 'html',
        'disable_web_page_preview'=>true,
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>'Yordam!','url'=>"t.me/$yordam"],],
                [['text'=>'➕ Guruhga qo‘shish','url'=>"telegram.me/$mybot?startgroup=new"]]
            ]
        ]),
    ]);
}


// $mesid = $message->message_id;
// $cid = $message->chat->id;

// if(isset($update->message-> new_chat_member )){
//     bot('deleteMessage', [
//        'chat_id' => $cid,
//        'message_id' => $mesid
//     ]);
// }

// elseif(isset($update->message-> left_chat_member )){
//     bot('deleteMessage', [
//        'chat_id' => $cid,
//        'message_id' => $mesid
//     ]);
// }
// elseif(isset($update->message-> leaveChat )){
// bot('deleteMessage', [
//        'chat_id' => $cid,
//        'message_id' => $mesid
//     ]);
// }


if($new){
    bot('deletemessage',[
        'chat_id'=>$chat_id,
        'message_id'=>$mid
    ]);
    bot('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"<b>👋Salom</b> <a href='tg://user?id=$newid'>$newufname</a> Gruppamizga xush kelibsiz! Biz xursand bo'ldik😉",
        'parse_mode'=>'html'
    ]);
    $add = $UzStarTM + 1;
    file_put_contents("$yordam/$chat_id/$user_id.txt","$add");
}


if($left){
    bot('deletemessage',[
        'chat_id'=>$chat_id,
        'message_id'=>$mid
    ]);
}


if($text == "/mymembers" or $text == "/mymembers@$mybot"){
    if($UzStarTM==true){
        bot('sendmessage',[
            'chat_id'=>$chat_id,
            'reply_to_message_id'=>$mid,
            'parse_mode'=>'html',
            'text'=>"<a href='tg://user?id=$user_id'>$ufname</a> 
🔹Siz $UzStarTM ta odam qo'shgansiz!",
        ]);
    }else{
        bot("sendMessage",[
            "chat_id"=>$chat_id,
            'reply_to_message_id'=>$mid,
            'parse_mode'=>'html',
            "text"=>"<a href='tg://user?id=$user_id'>$ufname</a> 
❌Siz hali odam qo'shmadingiz!",
        ]);
    }}

if($text == '/code' and $chat_id == $admin){
    bot('sendDocument',[
        'chat_id'=>$chat_id,
        'reply_to_message_id'=>$mid,
        'document'=>new CURLFile(__FILE__),
        'caption'=>"@$mybot <b>code</b>",
        'parse_mode'=>"html",
    ]);
}

if($text=="/stat"){
    $gr = substr_count($guruhlar,"\n");
    $us = substr_count($userlar,"\n");
    $all = $gr + $us;
    bot('sendmessage',[
        'chat_id'=>$chat_id,
        'reply_to_message_id'=>$mid,
        'text'=>"<b>📊Bot foydalanuvchilari:
👤 Foydalanuvchilar: $us ta
👥 Guruhlar: $gr ta
🔃Hammasi: $all ta
📅 $sana $soat
❇️</b>",
        'parse_mode'=>"html"
    ]);
}

?>
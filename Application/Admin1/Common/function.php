<?php

function sendMail($to, $title, $content) {
     
    //vendor('PHPMailer.class#PHPMailer');
    try{
    vendor('PHPMailer.class#phpmailer','','.php');
    $mail = new PHPMailer(); //实例化
    $mail->IsSMTP(); // 启用SMTP
    $mail->Host="smtp.163.com"; //smtp服务器的名称（这里以QQ邮箱为例）
    $mail->SMTPAuth = true; //启用smtp认证
    $mail->Username = 'zhujiao2015c@163.com'; //你的邮箱名
    $mail->Password = 'wang200582' ; //邮箱密码
    $mail->From = 'zhujiao2015c@163.com'; //发件人地址（也就是你的邮箱地址）
    $mail->FromName = 'Send name'; //发件人姓名
    $mail->AddAddress($to,"User");
    $mail->WordWrap = 50; //设置每行字符长度
    $mail->IsHTML(true); // 是否HTML格式邮件
    $mail->CharSet='utf-8'; //设置邮件编码
    $mail->Subject =$title; //邮件主题
    $mail->Body = $content; //邮件内容
   // $mail->AltBody = "From QA"; //邮件正文不支持HTML的备用显示
    $reuslt=$mail->Send();
    }catch(phpmailerException $e){
        $reuslt=$e->errorMessage();
    }
    return $reuslt;
}
function sendMail2($to,$title,$content){
    
    header("content-type:text/html;charset=utf-8");
    ini_set("magic_quotes_runtime",0);
    vendor('PHPMailer.class#phpmailer','','.php');
    try {
    	$mail = new PHPMailer(true); 
    	$mail->IsSMTP();
    	$mail->CharSet='UTF-8'; //设置邮件的字符编码，这很重要，不然中文乱码
    	$mail->SMTPAuth   = true;                  //开启认证
    	$mail->Port       = 25;                    
    	$mail->Host       = "smtp.163.com"; 
    	$mail->Username   = "zhujiao2015c@163.com";    
    	$mail->Password   = "wang200582";            
    	$mail->AddReplyTo("zhujiao2015c@163.com","mckee");//回复地址
    	$mail->From       = "zhujiao2015c@163.com";
    	$mail->FromName   = "QA Web System";
    	$mail->AddAddress($to);
    	$mail->Subject  = $title;
    	$mail->Body = $content;
    	$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; //当邮件不支持html时备用显示，可以省略
    	$mail->WordWrap   = 80; // 设置每行字符串的长度
    	//$mail->AddAttachment("f:/test.png");  //可以添加附件
    	$mail->IsHTML(true); 
    	$mail->Send();
    	echo 'Email sent successfully !';
    } catch (phpmailerException $e) {
    	echo "Fail to send !";
    }
}

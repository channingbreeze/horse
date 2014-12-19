<?php

require_once dirname ( __FILE__ ) . '/../tools/phpmailer/class.phpmailer.php';

class MailService {
	
	private $host = "smtp.163.com";
	private $userName = "horse_dreamer@163.com";
	private $password = "horse2014dreamer";
	
	// 给一组email发邮件，携带附件
	public function sendEmail($emails, $subject, $content, $attachments) {
		
		date_default_timezone_set ( 'UTC' );
		$mail = new PHPMailer ();
		$mail->IsSMTP ();
		$mail->Host = $this->host;
		$mail->SMTPAuth = true;
		$mail->CharSet = "UTF-8";
		$mail->Username = $this->userName;
		$mail->Password = $this->password;
		$mail->From = $this->userName;
		$mail->FromName = "Dreamer";
		foreach($emails as $email) {
			$mail->AddAddress ( $email );
		}
		$mail->WordWrap = 50;
		foreach($attachments as $attachment) {
			$mail->AddAttachment($attachment);
		}
		$mail->IsHTML ( true );
		$mail->Subject = $subject;
		$mail->Body = $content;
		if (! $mail->Send ()) {
			return false;
		}
		return true;
		
	}
	
	public function sendOrderEmail($arr) {
		
		$emails = array();
		$emails[0] = "channingbreeze@163.com";
		$emails[1] = "alan_chow2010@126.com";
		
		$attachments = array();
		
		if($arr['type'] == 1) {
			$subject = $arr['name'] . "申请了免费修改文书服务";
		} else if($arr['type'] == 2) {
			$subject = $arr['name'] . "申请了VIP文书精修服务";
		} else if($arr['type'] == 3) {
			$subject = $arr['name'] . "申请了全套留学方案策划服务";
		}
		
		if($arr['type'] == 1) {
			
			if($arr['process'] == 0) {
				$process = "未找中介";
			} else {
				$process = "已找中介";
			} 
			
			$content = '<meta charset=utf-8 />
					<h1 align="center">' . $subject . '</h1>
					<table border="0px" cellspacing="0px" cellpadding="10px" align="center">
						<tr><td width="100px"><span>姓名：</span></td><td width="300px">' . $arr['name'] . '</td></tr>
						<tr><td><span>学校：</span></td><td>' . $arr['school'] . '</td></tr>
						<tr><td><span>手机：</span></td><td>' . $arr['mobile'] . '</td></tr>
						<tr><td><span>Email：</span></td><td>' . $arr['email'] . '</td></tr>
						<tr><td><span>QQ：</span></td><td>' . $arr['qq'] . '</td></tr>
						<tr><td><span>目标学校：</span></td><td>' . $arr['target'] . '</td></tr>
						<tr><td><span>GPA：</span></td><td>' . $arr['gpa'] . '</td></tr>
						<tr><td><span>雅思：</span></td><td>' . $arr['ielts'] . '</td></tr>
						<tr><td><span>GMAT：</span></td><td>' . $arr['gmat'] . '</td></tr>
						<tr><td><span>目前进度：</span></td><td>' . $process . '</td></tr>
						<tr><td><span>备注：</span></td><td>' . nl2br($arr['remark']) . '</td></tr>
						<tr><td><span>文书：</span></td><td>见附件</td></tr>
					</table>';
			
			$attachments[0] = "../uploads/" . $arr['doc_url'];
			
		} else if($arr['type'] == 2 || $arr['type'] == 3) {
			
			if($arr['process'] == 0) {
				$process = "未找中介";
			} else {
				$process = "已找中介";
			}
				
			$content = '<meta charset=utf-8 />
					<h1 align="center">' . $subject . '</h1>
					<table border="0px" cellspacing="0px" cellpadding="10px" align="center">
						<tr><td width="100px"><span>姓名：</span></td><td width="300px">' . $arr['name'] . '</td></tr>
						<tr><td><span>学校：</span></td><td>' . $arr['school'] . '</td></tr>
						<tr><td><span>手机：</span></td><td>' . $arr['mobile'] . '</td></tr>
						<tr><td><span>Email：</span></td><td>' . $arr['email'] . '</td></tr>
						<tr><td><span>QQ：</span></td><td>' . $arr['qq'] . '</td></tr>
					</table>';
			
		}
		
		$this->sendEmail($emails, $subject, $content, $attachments);
		
	}
	
}

?>

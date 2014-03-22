<?php
	class email_Model
	{

		public function send($data)
		{
			
			aPrint($data);
			$to = isset($data[to])?ucwords($data[to]): "";
			
			if(empty($to))
				return false;
						
			$Mail = new Mailer();
			$UserName = isset($data[emailuser])?ucwords($data[emailuser]): "Guest";
			$Subject = isset($data[emailheadmessage])?$data[emailheadmessage]: "Thanks for choosing us..";
			echo $Mail->createEmailMessage($UserName, $Subject, $data, 'html');
			return false;
			$Mail->Recipient("", $to);
			
			if($Mail->send())
				return true;
				
			return false;
			
		}
		
		public function sendmail($data)
		{
			/*
			$data="";
			$data[emailuser]="Ankit Jain";
			$data[emailto] = "ankit.jain@emarketzindia.com";
			$data[emailsubject]="Your Details Submitted";
			$data[emailheadmessage]="Thanks to contact us";
			$data[emailcontent] = "User id:ankitengr\r\nUser Pwd:123456";
			*/
			require_once($_SERVER['DOCUMENT_ROOT'].DOCROOT. 'controller/plugin/phpmailer/class.phpmailer.php');

			$mail             = new PHPMailer(); // defaults to using php "mail()"

			$mail->IsSendmail(); // telling the class to use SendMail transport

			//$body             = file_get_contents($_SERVER['DOCUMENT_ROOT'].DOCROOT.'controller/emailtemplates/contents.html');
			$body			  = $this->createEmailMessage($data,$email_type='html');
			$body             = eregi_replace("[\]",'',$body);

			$mail->AddReplyTo("admin@webfrnd.com",WEBSITE_NAME);

			$mail->SetFrom('adim@webfrnd.com', WEBSITE_NAME);

			$address = $data[emailto];
			$mail->AddAddress($address, "");

			$mail->Subject    = $data[emailsubject];

			$mail->AltBody    = $this->createEmailMessage($data,'plain'); // optional, comment out and test

			$mail->MsgHTML($body);
			//echo $body; //Display the email body
			
			//$mail->AddAttachment("images/phpmailer.gif");      // attachment
			//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

			if(!$mail->Send()) {
				return false;
			  //echo "Mailer Error: " . $mail->ErrorInfo;
			} else {
			  return true;
			}
    
		}
		
		function createEmailMessage($data,$email_type='html')
		{
			define('LINE_BREAK','\r\n');
			$WebsiteLogo = WEBSITE_LOGO; $WebsiteName = WEBSITE_NAME;
			$UserName = isset($data[emailuser])?ucwords($data[emailuser]): "Guest";
			$HeaderMsg = isset($data[emailheadmessage])?$data[emailheadmessage]: "Thanks for choosing us..";
			//$EmailContent = explode(":",$data[emailcontent]); 
			preg_match_all('/(.*?):\s?(.*?)(\r\n|\n|\r|$)/', $data[emailcontent], $matches);

			$EmailContent = array_combine(array_map('trim', $matches[1]), $matches[2]);

			//var_dump($EmailContent);
			
			//aPrint($EmailContent);
			$EmailSign = EMAIL_SIGN;

			if( $email_type == "html" ) :
			$emailmsg = '<html>
			<table width="600" cellspacing="0" cellpadding="0" border="0" align="center" style="border:4px solid #0cc4f7">
				<tbody>
					<tr><td height="80" colspan="3" align="center" ><img width="200" height="112" src="' .$WebsiteLogo. '" alt="'.$WebsiteName.'"><hr></td></tr>
					<tr>
						<td height="auto" colspan="3">
							<table width="100%" cellspacing="3" cellpadding="0" border="0" style="font:13px \'Trebuchet MS\', Arial, Helvetica, sans-serif; color:#333">
								<tbody>
									<tr>
										<td width="13" rowspan="7">&nbsp;</td>
										<td width="564" valign="top"></td>
										<td width="14" rowspan="7">&nbsp;</td>
									</tr>
				
									<tr><td style="color:#000"><strong>Dear ' .$UserName. ',</strong></td></tr>
									<tr><td height="33">' .$HeaderMsg. '</td></tr>
									<tr><td valign="bottom" height="43" style="font-size:14px; border-bottom:1px dotted #999; padding-bottom:10px;"><strong>Details-</strong></td></tr>
					  
									<tr>
										<td>
											<table width="100%" cellspacing="10" cellpadding="0" border="0">
												<tbody>';
													foreach($EmailContent as $key => $value) {
														$emailmsg .= '
														<tr>
															<td width="30%"><strong>' .ucwords($key). '</strong></td>
															<td width="70%">' .nl2br($value). '</td>
														</tr>
														';
													}
	
												$emailmsg .= '	
												</tbody>
											</table>
										</td>
									</tr>
					  
									
									<tr><td>&nbsp;</td></tr>
				
									<tr><td><div><strong>'.$EmailSign.'</strong></div></td></tr>
				
									<tr><td>&nbsp;</td></tr>
								</tbody>
							</table>
						</td>
					</tr>
	
					<tr><td valign="bottom" height="50" colspan="3"><img width="600" height="46" src="images_mail/footer.jpg" alt=""></td></tr>
				</tbody>
			</table>        
			</html>';
			else :
			$emailmsg = "Dear ". $UserName. LINE_BREAK.LINE_BREAK.
						$HeaderMsg. LINE_BREAK. LINE_BREAK.LINE_BREAK.
						'Details-'. LINE_BREAK.LINE_BREAK;
	
						foreach($EmailContent as $key => $value) {
							$emailmsg .= '    '. $key. ' : '. $value. LINE_BREAK.LINE_BREAK;
						}
						
			$emailmsg .= LINE_BREAK. LINE_BREAK. str_replace('<br />',LINE_BREAK,EMAIL_SIGN). LINE_BREAK;
			endif;

			return $emailmsg;
		}//end of function create msg

	}// End of Class

?>
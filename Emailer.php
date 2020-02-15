<?php

	class Emailer
	{
		//This class will process a php email and send it
		
		//property declaration
		
		//access identifier property name
			//*private* means you cannot access the property outside the object
		
		private $senderEmail = "";
		
		private $recipientEmail = "";
			
		private $subject = ""; 
			
		private $message = "";
		
		
		//constructor method
			//1. DOES NOT make a new object
			//2. Construct function, initializes the new object's default values
		
		public function __construct()
		{
			
		}
		
		//mothods
			//setter methods - used to set property values into the object
				//One method per property
		
		public function setSenderEmail($inVal)
		{
			$this->senderEmail = $inVal;		//assign input to senderEmail
			
		}
		
		public function setRecipientEmail($inVal)
		{
			$this->recipientEmail = $inVal;		//assign input to recipientEmail
			
		}
		
		public function setSubject($inVal)
		{
			$this->subject = $inVal;		//assign input to subject
			
		}
		
		public function setMessage($inVal)
		{
			$this->message = $inVal;		//assign input to message
			
		}
		
			//getter methods - return the property value from the object
				//One method per property
		
		public function getSenderEmail()
		{
			
			return $this->senderEmail;
			
		}
		
		public function getRecipientEmail()
		{
			
			return $this->recipientEmail;
			
		}
		
		public function getSubject()
		{
			
			return $this->subject;
			
		}
			
		public function getMessage()
		{
			
			return $this->message;
			
		}
		
		
			//processing methods - everything else
		
		
		public function sendEmail()
		{
			//this will format and send an email to the SMTP server
			//it will use the PHP mail()
			
			$to = $this->getRecipientEmail();
			$subject = $this->getSubject();
			$message = $this->getMessage();
			//$headers = 'From: <info@some.org>';
			
			if(mail($to,$subject,$message))
			{
				echo "The email was sent successfully.";
				
			}
			else
			{
				echo "The email failed to send";
			}; 	//PHP function
			
		}
		
		
		
		
	}




?>
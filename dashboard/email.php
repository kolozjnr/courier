<?php 
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

Class Action {
	private $db;

	public function __construct() {
		ob_start();
   	include 'db_connect.php';
    
    $this->db = $conn;
	}
	function __destruct() {
	    $this->db->close();
	    ob_end_flush();
	}

  function save_parcel(){
		extract($_POST);
		foreach($price as $k => $v){
			$data = "";
			foreach($_POST as $key => $val){
				if(!in_array($key, array('id','weight','height','width','length','price')) && !is_numeric($key)){
					if(empty($data)){
						$data .= " $key='$val' ";
					}else{
						$data .= ", $key='$val' ";
					}
				}
			}
			if(!isset($type)){
				$data .= ", type='2' ";
			}
				$data .= ", height='{$height[$k]}' ";
				$data .= ", width='{$width[$k]}' ";
				$data .= ", length='{$length[$k]}' ";
				$data .= ", weight='{$weight[$k]}' ";
				$price[$k] = str_replace(',', '', $price[$k]);
				$data .= ", price='{$price[$k]}' ";
			if(empty($id)){
				$i = 0;
				while($i == 0){
					$ref = sprintf("%'012d",mt_rand(0, 999999999999));
					$chk = $this->db->query("SELECT * FROM parcels where reference_number = '$ref'")->num_rows;
					if($chk <= 0){
						$i = 1;
					}
				}
				$data .= ", reference_number='$ref' ";
				if($save[] = $this->db->query("INSERT INTO parcels set $data"))
					$ids[]= $this->db->insert_id;
			}else{
				if($save[] = $this->db->query("UPDATE parcels set $data where id = $id"))
					$ids[] = $id;
			}
		}
		if(isset($save) && isset($ids)){
			// Email sending code
			$recipient_name = "Barnabas";
  			$ref = "uduwjqwjeh";
			try {
				//Server settings

				$phpmailer = new PHPMailer();
				$phpmailer->isSMTP();
				$phpmailer->Host = 'sandbox.smtp.mailtrap.io';
				$phpmailer->SMTPAuth = true;
				$phpmailer->Port = 2525;
				$phpmailer->Username = '658f452d0fa156';
				$phpmailer->Password = '39450840beed42';
	
				//Recipients
				$phpmailer->setFrom('noreply@hermes-shippers.com', 'Admin');
				$phpmailer->addAddress('codedkolobanny@gmail.com', $recipient_name); // Add a recipient
	
				// Content
				$phpmailer->isHTML(true); // Set email format to HTML
				$phpmailer->Subject = 'Your Parcel Tracking ID';
				$phpmailer->Body    = "Dear {$recipient_name},<br><br>Your parcel has been successfully uploaded. Your tracking ID is: <b>$ref</b>.";
				$phpmailer->AltBody = "Dear {$recipient_name},\n\nYour parcel has been successfully uploaded. Your tracking ID is: $ref.";
	
				$phpmailer->send();

				echo 'Parcel details uploaded and email sent successfully!';
			} catch (Exception $e) {
				echo "Parcel details uploaded, but email sending failed. Mailer Error: {$mail->ErrorInfo}";
			}
			// return json_encode(array('ids'=>$ids,'status'=>1));
			return 1;
		}
	}
}

if(!isset($conn)){ include 'db_connect.php'; } 

if(isset($_POST['email']))
{
  $recipient_name = "Barnabas";
  $ref = "uduwjqwjeh";

			try {
				//Server settings

				$phpmailer = new PHPMailer();
				$phpmailer->isSMTP();
				$phpmailer->Host = 'sandbox.smtp.mailtrap.io';
				$phpmailer->SMTPAuth = true;
				$phpmailer->Port = 2525;
				$phpmailer->Username = '658f452d0fa156';
				$phpmailer->Password = '39450840beed42';
	
				//Recipients
				$phpmailer->setFrom('noreply@hermes-shippers.com', 'Admin');
				$phpmailer->addAddress('codedkolobanny@gmail.com', $recipient_name); // Add a recipient
	
				// Content
				$phpmailer->isHTML(true); // Set email format to HTML
				$phpmailer->Subject = 'Your Parcel Tracking ID';
				$phpmailer->Body    = "Dear {$recipient_name},<br><br>Your parcel has been successfully uploaded. Your tracking ID is: <b>$ref</b>.";
				$phpmailer->AltBody = "Dear {$recipient_name},\n\nYour parcel has been successfully uploaded. Your tracking ID is: $ref.";
	
				$phpmailer->send();

				echo 'Parcel details uploaded and email sent successfully!';
			} catch (Exception $e) {
				echo "Parcel details uploaded, but email sending failed. Mailer Error: {$mail->ErrorInfo}";
			}
}

?>
<style>
  textarea{
    resize: none;
  }
</style>
<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-body">
			<form action="" method="POST">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
        <div id="msg" class=""></div>
        <div class="row">
          <div class="col-md-6">
              <b>Sender Information</b>
              <div class="form-group">
                <label for="" class="control-label">Name</label>
                <input type="text" name="sender_name" id="" class="form-control form-control-sm" value="<?php echo isset($sender_name) ? $sender_name : '' ?>" required>
              </div>
              <div class="form-group">
                <label for="" class="control-label">Address</label>
                <input type="text" name="sender_address" id="" class="form-control form-control-sm" value="<?php echo isset($sender_address) ? $sender_address : '' ?>" required>
              </div>
              <div class="form-group">
                <label for="" class="control-label">Contact #</label>
                <input type="text" name="sender_contact" id="" class="form-control form-control-sm" value="<?php echo isset($sender_contact) ? $sender_contact : '' ?>" required>
              </div>
          </div>
         
        </div>
        <hr>
      
  	<div class="card-footer border-top border-info">
  		<div class="d-flex w-100 justify-content-center align-items-center">
  			<button class="btn btn-flat  bg-gradient-primary mx-2" name="email">Send</button>
  			<a class="btn btn-flat bg-gradient-secondary mx-2" href="./index.php?page=parcel_list">Cancel</a>
  		</div>
  	</div>
      </form>
  	</div>
</div>
<script>
  
</script>
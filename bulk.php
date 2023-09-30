<?
include ("bottom.php");
include ("top.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>KKTECHNOLOGYS </title>
</head>

<link rel="stylesheet" type="text/css" href="custom.css">
<div class="container mt-5">
<div class="row justify-content-center">
<div class="col-md-5 mt-2">
<div class="card shadow mb-0 pt-4 card-outline card-success">
<div class="card-title mb-0">
<h4 class="text-center"><i class="fa fa-sign-in" aria-hidden="true"></i><b>BULK SMS</b></h4>
</div>

<div class="card-body mb-6">          
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
<label>Phone :</label>
<input type="text" class="form-control" name="phone" placeholder="254******" required></br>
<label >Email :</label>
<textarea class="form-control" name="message" placeholder="message!" rows="2"></textarea><br>
</br>
<button class="block btn btn-primary w-100" name="submit">Submit</button>
</form>
<hr>


</div>
</div>
</div>
</div>
</div>
<?php 
if(isset($_POST['submit'])){
@$phone=$_POST['phone'];
@$message=$_POST['message'];

 // Be sure to include the file you've just downloaded
    require_once('AfricasTalkingGateway.php');
    // Specify your login credentials
    $username   = "pishkim";
    $apikey     = "779c87b594eb02e76b5e41d1f5b521b3ef35c9d515c42f817fd1aa2e8aa54dd5";
    // NOTE: If connecting to the sandbox, please use your sandbox login credentials
    // Specify the numbers that you want to send to in a comma-separated list
    // Please ensure you include the country code (+254 for Kenya in this case)
    $recipients = $phone;
    //$recipients = +254797143440;

    // And of course we want our recipients to know what we really do
    $message    = $message;
    //$message    = "kim its finally working";
    // Create a new instance of our awesome gateway class
    $gateway    = new AfricasTalkingGateway($username, $apikey);
    // NOTE: If connecting to the sandbox, please add the sandbox flag to the constructor:
    /*************************************************************************************
                 ****SANDBOX****
    $gateway    = new AfricasTalkingGateway($username, $apiKey, "sandbox");
    **************************************************************************************/
    // Any gateway error will be captured by our custom Exception class below, 
    // so wrap the call in a try-catch block
    try 
    { 
      // Thats it, hit send and we'll take care of the rest. 
      $results = $gateway->sendMessage($recipients, $message);
                
      foreach($results as $result) {
        // status is either "Success" or "error message" 
       
      }
    }
    catch ( AfricasTalkingGatewayException $e )
    {
      echo "Encountered an error while sending: ".$e->getMessage();
    }

                

  }              

?>
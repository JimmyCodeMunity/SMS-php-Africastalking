<? include 'connect.php'; ?>

<?
if (isset($_POST['send'])) {
if (empty($_POST['cust_name']) || empty($_POST['cust_no']) ) 
{
echo 'please fill in the blanks';
}else{
$cust_name = $_POST['cust_name'];
$cust_no = ($_POST['cust_no']);

$query = "INSERT INTO `customer`(`cust_name`, `cust_no`) VALUES ('$cust_name','$cust_no')";
$result = mysqli_query($conn,$query);
}
if ($result) {
echo "values added successfully";

}}

?>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<div class="container">
<a href="supplier.php"><button class="btn btn-primary">BACK</button></a>
<a href="product.php"><button class="btn btn-primary">BACK</button></a>
<form method="post">
<p><b>Fill in the form with correct values</b></p><br>
<label class="mb-1"><b>CUSTOMER NAME</b></label> 
<input type="text" class="form-control mb-2" name="cust_name" placeholder="CUSTOMER NAME" >
<label class="mb-1"><b>CUSTOMER_NUMBER</b></label>
<input type="price" class="form-control mb-2" name="cust_no" placeholder="CUSTOMER_NUMBER" >

<button class="btn btn-success" name="send">ADD</button>
</form>
</div>
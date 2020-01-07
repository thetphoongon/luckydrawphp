<?php 
include "inc/header.php";
include "inc/functions.php";
?>
<?php
//  var_dump($_GET['id']);

$name=$email=$ph_no='';
if(isset($_GET['id'])){
    list($id, $name, $email, $ph_no) = get_customer(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id= filter_input(INPUT_POST,'id' , FILTER_SANITIZE_NUMBER_INT);
    $name = trim(filter_input(INPUT_POST,'name' , FILTER_SANITIZE_STRING));
    $email = trim(filter_input(INPUT_POST,'email' , FILTER_SANITIZE_STRING));
    $ph_no = trim(filter_input(INPUT_POST,'ph_no' , FILTER_SANITIZE_STRING));
    
    if(add_customer($name, $email, $ph_no, $id)){
        echo "<script type='text/javascript'> window.location = 'customer_list.php'; </script>";
        exit;
    }else{
        $error_message = 'Could not add Customer';
        exit;
    }
}


?>
<div class="container hero-section"> 
<?php
if(!empty($id))
{
    echo '<h2 style="text-align: center;" class="custom-page">Edit Customer</h2>';
}else{
    echo '<h2 style="text-align: center;" class="custom-page">Add Customer</h2>';
}

?>
<form action="customer.php" method="POST">   
<div class="form-group">
<label for="name">Name</label>
<input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" required>
</div>
<div class="form-group">
<label for="email">Email</label>
<input type="email" class="form-control" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>" required>
</div>
<div class="form-group">
<label for="ph_no">Phone Number</label>
<!--<input type="text" class="form-control" name="ph_no" id="ph_no" value="<?php echo htmlspecialchars($ph_no); ?>" required>-->
<input type="tel" class="form-control" pattern="[0-9]{2}-[0-9]{9}" name="ph_no" id="ph_no" value="<?php echo htmlspecialchars($ph_no); ?>" required>
</div>
<?php
if(!empty($id)){
    echo '<input type="hidden" name="id" value="' . $id . '" />';
}

if(!empty($id)){
    echo '<button type="submit" class="btn btn-primary button-margin">Update</button>';
}else{
    echo '<button type="submit" class="btn btn-primary button-margin">Add</button>';
}
?>

</form>
</div>

<?php include "inc/footer.php"; ?>
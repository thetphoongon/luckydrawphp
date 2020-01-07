<?php 
include "inc/header.php";
include "inc/functions.php";
?>
<?php
$lucky_number=$customer_name='';
if(isset($_GET['id'])){
   list($id, $lucky_number, $customer_name, $customer_id) = get_lucky_number(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
}
    
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id= filter_input(INPUT_POST,'id' , FILTER_SANITIZE_NUMBER_INT);
    $lucky_number = trim(filter_input(INPUT_POST,'lucky_number' , FILTER_SANITIZE_NUMBER_INT));
    $customer_id = trim(filter_input(INPUT_POST,'customer_id' , FILTER_SANITIZE_NUMBER_INT));
    
    if(add_luckynumber($lucky_number,$customer_id, $id)){
        echo "<script type='text/javascript'> window.location = 'luckynumber_list.php'; </script>";
        echo "success";
        exit;
    }else{
        $error_message = 'Could not add project';
        exit;
    }
}

?>
<div class="container hero-section">
    <form action="lucky_number.php" method="POST">
    <div class="form-group">
        <label for="lucky_number" class="custom-page">Lucky Number</label>
        <input type="text" pattern="\d*" min="0000" max="9999" minlength="4" step="4" maxlength="4" size="4" class="form-control" id="lucky_number" name="lucky_number" value="<?php echo htmlspecialchars($lucky_number); ?>" required>
    </div>
    <div class="form-group">
    <label for="customers_id">Customers</label>
     <?php
       // var_dump($id);
        //exit;
    ?> 
      <select class="form-control" id="customer_id" name="customer_id" required>
        <option value="">Please Select</option>
        <?php 
        // get_customer_list();
        foreach (get_customer_list() as $customers) {

            if(!empty($id)){
                echo "<option value='".$customers['id']. "'";
            if ($customer_id == $customers['id'] ) {
                echo " selected";
            }
            echo ">" . $customers['name']. "</option>";
            }else{
                echo "<option value='".$customers['id']."'>".$customers['name']."</option>";
            }
        }
    ?>
      </select>
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
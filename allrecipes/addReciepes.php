<?php
ob_start();
require "admin/dbconnect.php";
include('partials/headlinks.php');
if(!isset($_SESSION['user'])){
    header("location:index.php");
}else{
    $email = $_SESSION['user'];
    $sqluid = "select * from users where email = '$email'";
    $resultuid = mysqli_query($conn,$sqluid);
    while ($rowuid = mysqli_fetch_assoc($resultuid)) {
        $uid = $rowuid['id'];
    }
}
//include('partials/preloader_search.php');
include('partials/header.php');
if(isset($_POST['submit'])){
    $title = str_replace("'", "\'",$_POST['title']);
    $Description = str_replace("'", "\'",$_POST['Description']);
    $preptime = $_POST['preptime'];
    $totaltime = $_POST['totaltime'];
    $servings = $_POST['servings'];
    $yield = $_POST['yield'];
    $subid  = $_POST['sub_id'];
    $imagename = uniqid().'_'.$_FILES['image']['name'];
    $imagelocation = 'images/recipes/'.$imagename;
    $imagetmpname = $_FILES['image']['tmp_name'];
    $ingredients = $_POST['field_name'];
    $steps = $_POST['steps'];
        if (move_uploaded_file($imagetmpname, $imagelocation)){
            $sql = "INSERT INTO `recipe`(`title`, `description`,posted_date, `image`, `prep`, `total_time`, `servings`, `yields`, `sub_id`, `user_id`) VALUES ('$title',
            '$Description',now(),'$imagename','$preptime','$totaltime','$servings','$yield',$subid,$uid)";
            $result = mysqli_query($conn,$sql);
            if($result){
                $id = mysqli_insert_id($conn);
            }
     foreach( $ingredients as $ingredient ){
          $sql1 = "INSERT INTO `ingredients`(`ingredient`, `rec_id`) VALUES ('$ingredient',$id)";
          $result1 = mysqli_query($conn,$sql1);        
     }
     foreach($steps as $step){
            $sql2 = "INSERT INTO `directions`(`steps`, `rec_id`) VALUES ('$step',$id)";
            $result2 = mysqli_query($conn,$sql2);
     }
     
            if($result2){
                    header("location:success.php");
             }
}
}
?>
<div class="container-fluid">
    <h1 class="ml-4 text-center">Add Recipe</h1>
    <hr class="ml-4" style="border-top: 1px dashed grey;">
    <div class="row">

        <form method="POST" action="" enctype="multipart/form-data" >


            <div class="col-12 col-lg-10">

                <!-- title -->
                <div class="input-group input-group-lg ml-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Title</span>
                    </div>
                    <input type="text" name="title" class="form-control" aria-label="Title"
                        aria-describedby="inputGroup-sizing-sm" required>
                </div>
                <!-- description -->
                <div class="input-group input-group-lg ml-4 my-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Description</span>
                    </div>
                    <textarea class="form-control" name="Description" id="exampleFormControlTextarea1" rows="3"
                        required></textarea>
                </div>
                <!-- prep time -->
                <!-- total time -->
                <div class="input-group input-group-lg ml-4 my-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Preparation Time</span>
                    </div>
                    <input type="text" class="form-control" name="preptime" aria-label="Title"
                        aria-describedby="inputGroup-sizing-sm" required>
                    <div class="input-group-prepend ml-4">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Total Time</span>
                    </div>
                    <input type="text" class="form-control" name="totaltime" aria-label="Title"
                        aria-describedby="inputGroup-sizing-sm" required>
                </div>
                <!-- servings -->
                <!-- yields -->
                <div class="input-group input-group-lg ml-4 my-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Serving</span>
                    </div>
                    <input type="text" class="form-control" name="servings" aria-label="Title"
                        aria-describedby="inputGroup-sizing-sm" required>
                    <div class="input-group-prepend ml-4">
                        <span class="input-group-text" id="inputGroup-sizing-lg">yields</span>
                    </div>
                    <input type="text" class="form-control" name="yield" aria-label="Title"
                        aria-describedby="inputGroup-sizing-sm" required>
                </div>

                <!-- image -->
                <div class="input-group input-group-lg ml-4 my-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Image</span>
                    </div>
                    <input type="file" class="form-control" name="image" aria-label="Title"
                        aria-describedby="inputGroup-sizing-sm" required>
                </div>

                <!-- sub category -->
                <div class="input-group input-group-lg ml-4 my-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Categories</span>
                    </div>
                    <select class="custom-select" id="category" name="sub_id" required>
                        <option disabled selected>Choose Category</option>
                        <?php 
                       $sql1 = "select * from subcategories";
                       $result1 = mysqli_query($conn,$sql1);
                       while($row1 = mysqli_fetch_assoc($result1)){?>
                        <option value="<?php echo $row1['sub_id'];?>"> <?php echo $row1['sub_name']?> </option>

                        <?php
                       }
                       ?>
                    </select>

                </div>
            </div>

            <div class="col-12 col-md-10 ml-4">
                <h1>Add ingredients</h1>
                <hr style="border-top: 1px dashed grey;">

                <div class="field_wrapper">
                    <div>
                        <input type="text" class="form-control w-75" name="field_name[]" value="" required >
                        <a href="javascript:void(0);" class="add_button" title="Add field">
                            <i class="fas fa-plus-circle"> Add More Ingredients</i>
                        </a>
                    </div>

                </div>
            </div>
            <div class="col-12 col-lg-10 my-4 ml-4 ">
                <h1 >Add Steps</h1>
                <hr style="border-top: 1px dashed grey;">
                <div class="field_wrapper1">
                    <div>
                        <input type="text" class="form-control w-75" name="steps[]" value="" required>
                        <a href="javascript:void(0);" class="add_button1" title="Add field">
                            <i class="fas fa-plus-circle"> Add More Steps</i>
                        </a>
                    </div>
                </div>        
                   <input type="submit" name="submit" class="btn btn-primary btn-lg my-4 ">
                       
            </div>
    </div>
</div>


<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->


<script type="text/javascript">
$(document).ready(function() {
    var maxField = 15; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML =
        '<div><input type="text" class="form-control w-75" name="field_name[]" value="" required><a href="javascript:void(0);" class="remove_button"><i class="fas fa-minus-circle"> Remove </i></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1

    //Once add button is clicked
    $(addButton).click(function() {
        //Check maximum number of input fields
        if (x < maxField) {
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });

    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e) {
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>

<!-- steps -->

<script type="text/javascript">
$(document).ready(function() {
    var maxField1 = 15; //Input fields increment limitation
    var addButton1 = $('.add_button1'); //Add button selector
    var wrapper1 = $('.field_wrapper1'); //Input field wrapper
    var fieldHTML1 =
        '<div><input type="text" class="form-control w-75" name="steps[]" value="" required><a href="javascript:void(0);" class="remove_button1"><i class="fas fa-minus-circle"> Remove </i></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1

    //Once add button is clicked
    $(addButton1).click(function() {
        //Check maximum number of input fields
        if (x < maxField1) {
            x++; //Increment field counter
            $(wrapper1).append(fieldHTML1); //Add field html
        }
    });

    //Once remove button is clicked
    $(wrapper1).on('click', '.remove_button1', function(e) {
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>

<?php
ob_end_flush();
    include('partials/footer.php');
?>
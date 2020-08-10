<?php

$name="";
$price=0;
$categoryID=1;
$topline="";
$description="";
$photo="noimage.php";
$NameErr=$PriceErr=$PhotoErr=$TopErr=$DesErr="";

if(!isset($_SESSION['admin']))
{
    header("Location:index.php");
    exit();
}

// define variables and set to empty values...
$valid=true;
$uploadOk = 1;

// Code below excutes when the form is submitted...
if ($_SERVER["REQUEST_METHOD"] =="POST") {
      
    // sanitise all variables
    $name = test_input(mysqli_real_escape_string($dbconnect,$_POST["name"]));
    $price = test_input($_POST["price"]);
    $categoryID = preg_replace('/[^0-9.]-/','',$_POST['categoryID']);
    $topline = test_input(mysqli_real_escape_string($dbconnect,$_POST["topline"]));
    $description = test_input(mysqli_real_escape_string($dbconnect,$_POST["description"]));
    
    // Error checking...
    If (empty($name)) {
    $NameErr = "Item name is required";
    $valid=false;    
    }
    
    $price=preg_replace('/[^0-9.]-/','',$_POST['price']);
    if ($price<=0) {
    $PriceErr = "Enter a number greater than 0";
    $valid=false;    
    }
    
    if (empty($topline)) {
    $TopErr = "Please provide a byline";
    $valid=false;    
    }
    
    if (empty($description)) {
    $DesErr = "Please provide a description";
    $valid=false;
    }
    
    //Check Image...
    if ($_FILES['fileToUpload']['name']!="") {
        
    // Shifts images from temporary directory to target directory
        
    // use unique-id so each upload file is unique    
    $target_file = uniqid()."_". basename($_FILES["fileToUpload"]['name']);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    
    // Allow .jpg, .png or gif only
    if($imageFileType !="jpg" && $imageFileType != "png" && $imageFileType != "gif" ){
    $PhotoErr= "Sorry, only JPG, JPEG, PNG & GIf files are allowed.";
    $uploadOk = 0;
    $valid=false;
    }   
    
    // Check file size
    if ($_FILES["fileToUpload"]["size"]> 500000) {
    $PhotoErr= "Sorry, your file is too large.";
    $uploadOk = 0;
    $valid=false;    
    }    
        
    }
    
    
    // If everything is OK - show 'success message and update database
    if($valid){
    // header('Location: admin.php?page=addstock_success');
            
    // put entry into database
    if ($_FILES['fileToUpload']['name']!="")
        
        $addstock_sql="INSERT INTO `L3_prac_stock` (name, categoryID, price, photo, topline, description) VALUES (
        '$name',
        '$categoryID',
        '$price',
        '".$target_file."',
        '$topline',
        '$description'
        )";
    
    else
         $addstock_sql="INSERT INTO `L3_prac_stock` (name, categoryID, price, photo, topline, description) VALUES (
        '$name',
        '$categoryID',
        '$price',
        '$photo',
        '$topline',
        '$description'
        )";
        
    // Code below runs query and inputs data into database 
    
    if ($uploadOk==1) {
        
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], IMAGE_DIRECTORY.'/'.$target_file);
    }    
    }

}

?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]."?page=addstock");?>" enctype="multipart/form-data">
    
    <h1>Add Item</h1>
    
    <p>
        <b>Item Name:</b>
        <input type="text" name="name" value="<?php echo $name;?>" />
        &nbsp;&nbsp; <span class="error"><?php echo $NameErr;?></span>
    </p>
    
    <p>
        <b>Price: $</b>
        <input type="text" name="price" value="<?php echo $price;?>" size="2" />
        &nbsp;&nbsp; <span class="error"><?php echo $PriceErr;?></span>
    </p>

    
    <p>
        <b>Category</b>    
        <select name="categoryID">
            
        <?php
            
        $cat_sql="SELECT * FROM `L3_prac_category`";
        $cat_query=mysqli_query($dbconnect, $cat_sql);
            
        do {
            echo '<option value="'.$cat_rs['categoryID'].'"';
            echo ">".$cat_rs['catName']."<?option>";
            
        }    
        
        while ($cat_rs=mysqli_fetch_assoc($cat_query)) 
            
        ?>    
        
        </select>    
    </p>

    <p>
        <b>Photo</b>    
        <input type="file" name="fileToUpload" id="fileToUpload" value=""/>&nbsp;&nbsp; <span class="error"><?php echo $PhotoErr;?></span>    
    </p>

    <p>
        <b>Topline</b>    
        <input type="text" name="topline" value="<?php echo $topline; ?>" />
        &nbsp;&nbsp; <span class="error"><?php echo $TopErr;?></span>
    </p>
    
    <p>
        <b>Description</b>&nbsp;&nbsp; <span class="error"><?php echo $DesErr;?></span>
    </p>
    <p>
        <textarea type="text" name="description" cols="60" rows="7"><?php echo $description; ?></textarea>   
    </p>
    
    <input type="submit" name="submit" value="Add Item" />
    
    

</form>
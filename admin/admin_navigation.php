<div class="navigation">
		
        <?php
        $cat_sql="SELECT * FROM L3_prac_category"; // sets up query
        $cat_query=mysqli_query($dbconnect,$cat_sql); // runs query
        $cat_rs=mysqli_fetch_assoc($cat_query); // organises results

        // Loop to create dynamic category links. Column heading from table is in square brackets (eg: 'name')

        do{?>
        
        <a class="nav" href="index.php?page=category&categoryID=<?php echo
        $cat_rs['categoryID'];
           
                             
        ?>">
            
        <?php echo $cat_rs['catName'];?></a> | 
    
        <?php

        }

        while($cat_rs=mysqli_fetch_assoc($cat_query))

        ?>
    
    
					
		<a class="nav" href="admin.php">Admin</a>
		
	</div>	<!-- end navigation -->
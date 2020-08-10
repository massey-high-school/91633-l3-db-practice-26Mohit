<?php

   $stock_sql="SELECT*FROM `L3_prac_stock` ORDER BY `L3_prac_stock`.`name` ASC ";
   $stock_query=mysqli_query($dbconnect, $stock_sql);
   $stock_rs=mysqli_fetch_assoc($stock_query);

?>

  
   <h3>
       Edit / Delete and Item
   </h3>

   <table class="results">
       
   <?php do {?>
       <tr class="results">
           <td class="results"><a href="../index.php?page=item&stockID=<?php echo $stock_rs['stockID']; ?>"><?php echo $stock_rs['name']; ?></a></td>
           <td class="results"><b>$ <?php echo $stock_rs['price']; ?></b></td>
           <td class="results"><a href="admin.php?page=editstock&stockID=<?php echo $stock_rs['stockID']; ?>">Edit</a></td>
           <td class="results"><a href="admin.php?page=deleteitem_confirm&stockID=<?php echo $stock_rs['stockID']; ?>">Delete</a></td>
       </tr>
    <?php
        }
       
        while ($stock_rs=mysqli_fetch_assoc($stock_query))
    ?>        
    
</table>
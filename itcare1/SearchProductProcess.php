<?php



include "connection.php";

$pageno = 0;
$product = $_POST["p"];
$page = $_POST["pg"];
// echo($product);

if (0 != $page) {
    $pageno = $page;
} else {
    $pageno = 1;
}

$q = "SELECT * FROM `stock` INNER JOIN `product` ON `stock`.product_id = `product`.id WHERE `product_name` LIKE '%$product%'";
$rs = Database::search($q);
$num = $rs->num_rows;
//  echo($num);

$results_per_page = 4;
$num_of_pages = ceil($num / $results_per_page);
$page_results = ($pageno - 1) * $results_per_page;

$q2 = $q . " LIMIT $results_per_page OFFSET $page_results";
$rs2 = Database::search($q2);
$num2 = $rs2->num_rows;
//  echo($num2);

if ($num2 == 0) {
    // Not Available Stock
    ?>
    <div class="d-flex flex-column align-items-center mt-5 mb-5">
        <h5 > Search No Items</h5>
        <p >We're Sorry, We Cannot Find Any Matches For Your Search Team...</p>
    </div>
    <?php
    // echo ("No Search Result Hear..!");
} else {
    for ($i = 0; $i < $num2; $i++) {
        $d = $rs2->fetch_assoc();
  
  ?>
  <!-- Card -->
        <div class="col-3 mt-5 d-flex justify-content-center">
           <div class="card" style="width: 250px;">
              <img src="<?php echo $d["img_path"] ?>" class="card-img-top">
              <div class="card-body">
                 <h5 class="card-title"><?php echo $d["product_name"] ?></h5>
                 <p class="card-text"><?php echo $d["discription"] ?></p>
                 <p class="card-text">Rs: <?php echo $d["price"] ?></p>
                 <div class="d-flex justify-content-center">
                    <button class="btn btn-outline-primary col-6">Add to Cart</button>
                    <button class="btn btn-outline-warning col-6 ms-2">Buy Now</button>
                 </div>
              </div>
           </div>
        </div>

     <?php
     }
     ?>
     <!-- pagniation -->
   <div class="d-flex justify-content-center mt-5">
      <div>
         <nav aria-label="Page navigation example">
            <ul class="pagination">
               <li class="page-item"><a class="page-link" <?php 
               if ($pageno <= 1) {
                 echo("#");
               } else {
                 ?>onclick="loadProduct(<?php echo($pageno - 1) ?>);"<?php
               }
               ?>>Previous</a></li>

               <?php
               for ($x=1; $x <= $num_of_pages; $x++) { 
                  if ($x == $pageno) {
                     ?>
                     <li class="page-item active"><a class="page-link" onclick="loadProduct(<?php echo $x ?>);"><?php echo $x ?></a></li>
                     <?php
                  } else {
                     ?>
                     <li class="page-item "><a class="page-link" onclick="loadProduct(<?php echo $x ?>);"><?php echo $x ?></a></li>
                     <?php
                  }
                  
               }
               
               ?>
               <li class="page-item"><a class="page-link" <?php 
               if ($pageno >= $num_of_pages) {
                 echo("#");
               } else {
                 ?>onclick="loadProduct(<?php echo($pageno + 1) ?>);"<?php
               }
               ?> >Next</a></li>
            </ul>
         </nav>

      </div>
   </div>

     <?php
}
     
     
     ?>


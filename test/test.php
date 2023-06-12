<?php
include '../app/dbconn.php';
if (isset($_GET['hide'])) {
    # code...
    $uid = $_GET['hide'];
    $sql = "update test SET active='active' where id = '$uid'";
    $result = mysqli_query($con, $sql);
}
?> 

 <table class="table my-4">
 <thead>
     <tr style="border-top: 1px solid;">
         <th scope="col">id</th>
         <th scope="col">name</th>
         <th scope="col">status</th>
         <th scope="col">operations</th>
     </tr>
 </thead>
 <tbody>
     <?php
     $sql = 'select * from test';
     $result = mysqli_query($con, $sql);
     
     if ($result) {
         while ($row = mysqli_fetch_assoc($result)) {
             $id = $row['id'];
             $name = $row['name'];
             $status = $row['active'];

             echo $status;
             if($status == ""){
             echo '
             <tr>
               <th scope="row">' . $id . '</th>
               <td>' . $name . '</td>
               <td>' . $status . '</td>
               
               <td>
                 <div>

                   <a href="test.php?hide=' . $id . '" 
                      class="btn btn-danger">
                    hide
                   </a>
                   
                </div>

               </td>
             </tr>
             ';
             }
         }
     }
?>
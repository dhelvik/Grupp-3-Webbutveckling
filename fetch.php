<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "root", "webbutveckling");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = " SELECT Karnevalist.firstName, Karnevalist.lastName, Karnevalist.mail, KarnevalistSection.sectionName
  FROM KarnevalistSection
  INNER JOIN Karnevalist ON KarnevalistSection.mail=Karnevalist.mail 
  WHERE Karnevalist.firstName LIKE '%".$search."%'
  OR Karnevalist.lastName LIKE '%".$search."%' 
  OR Karnevalist.mail LIKE '%".$search."%' 
 
 ";
}
else
{
 $query = "SELECT Karnevalist.firstName, Karnevalist.lastName, Karnevalist.mail, KarnevalistSection.sectionName
FROM KarnevalistSection
INNER JOIN Karnevalist ON KarnevalistSection.mail=Karnevalist.mail
ORDER BY mail


 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Mail</th>
     <th>firstName</th>
     <th>lastName</th>
     <th>sectionName</th>
     
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
                    <tr>
                     <td>'.$row["mail"].'</td>  
                     <td class="firstName" data-mail1="'.$row["mail"].'" contenteditable>'.$row["firstName"].'</td>  
                     <td class="lastName" data-mail2="'.$row["mail"].'" contenteditable>'.$row["lastName"].'</td>
                     <td class="sectionName" data-section1="'.$row["sectionName"].'"data-mail4="'.$row["mail"].'" contenteditable>'.$row["sectionName"].'</td>  
  
                     <td><button type="button" name="delete_btn" data-mail3="'.$row["mail"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  




   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>
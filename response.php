<?php 

    include 'application/connection.php';
    $con = new Connection();
    $con->openConnection();
    $totalRecords = mysqli_num_rows($queryTot);
    
    $queryRecords = mysqli_query($con, $sqlRec) or die("error to fetch employees data");
 
    //iterate on results row and create new index array of data
    while( $row = mysqli_fetch_assoc($queryRecords) ) { 
        $data[] = $row;
        //echo "<pre>";print_R($data);die;
    }   
 
    $json_data = array(
            "current"            => intval( $params['current'] ), 
            "rowCount"            => 10,            
            "total"    => intval( $totalRecords ),
            "rows"            => $data   // total data array
            );
 
    echo json_encode($json_data);  // send data as json format
    
    ?>
<?php
require('connect.php');
include('includes/config.php');
if(!empty($_GET['CardID'])){
    $Card = $_GET['CardID'];
    $sql = "SELECT * FROM admin WHERE CardID=?";
    $result = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($result, $sql)) {
        echo "SQL_Error_Select_card";
    }
    else{
        // $sql="SELECT * from admin";
        // $query=$dbh->prepare($sql);
        // $query->execute();
        // $results=$query->fetchAll(PDO::FETCH_OBJ);
        // if($query->rowcount()>0)
        // {
        //     foreach($results as $result)
        //     {
        //         if($result->current==1)
        //         {
        //             $a=$result->sid;
        //             $curr=0;
        //             $sql1="update admin set current=:curr where sid=$a";
        //             $query1 = $dbh->prepare($sql1);
        //             $query1->bindParam(':curr',$curr,PDO::PARAM_STR);
        //             $query1->execute();
        //         }
        //     }
        // }
        mysqli_stmt_bind_param($result, "s", $Card);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
        if ($row = mysqli_fetch_assoc($resultl)){ 
            if (!empty($row['UserName'])){
                $curr=1;
                $sql="update admin set current=:curr where CardID=$Card";
                $query = $dbh->prepare($sql);
                $query->bindParam(':curr',$curr,PDO::PARAM_STR);
                $query->execute();
            }
        }
    }
}
?>
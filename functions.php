<?php 

//Validation for File type. (done) ,date(Done) ,

// if(isset($_POST["Import"])){
//     $allowed = array('csv', 'ms-excel');
//     $filename = $_FILES["file"]["type"];
//     $ext = pathinfo($filename, PATHINFO_EXTENSION);
//     if (!in_array($ext, $allowed)) {
//        session_start();
//        $_SESSION['error'] = "Please upload a .csv file";
//        header("Location: index.php");
//      }else{
//       //Validation for Date
//         if(isset($_POST["Import"])){
//           if($_POST["from_date"] < $_POST["to_date"]){
//             echo "Passed";
//           }else{
//             session_start();
//              $_SESSION['error'] = "From Date must be greater tha To Date";
//              header("Location: index.php");
//           }
//           // echo $_POST["share_name"];
//         }
//     }
//   }

  


//Getting csv file data

if(isset($_POST["Import"])){
  session_start();
  $filename = $_FILES["file"]["tmp_name"];
  if($_FILES["file"]["size"] > 0){
    $file = fopen($filename, "r");
    $file_data= file($filename);
    foreach($file_data as $k){
        $csv[] = explode(',',$k);

        
    }
     $n = count($csv);
     $flag = 0;
     for($i =1;$i<$n;$i++){
        if(strtolower(trim($_POST["share_name"]))  == strtolower(trim($csv[$i][2]))){
          $flag++;
        }
     }
     if($flag >= 2){
        //Write Profit maximatzation code here
      $arr = [];
        for($i=0;$i<$n;$i++){
          if(strtolower(trim($csv[$i][2])) == strtolower(trim($_POST['share_name']))){
              $arr[$csv[$i][1]] = $csv[$i][3]; 
          }
        }

        $profit = [];
        $i = 0;
        $prev = 2147483647;
        $prev_key = 0;
        $final_arr = [];
        foreach ($arr as $key => $value){
          if($value > $prev){
              $profit[$i] = ($value - $prev);
              $i++;
              $final_arr[$prev_key] = $key;
          }
          $prev_key = $key;
          $prev = $value;
        }

        // echo "<pre>";
        // print_r($final_arr);
        // die();
        $i =0;
        $totalProfit =0;
        $message = '';
         foreach($final_arr as $key => $val){
          $message .= "Buy on ".$final_arr[$key]. "and Sell on ".$final_arr[$value]. " Would give you a Profit of(on this transaction) ". $profit[$i] .".<br>";
          $totalProfit += $profit[$i];
          $i++;
         }

         $message .= "The Total Profit would be " .$totalProfit. ".";
         $_SESSION['result'] = $message;
          header("Location: index.php");

     }else if($flag == 1){
        $_SESSION['error'] = "Share name count mst be greater than 1";
        header("Location: index.php");
     }else{
        $_SESSION['error'] = "Share name you want to track doesnot exists in the file uploaded";
        header("Location: index.php");
     }
  }
}

?>
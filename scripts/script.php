<?php 

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

define("STUDENTS_NUMBER", 1);
define("COOKIE_NAME", "RATE");



$counter = 0;

// var_dump($_SERVER);
// echo exec('printenv');



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
  if (isset($_POST['submit'])) {
      $rate = filter_input(INPUT_POST, 'rate', FILTER_SANITIZE_NUMBER_INT);
      if($rate >= 0 && $rate <= 10) {
        if(isset($_COOKIE[COOKIE_NAME])) {
          $sn = $_SERVER['SERVER_NAME'];
          // header("Location: http://$sn/rating/scripts/already.php");
          echo "<script>alert('Already rated ^_^\'')</script>";
          // exit();
        } elseif(add_rate($rate)) {
          increment_counter();
          $sn = $_SERVER['SERVER_NAME'];
          header("Location: http://$sn/rating/scripts/done.php");
          setcookie(COOKIE_NAME, $rate);
          // var_dump($_SERVER);
        }
        if (STUDENTS_NUMBER == get_counter()) {
          echo shell_exec("bash dd.sh");
          // echo shell_exec('/usr/bin/python /opt/lampp/htdocs/learning/rating/run.py');
        }
      } else {
        echo "<script>alert('Invalid rate</script>";
      }
  }
}


function add_rate($rate) : bool {
  $filename = "./files/.rates";

  try {
    $file = fopen($filename, 'a+');
    $data = "$rate\n";
    fwrite($file, $data);
    return true;
  fclose($file);
  } catch (\Throwable $th) {
    return false;
  }

  
}

function get_counter() {
  $filename = "./files/.counter";
  $c = 0;
  try {
    $handle = fopen($filename, 'r');
    $c = fread($handle, filesize($filename));
  } catch (\Throwable $th) {
    
  }
  fclose($handle);
  return $c == false ? 0 : $c;
}



function increment_counter() {
  $filename = "./files/.counter";
  // echo "get counter = " . get_counter(). "<br>";
  $c = ((int) get_counter() + 1);
  $file = fopen($filename, 'w');
  // echo "c = $c<br>";
  fwrite($file, $c);
  fclose($file);
}

?>

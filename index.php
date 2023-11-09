<?php  
session_start();

if(isset($_SESSION['fomular'])){
    $fomular=$_SESSION['fomular'];
}
else{
    $fomular=''; 
}


if(isset($_GET['number'])){
    $fomular=$fomular.$_GET['number'];
    $_SESSION['fomular']=$fomular;
    header('Location:index.php');
     

}

if(isset($_GET['operation'])){
    $fomular=$fomular.$_GET['operation'];
    $_SESSION['fomular']=$fomular;
    header('Location:index.php');
     

}

if(isset($_GET['equal'])){
    $result = eval('return (' . $fomular . ');');

    if ($result !== false) {
        $_SESSION['fomular']= $result; 
    } else {
        $_SESSION['fomular']='invalid';  
    }
    header('Location:index.php');

}



if(isset($_GET['reset'])){
    session_destroy();
    $fomular="";
   header('Location:index.php');

}

$message[]=$fomular;


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calculator</title>
    <link rel="stylesheet" href="style.css">

     
</head>

<body>
    

    <section class="outbox">

        <div class="cal">

            <div class="display">
                <?php 
                if(isset($message)){
                    foreach($message as $message){
                        echo '<h1>'.$message.'</h1>';
                    }
                    // echo $message;
                }
                ?>

            </div>

            <div class="keyboard">
                 <!-- ///////////////////////////////////// -->
             
                <a href="index.php?on">on</a>
           

            
                <a href="index.php?reset">reset</a>
             

            
                <a href="index.php?cut">C</a>
             
 
                <a href="index.php?operation=*">*</a>
             

           <!-- ///////////////////////////////////// --> 
          <!-- ///////////////////////////////////// -->
             
                <a href="index.php?number=1"  >1</a>
             

             
                <a href="index.php?number=2">2</a>
             

             
                <a href="index.php?number=3">3</a>
            

             
                <a href="index.php?operation=/">/</a>
             

           <!-- ///////////////////////////////////// --> 
           
            <!-- ///////////////////////////////////// -->
             
                <a href="index.php?number=4">4</a>
             

             
                <a href="index.php?number=5">5</a>
             

             
                <a href="index.php?number=6">6</a>
            

             
                <a href="index.php?operation=%2B">+</a>
            

           <!-- ///////////////////////////////////// --> 
            <!-- ///////////////////////////////////// -->
             
                <a href="index.php?number=7">7</a>
           

            
                <a href="index.php?number=8">8</a>
             

            
                <a href="index.php?number=9">9</a>
             

             
                <a href="index.php?operation=-">-</a>
            

           <!-- ///////////////////////////////////// --> 
            <!-- ///////////////////////////////////// -->
            
                <a href="index.php?operation=(">|</a>
             

             
                <a href="index.php?number=0">0</a>
            

             
                <a href="index.php?operation=)">|</a>
             

            
                <a href="index.php?equal">=</a>
             

           <!-- ///////////////////////////////////// --> 

            </div>

        </div>



    </section>

</body>

</html>
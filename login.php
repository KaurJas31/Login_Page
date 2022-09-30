<?php
$email=$_POST['email'];//post method  to get  value in php here value of email $ email variable to stre it 
$password=$_POST['password'];
//echo $email;//to check if it is getting value or not 

//Database connection
//con  variable to store connection object new mysqli method will return connection object
// frist host scnd user name third password and database name

//Database connection here
$con=new mysqli("localhost","root","","signup");
if($con->connect_error)
{
    die("Failed to connect:".$con->connect_error);

}
else{
    $stmt=$con->prepare("select * from registration where email=?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt_result=$stmt->get_result();
    if($stmt_result->num_rows>0)
{
        $data=$stmt_result->fetch_assoc();
        // echo $data['password'];
        // echo $password;
        
        if($data['password']==$password)
        {
           // echo"enter";
            echo"<h2>Login successfully</h2>";

        }else{
           // echo"here";
            echo"<h2>Invalid email or password</h2>";
        }

}
else{
    echo"<h2>Invalid email or password</h2>";
}}
?>

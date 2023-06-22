<?php
$db=mysqli_connect("localhost","root","","library");
if(isset($_POST['save']))
{
    $ename=$_POST['ename'];
    $pname=$_POST['pname'];
    $rpname=$_POST['rpname'];
    if($pname===$rpname)
    {
        $c=0;
        $q=mysqli_query($db,'select* from login');
        while($row=mysqli_fetch_assoc($q))
        {
            if($row['Email']===$ename)
            {
                $c++;
                break;
            }
        }
        echo'<head><style>
        img
        {
            width:200px;
            animation: shake 0.5s linear infinite;
        }
        @keyframes shake
        {
            0%{
                transform:rotate(10deg);
            }
            50%
            {
                transform:rotate(-10deg);
            }
        }
        </style></head>';
        if($c==0)
        {
            $q1="insert into login(Email,Password) VALUE('$ename','pname')";
            if(mysqli_query($db, $q1))
            {
            echo "<div align=center><h1>Sucessfully Registered</h1></div>";
            echo '<div align=center><img src="a5.jpg" height="200px" width="200px"></a></div>';
            }
        else
            {
                echo "<div align=center><h1>Database not connected check it once</h1></div>";

            }
        }
        else
        {
            echo "<div align=center><h1>User Already Exists</h1></div>";
            echo '<div align=center><img src="a7.png" height="200px" width="200px"></a></div>';


        }
}
else
{
    echo"<h1><marquee  behavior=alternate scrollamount=12>Password and Re entered password is not same try again</marquee></h1>";
}
}
?>
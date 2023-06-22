<?php
$db=mysqli_connect("localhost","root","","library");
if(isset($_POST['save']))
{
    $ename=$_POST['ename'];
    $pname=$_POST['pname'];
    $c=0;
    $q=mysqli_query($db,'select* from login');
    while($row=mysqli_fetch_assoc($q))
    {
        if($row['Email']===$ename && $row['Password']===$pname)
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

    if($c==1)
    {
        echo"<h1>"."<div align=center><font color='green'>ADMINS HOME PAGE</font></div>"."</h1>";
        echo '<a href="insert.html"><img src="a2.png" height="200px" width="200px" align="LEFT"></a>';
        echo '<a href="delete.html"><div align=center><img src="a3.png" height="200px" width="200px"></a>';
        echo '<a href="newadmin.html"><img src="a1.png"height="200px" width="200px" align="RIGHT"></a>';
    }   
    else
    {
        echo"<h1>"."<i><font color='green'>login email or password are incorrect click on login to try again</font></i>"."</h1>";

        echo'<div align=center><a href="login.html"><img src="a4.png" height="200px" width="200px"></a>';
    }

}
?>
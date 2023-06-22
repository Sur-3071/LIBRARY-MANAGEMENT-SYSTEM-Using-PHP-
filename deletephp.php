<?php
$db=mysqli_connect("localhost","root","","library");
if(isset($_POST['save']))
{
    $bid=$_POST['bid'];
    if(!empty($bid))
    {
        $q=mysqli_query($db,'select* from books');
        $c=0;
        while($row=mysqli_fetch_assoc($q))
        {
            if($row['bookID']===$bid)
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
        $q1="delete from books where bookID=$bid";
        if(mysqli_query($db, $q1))
        {
            echo "<div align=center><h1>Book Is successfully Deleted</h1></div>";
            echo '<div align=center><img src="a5.jpg" height="200px" width="200px"></a></div>';
        }
        else
        {
            echo "<div align=center><h1>Database not connected check it once</h1></div>";

        }
    }
    else
    {
        echo "<div align=center><h1>BOOK ID is Not present in the library</h1></div>";
        echo '<div align=center><img src="a6.jpeg" height="200px" width="200px"></a></div>';
    }
}
else
{
    echo"<h1><marquee  behavior=alternate scrollamount=12>Enter book id is mandatory to delete the book</marquee></h1>";
}
}
?>
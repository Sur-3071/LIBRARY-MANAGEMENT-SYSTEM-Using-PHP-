<html>
<style>
        table,tr,td,th{
            border:1px solid blue;  
        }
        </style>
<body>
<table>
<tr>
        <th>BOOD_ID</th>
        <th>BOOK_NAME</th>
        <th>AUTHOR</th>
        <th>LANGUAGE_CODE</th>
        <th>PAGE_NUMBERS</th>
        <th>PUBLISHERS</th>
    </tr>
 
        <tbody>
        <?php
            $db=mysqli_connect("localhost","root","","library");
            if(isset($_POST['save']))
            {
             $aname = $_POST['aname'];
             if(empty($aname))
             {
                echo"<h1><marquee  behavior=alternate scrollamount=12><i>Give any one of the author name to search</i></marquee></h1>";
             }
             else{
             $query= mysqli_query($db,"SELECT* FROM books");
             $c=0;
             while($row=mysqli_fetch_assoc($query))
             {
                if($row['authors']===$aname)
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
                echo '<div align=center><img src="a8.png" height="200px" width="200px"></a></div>';
                echo '<pre>  </pre>';
                echo '<pre>  </pre>';
                while($row=mysqli_fetch_assoc($query))
                {
                    if($row['authors']===$aname)
                    {
                    echo "<tr>";
                    echo"<td>".$row['bookID']."</td>";
                    echo"<td>".$row['title']."</td>";
                    echo"<td>".$row['authors']."</td>";
                    echo"<td>".$row['languagecode']."</td>";
                    echo"<td>".$row['pagenumbers']."</td>";
                    echo"<td>".$row['publisher']."</td>";
                    echo "</tr>";
                    }
                }
            }
            else
            {
                echo '<div align=center><img src="a9.jpg" height="200px" width="200px"></a></div>';
                echo "<marquee Scrollamount=12><h1><i>"."Required author books are not available in library"."</i></h1></marquee>";

                
            }
        }
    }
        ?>
        </tbody>
        </table>
        </body>
        </html
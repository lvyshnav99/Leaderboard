<html>
    <head>
        <title>
            Leaderboard
        </title>
        <style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
  text-align: left;
}
table {
  width: 100%;    
  background-color:#f1f1c1;
}
</style>
    </head>


    <body style="background-color:LightGray">
        <h1 style="background-color:#3cb371;color:white ;font-size:100px;">Leaderboard</h1>
        <?php
        $servername="localhost";
        $username="root";
        $password="your_password";
        $dbname="maninani";
        $conn=new mysqli($servername,$username,$password,$dbname);
        if($conn->connect_error)
        {
            die("Connection Failed:".$conn->connect_error);
        }
        if(empty($_POST["name1"]))
        $_name5="";
        else
        $_name5=$_POST["name1"];
        if(empty($_POST["name2"]))
        $_name6="";
        else
        $_name6=$_POST["name2"];
        if(empty($_POST["name3"]))
        $_name7="";
        else
        {
            $_name7=$_POST["name3"];
            
            $_sql1="UPDATE login set credits=credits-'" . $_POST['name3'] . "' where name='" . $_POST['name1'] . "'";
            $_sql2="UPDATE login set credits=credits+'" . $_POST['name3'] . "' where name='" . $_POST['name2'] . "'";            
            $_result1=$conn->query($_sql1);
            $_result2=$conn->query($_sql2);
        }
        $sql="SELECT * FROM login order by credits desc";
       $result=$conn->query($sql);
    
        if ($result->num_rows > 0) {
            echo "<table><tr><th>Name</th><th>credits</th></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["name"]. "</td><td>" . $row["credits"]. "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        echo "<br>";
        ?>
        <h4 style="color:Red;font-size:40px;">Credit Transfer</h4>
        <form method="post" action="Leaderboard.php">
            From :Name :<br><input type="text" name="name1"><br>
            To   :Name :<br><input type="text" name="name2"><br>
            Credits    :<br><input  name="name3"><br><br>
            <input type="submit">
    </form>
    
        
    </body>
</html>

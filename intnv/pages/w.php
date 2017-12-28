 <html>
    <body>

    <?php
    mysql_connect( "localhost" , "root" , "") or die(mysql_error());
    mysql_select_db("rtls1") or die(mysql_error());
    ?>

    <form id="home_id" method ="POST" enctype ="multipart/form-data">
    <script>
    function submitForm(action)
    {
    document.getElementById('home_id').action=action;
    document.getElementById('home_id').submit();
    }
    </script>

    <p align = right> Username: <input type ="text" name ="user" placeholder="Enter username">
    <p align = right> Password: <input type ="password" name ="pass" placeholder="Enter password">
    <input type="submit" value="login"  name="submit" 

     <?php
    mysql_connect( "localhost" , "root" , "") or die(mysql_error());
    mysql_select_db("rtls1") or die(mysql_error());
    ?>

    <?php 

    $user=$_POST['user'];
    $pass=$_POST['pass'];
    $user=stripslashes('$user');
    $pass=stripslashes('$pass');
    $user=mysql_real_escape_string('$user');
    $pass=mysql_real_escape_string('$pass');

    $query="SELECT username,passwd FROM registration WHERE username='$user' AND passwd='$pass'";
    $result=mysql_query($query);
    $count=mysql_num_rows($result);
        $row=mysql_fetch_array($result);
    if (isset($_POST['submit']))

    if ($count==1){
    session_start();
    $session("user");
    $session("pass") ;


            if ($row['usertype']==0){
            header("location:index.php");
            echo ("you logged in as admin");
    }
            elseif ($row['usertype']==1) {
            header("location:login.php");
            echo ("you logged in as cashier");
    }


    else {
    echo "invalid password and username";


    }
    }

    ?>
    </body>
    </html>
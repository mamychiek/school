<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@900&display=swap" rel="stylesheet">
    
    <style> body { 
        background-color: whitesmoke;
        font-family: 'Noto Sans Arabic', sans-serif;
    }
    #mother {
        width:100%;
        font-size:20px;

    }
    main {
        float:left;
        border: 1px solid gray;
        padding: 5px;
    }
    input {
        padding: 4px;
        border:1px solid black;
        text-align: center;
        font-size: 17px;
        font-family: 'Noto Sans Arabic', sans-serif;
    }
    aside{
        text-align: center;
        width: 300px;
        float: right;
        border: 1px;
        font-size: 20px;
        background-color: silver;
        color: white;
    }
    #tbl{
        width: 890px;
        font-size: 20px;
    }

    #tbl th {
    background-color: silver;
    color: black;
    font-size: 20px;
    padding: 10px;
    }

    aside button {
        width: 190px;
        padding: 8px;
        margin-top: 7px;
        font-size: 17px;
        font-family: 'Noto Sans Arabic', sans-serif;
        font-weight: bold;
    }
    </style>
</head>
<body dir ='rtl' >
    <?php
    $host='localhost';
    $user='root';
    $pass='';
    $db='archiv';
    $con=mysqli_connect($host,$user,$pass,$db);
    $res= mysqli_query($con, "select * from pdf");
    # BUTTON 
    $name='';
    $discription='';
    $link='';
    if(isset($_POST['name'])){
        $name= $_POST['name'];
    }
    if(isset($_POST['discription'])){
        $discription= $_POST['discription'];
    }
    if(isset($_POST['link'])){
        $link= $_POST['link'];
    }
    $sqls='';
    if(isset($_POST['add'])){
     
        $sqls="insert into pdf value('$name','$discription','$link')";  
        mysqli_query($con,$sqls
        
    );
    header("location: home.php");
    }    
    ?>
    <div id="mother">
        <form method="POST"> 
            <aside>
                <div id ='div'>
                    <img src='https://icones.pro/wp-content/uploads/2021/03/icone-pdf-symbole-png-rouge.png' alt= 'لوجو' width="100px"
                    >
            <h3> اضافة مستند
            </h3>
            <label>اسم مستند</label><br>
            <input type="text 
            " name="name" id='name'><br> 
            <label>تفاصيل</label><br>
            <input type="text 
            " name="discription" id='discription'><br> 
            <label>الرابط</label><br>
            <input type="text 
            " name="link" id='link'><br><br>
            <button name="add"> اضافة المستند</button><br><br> 
                </div>
            </aside>
            <main>
                <table id="tbl">
                <tr>
                    <th> اسم المستند</th>
                    <th> التفاصيل</th>
                    <th> الرابط</th>
                </tr>
                <?php
                while($row = mysqli_fetch_array($res)){
                    echo "<tr>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td>".$row['discription']."</td>";
                    echo "<td>".$row['link']."</td>";
                    echo "<tr>";
                }
                ?>
                </table>
            </main>
        </form>
     </div>
</body>
</html>
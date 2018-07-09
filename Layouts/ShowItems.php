<!doctype html>
<html lang="en">
<head>
    <title>Test</title>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name='description' content='test' />
    <meta name='keywords' content='test, website' />
    <meta name='author' content='test' />

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Rubik' rel='stylesheet'>
    <link href='css/bootstrap.min.css' rel='stylesheet' type='text/css'>
    <link href='css/style.css' rel='stylesheet' type='text/css'>

    <link href="slick/slick.css" rel="stylesheet">
    <link href="slick/slick-theme.css" rel="stylesheet">

    <style>
        .itemsTable{
            margin-top:150px;

        }
        table ,th ,td{
            border:1px solid black;
            border-collapse: collapse;
            padding: 10px;
            margin-top:20px;

        }
    </style>
</head>
<body>

<table>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Text</th>
        <th>Category</th>
        <th>Image</th>
        <th>Option</th>
    </tr>
    <?php

    require '../ObjectFactoryService.php';

    $config = ObjectFactoryService::getConfig();
    $db= ObjectFactoryService::getDb($config);

    $sql = "SELECT * FROM item ";
    $result=$db->query($sql);
    //afisam tabelul
    foreach ($result as $row){
        echo "<tr>";
        echo "<td>".$row['id'] . "</td>";
        echo "<td>".$row['title']."</td>";
        echo "<td>".$row['text']."</td>";
        echo "<td>".$row['category']."</td>";
        echo "<td>". "<img src='./images/{$row['image']}' alt='{$row['image']}'>" . "</td>";
        $id="{$row['id']}";
        $title = "{$row['title' ]}";
        $text = "{$row['text'] }";
        $category ="{$row['category']}" ; // aici am trimis introdus variabilele in toggleEdit iar apoi am setat campurile ca precompletate
        echo "<td><button type='button' name='edit' id='edit' class='edit' value='{$row['id']}' onclick='toggleEdit(`$id`,`$title`,`$text`,`$category`)'>Edit</button> <br><br><br> <button type='button' name='delete' id='delete' class='delete' value='{$row['id']}'>Delete</button> </td>";
        echo "</tr>";
    }

    ?>


</table>
<script>


    function toggleEdit(id,title,text,category){
        var showCreate = document.getElementById("formEdit");
        if(showCreate.style.visibility === 'hidden') {
            $('#Save').val(id);
            $('#titleEdit').val(title);
            $('#textEdit').val(text);
            $('#categoryEdit').val(category);
            showCreate.style.visibility = 'visible';
        }else{
            showCreate.style.visibility = 'hidden';
        }
    }

</script>

</body>

</html>
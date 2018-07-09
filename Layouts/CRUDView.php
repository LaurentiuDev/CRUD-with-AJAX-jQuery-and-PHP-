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
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>\

    <style>
        .container #formCreate{
            visibility: hidden;
            float:left;
        }
        .container #formEdit label,#imageEdit{
            color: white;
        }

        .container #formEdit{
            visibility: hidden;
            position: fixed;
            margin-left: 50%;
            z-index: 1;
            background:rgba(0,0,0,0.6);
            padding: 15px;

        }
        .container .close {
            color:#FFFFFF;
            z-index: 2;
            opacity: 1;
        }

    </style>
</head>
<body>
<div class="container">
    <!-- Create form -->
    <form class="form-inline" id="formCreate">
        <div class = "form-group">
            <label for="title">Title :</label>
            <input type="text" name="title" id="title">
        </div>
        <br>
        <div class = "form-group">
            <label for="textForm">Text :</label>
            <input type="text" name="textForm" id="textForm">
        </div>
        <br>
        <div class = "form-group">
            <label for="category">Category :</label>
            <input type="text" name="category" id="category">
        </div>
        <br>
        <div class = "form-group">
            <input type="file" name="image" id="image">
        </div>
        <br><br>
        <div class = "form-group">
            <button type = "button" name="addnew" id="addnew" class = "btn btn-primary">Add</button>
        </div>
    </form>
    <!-- Edit form -->

    <form class="form-inline" id="formEdit" >
        <span class="close">X</span>
        <div class = "form-group">
            <label for="title">Title :</label>
            <input type="text" name="titleEdit" id="titleEdit">
        </div>
        <br>
        <div class = "form-group">
            <label for="textForm">Text :</label>
            <input type="text" name="textEdit" id="textEdit">
        </div>
        <br>
        <div class = "form-group">
            <label for="category">Category :</label>
            <input type="text" name="categoryEdit" id="categoryEdit">
        </div>
        <br>
        <div class = "form-group">
            <input type="file" name="imageEdit" id="imageEdit" >
        </div>
        <br><br>
        <div class = "form-group">
            <button type = "button" name="Save" id="Save" class = "btn btn-primary">Save</button>
        </div>
    </form>

    <br>
    <button type="button" id="create">Create</button>

    <div class="itemsTable"></div>
</div>
</body>
<script type = "text/javascript">


$(document).ready(function () {
    $('.close').click(function () {
        $('#formEdit').css("visibility","hidden");
    });

    var toggleForCreateButton =document.getElementById("create");
    if(toggleForCreateButton){
        toggleForCreateButton.addEventListener('click',toggle);
    }

    function toggle(){
        var showCreate = document.getElementById("formCreate");
        if(showCreate.style.visibility === 'hidden') {
            showCreate.style.visibility = 'visible';
        }else{
            showCreate.style.visibility = 'hidden';
        }
    }

    // Edit action Form
    $(document).on('click','#Save',function () {
        if($('#titleEdit').val() === '' || $('#textEdit').val() ==='' || $('#categoryEdit').val() ==='' || $('#imageEdit').val() ===''){
            alert('Please input data first');
        } else {


            $id = $('#Save').val();
            $title = $('#titleEdit').val();
            $textForm= $('#textEdit').val();
            $category = $('#categoryEdit').val();

            var fd = new FormData();
            fd.append('id',$id);
            fd.append('title',$title);
            fd.append('text',$textForm);
            fd.append('category',$category);
            var files = $('#imageEdit')[0].files[0]; //load image data
            fd.append('image',files);
            fd.append('edit',1);

            $.ajax({
                type: "POST",
                url: "admin.php",
                data: fd,
                contentType: false,
                processData: false,
                success: function () {
                    $('.itemsTable').load("Layouts/ShowItems.php");
                }
            });
            return false;

        }
    });

    $('.itemsTable').load("Layouts/ShowItems.php");

    //Add New
    $(document).on('click','#addnew',function () {
        if($('#title').val() === '' || $('#textForm').val() ==='' || $('#category').val() ==='' || $('#image').val() ===''){
            alert('Please input data first');
        } else {

            $title = $('#title').val();
            $textForm= $('#textForm').val();
            $category = $('#category').val();

            var fd = new FormData();
            fd.append('title',$title);
            fd.append('text',$textForm);
            fd.append('category',$category);
            var files = $('#image')[0].files[0]; //load image data
            fd.append('image',files);
            fd.append('add',1);
            $.ajax({
                    type: "POST",
                    url: "admin.php",
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function () {
                        $('.itemsTable').load("Layouts/ShowItems.php");
                    }
                });
                return false;

        }
    });

    $(document).on('click','.delete',function () {
        var ok = confirm("Are you sure?");
        if(ok) {
            $id = $(this).val(); //aici variabila id primeste valoarea butonului cu clasa delete pe care am dat click
            $.ajax({
                type: "POST",
                url: "admin.php",
                data: {
                    id: $id,
                    del: 1,
                },
                success: function () {
                    $('.itemsTable').load("Layouts/ShowItems.php");
                }
            });
        }
    })
});

</script>




</html>
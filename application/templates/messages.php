<html lang="en">

<head>
    <title>Fakebook - profile</title>
    <link rel="stylesheet" type="text/css" href="../../stylesheets/bootstrap.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../stylesheets/messages.css">
</head>

<body>

<div class="panel">
    <h1>Fakebook</h1>
    <input type="search" class="form-control search" id="inputSearch" name="search" placeholder="Search by id"/>
    <div class="icons">
        <a href="../controllers/messages.php?id=<?= $chat->id ?>"><i class="icon fa fa-envelope fa-3x"></i></a>
        <a href="../controllers/profile.php?id=<?= $chat->id ?>"><i class="icon fa fa-user-circle fa-3x"></i></a>
    </div>
</div>
<div class="container">
    <div class="dialog">
        <img height="100px" width="100px" src="../../stylesheets/avatar.png" alt="">
        <div>
            <p class="name">Name Surname</p>
            <p class="message">Text of the last message</p>
        </div>
    </div>
    <div class="dialog">
        <img height="100px" width="100px" src="../../stylesheets/avatar.png" alt="">
        <div>
            <p class="name">Name Surname</p>
            <p class="message">Text of the last message</p>
        </div>
    </div>
    <?php
    foreach ($chat->dialogs as $dialog){
        ?>
        <div class="dialog">
            <img height="100px" width="100px" src="../../stylesheets/avatar.png" alt="">
            <div>
                <p class="name">Name Surname</p>
                <p class="message">Text of the last message</p>
            </div>
        </div>
    <?php
    }
    ?>
</div>
</body>

</html>

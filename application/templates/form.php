<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>Форма отправки отзыва</title>
    <link rel="stylesheet" type="text/css" href="../../stylesheets/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../stylesheets/login.css">
</head>


<body>

<div class="container block">
    <form action="../controllers/form.php" method="post">
        <h1>Форма</h1>
        <div class="row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Имя</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail" name="name" placeholder="Имя">
            </div>
        </div>
        <br>
        <div class="row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Почта</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Почта">
            </div>
        </div>
        <br>
        <div class="row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Текст</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword" name="pass" placeholder="Текст">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-secondary">Прикрепить картинку</button>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary">Отправить</button>
            </div>
        </div>
    </form>
</div>

</body>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Registration</title>
</head>
<body>

<div class="container">
    <div class="offset-md-2 w-50" id="success">

        <form id="form" method="post">
            <h1>Регистрация</h1>
            <div class="mb-3">
                <label for="name">Имя</label>
                <input name="name" type="text" class="form-control" id="name">
            </div>

            <div class="mb-3">
                <label for="name">Фамилия</label>
                <input name="surname" type="text" class="form-control" id="surname">
            </div>

            <div class="mb-3">
                <label for="name">Email</label>
                <input name="email" type="email" class="form-control" id="email">
            </div>

            <div class="mb-3">
                <label for="name">Пароль</label>
                <input name="password" type="password" class="form-control" id="password">
            </div>

            <div class="mb-3">
                <label for="name">Повтор пароля</label>
                <input name="repeat_password" type="password" class="form-control" id="repeat_password">
            </div>

            <div id="fetch"></div>

            <button id="submit" type="submit" class="btn btn-primary">Отправить</button>
        </form>
        <div id="edit_data" class="close-div"></div>
    </div>
</div>

<script>
    $(function () {
        $('#form').submit(function (e) {
            e.preventDefault();
            let data = $(this).serialize();
            $.ajax({
                method: "POST",
                url: "registration.php",
                data: data,
                success: function (data) {
                    $("#fetch").html(data);
                }
            })
        });
    });

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</body>
</html>

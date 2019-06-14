<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Main Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>

</head>
<body>
<div class="container mt-5">
    <form>
        <div class="form-group">
            <label for="url">Введите url и получите сокращенную ссылку</label>
            <input type="text" id="url" name="url" class="form-control" placeholder="Enter Url">
        </div>
        <button type="submit" id="sendData" class="btn btn-primary">Отправить</button>
        <div class="msg"></div>
    </form>
</div>
<script src="js/main.js"></script>
</body>
</html>
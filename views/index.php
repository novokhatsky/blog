<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Блог</title>
    <link href="/css/main.css" rel="stylesheet" type="text/css">
</head>
<body>
<form method="post" action="save">
    <div><label for="header">Заголовок</label></div>
    <div><input type="text" placeholder="заголовок" name="header" id="header"></div>
    <div><label for="message">Текст</label></div>
    <div><textarea name="message" id="message"></textarea></div>
    <div><label for="keywords">ключевые слова</label></div>
    <div><input type="text" placeholder="тэги" name="keywords" id="keywords"></div>
    <div><input type="submit" value="сохранить"></div>
</form>

</body>
</html>

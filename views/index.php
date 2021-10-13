<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Блог</title>
    <link href="/css/main.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="app">
    <div><button v-on:click="showAdd">+</button></div>
    <form method="post" action="save" v-if="form_add">
        <div><label for="header">Заголовок</label></div>
        <div><input type="text" placeholder="заголовок" name="header" id="header"></div>
        <div><label for="message">Текст</label></div>
        <div><textarea name="message" id="message"></textarea></div>
        <div><label for="keywords">ключевые слова</label></div>
        <div><input type="text" placeholder="тэги" name="keywords" id="keywords"></div>
        <div><button type="button" v-on:click="cancelAdd">Отмена</button><input type="submit" value="сохранить"></div>
    </form>
</div>
<script src="/js/vue.min.js"></script>
<script src="/js/vue-resource.min.js"></script>

<script>
    Vue.use(VueResource);
    const app = new Vue({
        el: '#app',
        data: {
            server: 'http://<?=$_SERVER['SERVER_NAME']?>:<?=$_SERVER['SERVER_PORT']?>/',
            form_add: false
        },

        watch: {
        },

        methods: {
            showAdd: function () {
                this.form_add = true;
            },

            cancelAdd: function () {
                this.form_add = false;
            }
        },

        created: function () {
        }
    });
</script>
</body>
</html>

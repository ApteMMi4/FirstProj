
<!DOCTYPE html>



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#111111">
    <title>Admin</title>
    <link rel="stylesheet" href="/css/vendor.css">
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
<div class="page">
    <form class="popup__inner popup-authorization password-modal" action="/">
        <h2 class="popup__title title-main fz27">Изменить пароль</h2>
        <div class="popup__wrapper">
            <span>Введите новый пароль!</span>
            <img class="popup__img" src="{{asset('img/lock.png')}}" alt="img">
            <input class="popup__input popup__input--password payment__input" type="text">

        </div>
        <div class="popup__wrapper">
            <span>Введите новый пароль повторно!</span>
            <img class="popup__img" src="{{asset('img/lock.png')}}" alt="img">
            <input class="popup__input popup__input--password payment__input" type="text">

        </div>
        <button class="main__btn main__btn--header popup__btn">Изменить</button>
    </form>
    <script>
        (function(){
            var fields = [$('#old_pass').get(0), $('#pass').get(0)];
            $('#show_pass').change(function() {
                var type = this.checked ? 'text' : 'password';
                try {
                    $(fields).prop('type', type);
                } catch (e) {
                    // IE workaround
                    for (var i=0; i < fields.length; i++) {
                        $(fields[i]).replaceWith(function(){
                            return fields[i] = $('<input/>', {
                                id: this.id,
                                name: this.name,
                                value: this.value,
                                onblur: this.onblur,
                                type: type
                            }).get(0);
                        });
                    }
                }
            });
        })();
    </script>
</div>
<div class="page-body">

    @yield('page-body')

</div>
<script src="/js/vendor.js"></script>
<script src="/js/main.js"></script>
</body>


</div>

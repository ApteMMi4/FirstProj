<nav class="adm">
    <ul class="adm__list ">
        <li class="admin-item">
            <a href="{{ route('profile_index') }}" class="adm__link  {{ request()->routeIs('profile_index')}}" style="color: black">Статистика</a>
        </li>
        <li class="admin-item">
            <a href="{{ route('paycode::index.get') }}" class="adm__link {{ request()->routeIs('paycode::index.get')}}"style="color: black">Paycodes</a>
        </li>
        <li class="admin-item">
            <a href="{{ route('profile_transactions') }}" class="adm__link {{ request()->routeIs('profile_transactions')}}"style="color: black">Транзакции</a>
        </li>
        <li class="admin-item">
            <a href="{{ route('profile_conclusions') }}" class="adm__link adm__link-conclusions {{ request()->routeIs('profile_conclusions')}}"style="color: black">Выводы</a>
        </li>
        <li class="admin-item">
            <a href="{{ route('profile_currencies') }}" class="adm__link  {{ request()->routeIs('profile_currencies')}}" style="color: black">Валюты</a>
        </li>
        <li class="admin-item">
            <a href="{{ route('profile_currencies') }}" class="adm__link  {{ request()->routeIs('profile_currencies')}}" style="color: black">Мерчанты</a>
        </li>
        <li class="admin-item">
            <a href="/admin/users" class="adm__link " style="color: black">Пользователи</a>
        </li>
        <li class="admin-item">
            <a href="{{ route('profile_discount') }}" class="adm__link  {{ request()->routeIs('profile_discount')}}"style="color: black" >Скидка</a>
        </li>
        <li class="admin-item">
            <a href="{{ route('profile_affilProgram') }}" class="adm__link  {{ request()->routeIs('profile_affilProgram')}}"style="color: black">Партнерка</a>
        </li>
        <li class="admin-item">
            <span class="nav__link ">Обмен валют</span>
            <ul class="submenu">
                <li class="submenu__item">
                    <a href="{{ route('index') }}" class="submenu__link {{ request()->routeIs('profile_index')}}">Заявки</a>
                </li>
                <li class="submenu__item">
                    <a href="{{ route('profile_index') }}" class="submenu__link  {{ request()->routeIs('profile_index')}}">Пользователи</a>
                </li>
                <li class="submenu__item">
                    <a href="{{ route('profile_index') }}" class="submenu__link {{ request()->routeIs('profile_index')}}">Направления обмена</a>
                </li>
                <li class="submenu__item">
                    <a href="{{ route('profile_index') }}" class="submenu__link  {{ request()->routeIs('profile_index')}}">Валюты</a>
                </li>
                <li class="submenu__item">
                    <a href="{{ route('profile_index') }}" class="submenu__link {{ request()->routeIs('profile_index')}}">Отзывы</a>
                </li>
                <li class="submenu__item">
                    <a href="{{ route('profile_index') }}" class="submenu__link {{ request()->routeIs('profile_index') }}">Партнерка</a>
                </li>
                <li class="submenu__item">
                    <a href="{{ route('profile_index') }}" class="submenu__link {{ request()->routeIs('profile_index') }}">Настройки</a>
                </li>
            </ul>
        </li>
        <li class="admin-item">
            <a href="{{ route('profile_fastOutput') }}" class="adm__link {{ request()->routeIs('profile_fastOutput')}}"style="color: black">Быстрый вывод</a>
        </li>
    </ul>

</nav>
<style>
.adm{
    display: flex;
    flex-direction: column;
    min-width: 244px;
    width: 244px;
    padding: 10px 23px;
    border-right: 1px solid #e8e8e8;
    height: calc(100vh - 65px);
    background-color: #fff;
    position: fixed;
    top: 64px;
}

.adm__link{
    padding: 10px 10px;
    display: block;
    color: #222332;
    font-size: 14px;
    font-weight: 600;
    letter-spacing: 0.4px;
    border-bottom: 1px solid #f7f3f3;
    transition: all 0.3s;
    cursor: pointer;

}

.nav__link{
    margin-left: 8px;
    padding: 12px 0;
}
</style>

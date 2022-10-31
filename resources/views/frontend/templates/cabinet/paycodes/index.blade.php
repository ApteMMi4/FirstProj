@extends('frontend/layouts/base')

@section('page-title')
Pay-Code
@endsection

@section('content')

    <div class="page-content">
        <div class="pay-code-outer">
            <div class="flex">
                <section class="pay-code pay-code-act">
                    <h3 class="pay-code__title title fz18">
                        Активировать код
                    </h3>

                    <label class="hero__pay-input-outer pay-input-outer">
                        <span class="hero__pay-input-sup pay-input-sup">Введите код:</span>
                        <input class="hero__pay-input pay-input popup__input" type="text" id="paycode_id">
                    </label>

                    <div class="flex">
                        <div class="paycode_data paycode_data_check">
                            <div class="paycode_data_result"></div>
                            <div class="paycode_data_paycode_id"></div>
                            <div class="paycode_data_paycode_amount"></div>
                            <div class="paycode_data_created_at"></div>
                        </div>
                    </div>

                    <div class="flex">

                        <button class="pay-code__btn pc-profile__btn gradi-btn btn-hover2" id="paycode_check_btn">
                            Проверить
                        </button>

                        <button class="pay-code__btn pc-profile__btn gradi-btn btn-hover2" id="paycode_activate_btn">
                            Активировать
                        </button>
                    </div>

                    <div class="pay-code__ques-outer">
                        <a href="#" class="pay-code__ques">
                            Как использовать?
                        </a>
                    </div>
                </section>

                <section class="pay-code pay-code-gen">
                    <h3 class="pay-code__title title fz18">
                        Создать код
                    </h3>

                    <div class="hero__pay-input-outer pay-input-outer transfers-input-outer">
                        <span class="hero__pay-input-sup pay-input-sup">Валюта:</span>
                        <div class="select arbitrary-payment__select">
                            <div class="select__top">
                                              @if(Auth::user()->UAH == null || Auth::user()->UAH == 0)
                                              @else
                                              <span class="select__top-title">UAH ({{Auth::user()->UAH}})</span>
                                              @endif


                            </div>
                            <div class="select__content">
                                <div class="select__input">
                                    <input type="radio" name="select-radio" value="UAH">
                                                    @if(Auth::user()->UAH == null || Auth::user()->UAH == 0)
                                                    <span class="select__item">UAH (0)</span>
                                                    @else
                                                    <span class="select__item">UAH ({{Auth::user()->UAH}})</span>
                                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>

                    <label class="hero__pay-input-outer pay-input-outer">
                        <span class="hero__pay-input-sup pay-input-sup">Введите сумму:</span>
                        <input class="hero__pay-input pay-input popup__input" type="number" id="paycode_amount_field">
                    </label>

                    <label class="hero__pay-input-outer pay-input-outer">
                        <span class="hero__pay-input-sup pay-input-sup">ID получателя:</span>
                        <input class="hero__pay-input pay-input popup__input" type="text" id="paycode_user_to_field">
                    </label>

                    <button class="pay-code__btn pc-profile__btn gradi-btn btn-hover2" id="create_paycode_btn">
                        Создать
                    </button>


                    <div class="pay-code__ques-outer">
                        <a href="#" class="pay-code__ques">
                            Как создать?
                        </a>
                    </div>
                </section>
            </div>

            <section class="pay-code pay-code-my">
                <h3 class="pay-code__title title fz18">
                    Мои коды
                </h3>

                <div class="pay-code__table-outer">
                    <div class="admin-table user__table">
                        <div class="admin-table__row row-title">
                            <div class="admin-table__two admin-table__el">
                                Дата создания
                            </div>
                            <div class="admin-table__six admin-table__el max-width-100">
                                Валюта
                            </div>
                            <div class="admin-table__seven admin-table__el max-width-300">
                                Код
                            </div>
                            <div class="admin-table__eight admin-table__el">
                                Сумма
                            </div>
                            <div class="admin-table__nine admin-table__el">
                                Статус
                            </div>
                        </div>
                        @if($paycodes->count() > 0)
                            @foreach($paycodes as $paycode)
                                <div class="admin-table__row">
                                    <div class="admin-table__two admin-table__el">
                                        {{$paycode->created_at}}
                                    </div>
                                    <div class="admin-table__six admin-table__el max-width-100">
                                        {{$paycode->paycode_currency}}
                                    </div>
                                    <div class="admin-table__seven admin-table__el max-width-300">
                                        {{$paycode->paycode_id}}
                                        <button class="copy">
                                            <img src="{{asset('frontend/img/copy.svg')}}" alt="img">
                                        </button>
                                    </div>
                                    <div class="admin-table__eight admin-table__el">
                                        @if($paycode->user_id_from == Auth::user()->id)
                                            <span class="minus-text">- {{price_format($paycode->paycode_amount)}} {{$paycode->paycode_currency}}</span>
                                        @else
                                            <span class="plus-text">+ {{price_format($paycode->paycode_amount)}} {{$paycode->paycode_currency}}</span>
                                        @endif
                                    </div>
                                    <div class="admin-table__nine admin-table__el">

                                        @if($paycode->status == 0)
                                            <span>Не активирован</span>
                                        @endif

                                        @if($paycode->status == 1)
                                            <span>Активирован</span>
                                            {{$paycode->updated_at}}

                                        @endif

                                    </div>
                                </div>
                            @endforeach

                        @else
                            <div class="admin-table__row">
                                <div class="admin-table__two admin-table__el">
                                    У вас нет кодов
                                </div>
                            </div>
                        @endif

                        {{ $paycodes->links('frontend.partials.pagination') }}

                    </div>
                </div>
            </section>
        </div>
    </div>

    <script>
        $(function() {
            // copy content to clipboard
            function copyToClipboard(element) {
                var $temp = $("<input>");
                $("body").append($temp);
                $temp.val($(element).text()).select();
                document.execCommand("copy");
                $temp.remove();
            }

            // copy coupone code to clipboard
            $(".copy").on("click", function() {
                copyToClipboard("#coupon-field");
                $(".coupon-alert").fadeIn("slow");
            });
        });
    </script>
@endsection

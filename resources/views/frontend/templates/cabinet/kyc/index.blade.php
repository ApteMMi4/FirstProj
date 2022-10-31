@extends('frontend/layouts/base')
@section('page-title')
Верификация
@endsection

@section('content')

    <div class="page-content">
        <div class="pay-code-outer">
            <div class="flex">
              <section class="pay-code pay-code-act">
                    <h3 class="pay-code__title title fz18">
                        Верификация:
                        <span class="verify_docs_status verify_docs_status_{{Auth::user()->verify_docs_status}}">

                        @if(Auth::user()->verify_docs_status == 0)
                        Не пройдена
                        @endif
                        @if(Auth::user()->verify_docs_status == 1)
                        На проверке
                        @endif
                        @if(Auth::user()->verify_docs_status == 2)
                        Пройдена
                        @endif

                        </span>
                    </h3>



                    <div class="double_cols">

                    <div class="hero__pay-input-outer pay-input-outer transfers-input-outer doc_type">
                        <span class="hero__pay-input-sup pay-input-sup">Документ для верификации:</span>
                        <div class="select arbitrary-payment__select">

                            <div class="select__top">
                              <span class="select__top-title">Внутренний паспорт</span>
                            </div>

                            <div class="select__content">
                                <div class="select__input">
                                  <input type="radio" name="select-radio" value="Внутренний паспорт">
                                  <span class="select__item">Внутренний паспорт</span>


                                </div>
                                <div class="select__input">
                                    <input type="radio" name="select-radio" value="ID карта">
                                    <span class="select__item">ID карта</span>
                                </div>
                                <div class="select__input">
                                    <input type="radio" name="select-radio" value="Заграничный паспорт">
                                    <span class="select__item">Заграничный паспорт</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <label class="hero__pay-input-outer pay-input-outer">
                        <span class="hero__pay-input-sup pay-input-sup">Фамилия, Имя, Отчество</span>
                        <input class="hero__pay-input pay-input popup__input" type="text" name="name">
                    </label>

                    <label class="hero__pay-input-outer pay-input-outer">
                        <span class="hero__pay-input-sup pay-input-sup">Дата рождения</span>
                        <input class="hero__pay-input pay-input popup__input" type="date" name="birthdate">
                    </label>

                    <label class="hero__pay-input-outer pay-input-outer">
                        <span class="hero__pay-input-sup pay-input-sup">Серия и номер документа</span>
                        <input class="hero__pay-input pay-input popup__input" type="text" name="serail_number_doc">
                    </label>

                    <label class="hero__pay-input-outer pay-input-outer">
                        <span class="hero__pay-input-sup pay-input-sup">Телефон</span>
                        <input class="hero__pay-input pay-input popup__input" type="text" name="phone">
                    </label>

                    <label class="hero__pay-input-outer pay-input-outer">
                        <span class="hero__pay-input-sup pay-input-sup">Страна</span>
                        <input class="hero__pay-input pay-input popup__input" type="text" name="country">
                    </label>

                    <label class="hero__pay-input-outer pay-input-outer">
                        <span class="hero__pay-input-sup pay-input-sup">Город</span>
                        <input class="hero__pay-input pay-input popup__input" type="text" name="city">
                    </label>

                    <label class="hero__pay-input-outer pay-input-outer">
                        <span class="hero__pay-input-sup pay-input-sup">Полный адрес</span>
                        <input class="hero__pay-input pay-input popup__input" type="text" name="address">
                    </label>

                    </div>

                    <button class="pay-code__btn pc-profile__btn gradi-btn btn-hover2 full--btn" id="create_paycode_btn">
                        Запросить верификацию
                    </button>

                </section>


            </div>


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

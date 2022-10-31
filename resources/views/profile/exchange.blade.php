
@extends('frontend/layouts/base')

@section('content')

   


{{--        @include('frontend/partials/sidebar')--}}






			<div class="page-content">
				<section class="exch">
					<div class="exch__form-outer">
						<h1 class="exch__title fz18 title">
							Обмен
						</h1>
						<form class="exch__form" action="#">
							<label class="hero__pay-input-outer pay-input-outer">
								<span class="hero__pay-input-sup pay-input-sup">Отдаете:</span>
                                @if(empty($trans->toArray()))
                                    <span class="hero__pay-input-sub pay-input-sub">Баланс: <strong>0 <span
                                                class="pay-cur-span">UAH</span></strong></span>
                                @endif
                                @foreach($trans as $item)
								<span class="hero__pay-input-sub pay-input-sub">Баланс: <strong>{{$item->sum('total')}} <span
											class="pay-cur-span">UAH</span></strong></span>
                                @endforeach
								<div class="block">
									<input class="hero__pay-input pay-input popup__input" type="number">
									<div class="hero__pay-cur-outer pay-cur-outer">
										<div class="pay-cur">
											<span class="pay-cur-span">uah</span>
											<img src={{asset("img/arrow-down.svg")}} alt="img">
										</div>
										<ul class="pay-cur-list">
											<li class="pay-cur-list-item">
												uah
											</li>
											<li class="pay-cur-list-item">
												rub
											</li>
											<li class="pay-cur-list-item">
												usd
											</li>
											<li class="pay-cur-list-item">
												uah
											</li>
											<li class="pay-cur-list-item">
												uah
											</li>
										</ul>
									</div>
								</div>
							</label>
							<label class="hero__pay-input-outer pay-input-outer">
								<span class="hero__pay-input-sup pay-input-sup">Получаете:</span>
								<div class="block">
									<input class="hero__pay-input pay-input popup__input" type="number">
									<div class="hero__pay-cur-outer pay-cur-outer">
										<div class="pay-cur">
											<span class="pay-cur-span no-change">btc</span>
											<img src={{asset("img/arrow-down.svg")}} alt="img">
										</div>
										<ul class="pay-cur-list">
											<li class="pay-cur-list-item">
												btc
											</li>
										</ul>
									</div>
								</div>
								<div class="blocck">
									<span class="hero__pay-input-sub pay-input-sub">Курс: <strong strong>1 <span
												class="pay-cur-span">EUR</span></strong><img src={{asset("img/arrow-rightt.svg")}}
											alt="img">
										<strong strong>1.302 <span class="pay-cur-span">USD</span></strong>
									</span>
									<span class="hero__pay-input-sub pay-input-sub">
										С учетом бонуса: 0%
									</span>
								</div>
							</label>
							<button class="exch__btn pc-profile__btn gradi-btn btn-hover2">К обмену</button>
						</form>
					</div>
				</section>


				<div class="admin-table user__table">
					<div class="admin-table__row row-title">
						<div class="admin-table__two">
							Дата
						</div>
						<div class="admin-table__seven">
							Продано
						</div>
						<div class="admin-table__eight">
							Куплено
						</div>
						<div class="admin-table__nine">
							Статус
						</div>
					</div>
					<div class="admin-table__row">
						<div class="admin-table__two">
							18.08.2021
						</div>
						<div class="admin-table__seven">
							550 руб.
						</div>
						<div class="admin-table__eight">
							14 500 руб.
						</div>
						<div class="admin-table__nine green-text">
							Оплачен
						</div>
					</div>
					<div class="admin-table__row">
						<div class="admin-table__two">
							18.08.2021
						</div>
						<div class="admin-table__seven">
							550 руб.
						</div>
						<div class="admin-table__eight">
							14 500 руб.
						</div>
						<div class="admin-table__nine green-text">
							Оплачен
						</div>
					</div>
					<div class="admin-table__row">
						<div class="admin-table__two">
							18.08.2021
						</div>
						<div class="admin-table__seven">
							550 руб.
						</div>
						<div class="admin-table__eight">
							14 500 руб.
						</div>
						<div class="admin-table__nine green-text">
							Оплачен
						</div>
					</div>
					<div class="admin-table__row">
						<div class="admin-table__two">
							18.08.2021
						</div>
						<div class="admin-table__seven">
							550 руб.
						</div>
						<div class="admin-table__eight">
							14 500 руб.
						</div>
						<div class="admin-table__nine green-text">
							Оплачен
						</div>
					</div>
					<div class="admin-table__row">
						<div class="admin-table__two">
							18.08.2021
						</div>
						<div class="admin-table__seven">
							550 руб.
						</div>
						<div class="admin-table__eight">
							14 500 руб.
						</div>
						<div class="admin-table__nine green-text">
							Оплачен
						</div>
					</div>
				</div>

				<ul class="pagination">
					<li class="pagination__item active">
						<span class="pagination__link">1</span>
					</li>
					<li class="pagination__item btn-hover3">
						<a class="pagination__link" href="#">2</a>
					</li>
					<li class="pagination__item btn-hover3">
						<a class="pagination__link" href="#">3</a>
					</li>
					<li class="pagination__item btn-hover3">
						<a class="pagination__link" href="#">4</a>
					</li>
					<li class="pagination__item btn-hover3">
						<a class="pagination__link" href="#">5</a>
					</li>
					<li class="pagination__item btn-hover3">
						<a class="pagination__link" href="#">6</a>
					</li>
				</ul>
			</div>

		</div>
	</div>
@endsection

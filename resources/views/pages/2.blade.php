@extends('layout')
@push('meta')
<title>Наши услуги (demo)</title>
    <meta name="description" content="Демонстрационная страница. Краткое содержание (description)"/>
    <meta name="author" content="Иванов Иван Иванович" />
@endpush
@push('modify')
5f57c85671fe0
@endpush
@section('content')
<div class="container-fluid header text-uppercase py-2 roboto-regular fs-12 border-bottom-3 color1 background-color8 border-color2">
	<div class="row justify-content-start align-items-center">
		<div class="col-auto">
			 <a href="/" class="link"><img class="img max-ht-md-4 max-ht-3" src="/app/img/5f510da912740.svg" alt="" /></a>
		</div>
		<div class="col-auto d-none d-lg-block ml-auto">
			 <a href="/" class="link no-decor hover-color2">Главная</a>
		</div>
		<div class="col-auto ml-4 d-none d-lg-block">
			 <a href="/services" class="link no-decor hover-color2">Наши услуги</a>
		</div>
		<div class="col-auto ml-4 d-none d-lg-block">
			 <a href="#" class="link no-decor hover-color2">Контакты</a>
		</div>
		<div class="col-auto ml-auto d-none d-md-block">
			 <a href="tel: +78002202222" class="link no-decor hover-color6 color5"><em class="icon fa-phone-alt"></em><span class="content roboto-medium">+7 (800) 220-22-22</span></a>
		</div>
		<div class="col-auto ml-auto d-block d-lg-none">
			<em class="icon fs-20 fa-bars menu-toggler-icon"></em>
		</div>
	</div>
</div><div id="slider1">
    <section class="section bg-img-2 d-flex align-items-center min-ht-xl-35 min-ht-lg-30 min-ht-md-25 min-ht-sm-20 min-ht-15">
	<div class="container-fluid text-center">
		<h2 class="content roboto-light text-uppercase color5 fs-xl-30 fs-lg-27 fs-sm-17 fs-14 fs-md-20">
			Административное право
		</h2>
		<p class="content roboto-light text-uppercase color5 fs-xl-15 fs-10 fs-sm-11 fs-md-12 fs-lg-13">
			Поможем в решении споров с контрольно-надзорными органами.
		</p> <a href="#adm_law" class="link no-decor text-uppercase border-color5 border-1 color5 py-2 px-5 hover-color5 roboto-light background-color2">Подробнее</a>
	</div>
</section><section class="section bg-img-3 d-flex align-items-center min-ht-xl-35 min-ht-lg-30 min-ht-md-25 min-ht-sm-20 min-ht-15">
	<div class="container text-center">
		<h2 class="content roboto-light text-uppercase color5 fs-xl-30 fs-lg-27 fs-sm-17 fs-14 fs-md-20">
			Бухгалтерские услуги
		</h2>
		<p class="content roboto-light text-uppercase color5 fs-xl-15 fs-10 fs-sm-11 fs-md-12 fs-lg-13">
			Оказываем полный спектр услуг в бухгалтерской сфере.
		</p> <a href="#acc_serv" class="link no-decor text-uppercase border-color5 border-1 color5 py-2 px-5 hover-color5 background-color2 roboto-light">Подробнее</a>
	</div>
</section><section class="section bg-img-4 d-flex align-items-center min-ht-xl-35 min-ht-lg-30 min-ht-md-25 min-ht-sm-20 min-ht-15">
	<div class="container text-center">
		<h2 class="content roboto-light text-uppercase color5 fs-xl-30 fs-lg-27 fs-sm-17 fs-14 fs-md-20">
			Гражданское право
		</h2>
		<p class="content roboto-light text-uppercase color5 fs-xl-15 fs-10 fs-sm-11 fs-md-12 fs-lg-13">
			Договорное право, составление документов, представление в судах и другое.
		</p> <a href="#civil_law" class="link no-decor text-uppercase border-color5 border-1 color5 py-2 px-5 hover-color5 background-color2 roboto-light">Подробнее</a>
	</div>
</section>
</div>
<section class="section py-5 background-color7 bg-img-5" id="adm_law">
	<div class="container">
		<h3 class="content text-uppercase roboto-thin color1 fs-md-26 fs-18">
			Административное право
		</h3>
		<p class="content roboto-light fs-12 color6">
			Основная часть взаимоотношений в обществе регулируется административным правом, оно выступает важнейшим инструментом позволяющим управлять различными социальными процессами. Многие частные и юридические лица в процессе своей деятельности, так или иначе попадают в сферу, которая регулируется Кодексом Российской Федерации об административных правонарушениях.
		</p>
		<p class="content roboto-light fs-12 color6 mt-4">
			При возникновении сложной ситуации важно выстроить правильные взаимоотношения с органами исполнительной власти. Юрист по административному праву благодаря отличному знанию законов и умению грамотно ими пользоваться поможет вам защитить себя и отстоять свои права.
		</p>
		<p class="content roboto-light mt-4 color2 fs-16">
			Если ваше дело регулирует административное право, юрист:
		</p>
		<ul class="section color6 fs-12 pl-4">
			<li class="content">
				ознакомившись с подробностями дела, составит для вас письменную или устную консультацию;
			</li>
			<li class="content">
				представит ваши интересы в судах различной инстанции;
			</li>
			<li class="content">
				возьмется за составление необходимых документов: жалоб, исков, апелляций.
			</li>
		</ul>
	</div>
</section><section class="section py-5 background-color7 bg-img-6" id="acc_serv">
	<div class="container">
		<h3 class="content text-uppercase roboto-thin color1 fs-md-26 fs-18">
			Бухгалтерские услуги
		</h3>
		<ul class="section color6 fs-12 pl-4">
			<li class="content">
				Подготовка (составление) для организаций и ИП налоговой и бухгалтерской отчетности на основе представленных данных для предоставления в налоговую инспекцию, пенсионный фонд, органы статистики, фонд социального страхования;
			</li>
			<li class="content">
				Консультирование по вопросам налогообложения;
			</li>
			<li class="content">
				Составление и сдача «просроченной» бухгалтерской и налоговой отчетности;
			</li>
			<li class="content">
				Ведение первичной бухгалтерской документации;
			</li>
			<li class="content">
				Разработка учетной политики;
			</li>
			<li class="content">
				Составление налоговых деклараций;
			</li>
			<li class="content">
				Консультирование по выбору системы налогообложения для вновь создаваемых организаций и действующих фирм;
			</li>
			<li class="content">
				Постановка, организация и ведение бухгалтерского и налогового учёта;
			</li>
		</ul>
	</div>
</section><section class="section py-5 background-color7 bg-img-7" id="civil_law">
	<div class="container">
		<h3 class="content text-uppercase roboto-thin color1 fs-md-26 fs-18">
			Гражданское право
		</h3>
		<ul class="section color6 fs-12 pl-4">
			<li class="content">
				Проверка договоров (составление юридических заключений, проверка на соответствие требованиям законодательства Российской Федерации, проверка соответствия полномочий контрагентов, выявления спорных и противоречий в положениях договоров);
			</li>
			<li class="content">
				Разработка и составление договоров (составление сложных договоров, договоров купли-продажи, поставки, подряда, займа и тд);
			</li>
			<li class="content">
				Претензионная работа с Вашими контрагентами (составление юридически значимых писем, досудебных претензий, переговоры, подписание мировых соглашений и др);
			</li>
			<li class="content">
				Составление доверенностей для нотариального заверения;
			</li>
			<li class="content">
				Составление доверенностей для юридических лиц;
			</li>
			<li class="content">
				Представление интересов в судах общей юрисдикции;
			</li>
			<li class="content">
				Представление интересов в арбитражных судах;
			</li>
			<li class="content">
				Представление интересов в апелляционных инстанциях;
			</li>
		</ul>
	</div>
</section><section class="section background-color8 py-5 mt-auto">
	<div class="container-fluid roboto-thin color1 fs-10">
		<div class="row justify-content-center align-items-center">
			<div class="col-lg-auto col-12 text-center mb-lg-auto mb-3">
				<img class="img" src="/app/img/5f510da912740.svg" alt="" />
			</div>
			<div class="col-auto">
				<em class="icon fa-phone-alt"></em> <span class="content">+7 (800) 220-22-22</span>
			</div>
			<div class="col-auto">
				<em class="icon fa-envelope"></em> <span class="content">info@my-site.ru</span>
			</div>
			<div class="col-auto">
				<em class="icon fa-map-marker-alt"></em> <span class="content">г. Орел, ул. Болховское шоссе 1</span>
			</div>
			<div class="col-auto">
				<em class="icon fa-clock"></em> <span class="content">Пн-Пт с 10:00 до 17:00</span>
			</div>
		</div>
	</div>
</section>@endsection
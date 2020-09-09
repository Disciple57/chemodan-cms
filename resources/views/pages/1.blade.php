@extends('layout')
@push('meta')
<title>Главная страница (demo)</title>
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
</div><section class="section bg-img-1 text-center py-5">
	<img class="img min-ht-xl-13 min-ht-md-10 min-ht-lg-7 min-ht-5 my-5 my-md-auto wow zoomIn" src="/app/img/5f510db290262.svg" alt="" />
	<h1 class="content roboto-bold text-uppercase fs-xl-30 fs-20 my-5 wow fadeInLeft color2  animated">
		Консалтинговое агенство “Company”
	</h1>
	<p class="content roboto-thin color5 text-uppercase fs-xl-20 fs-15 fadeInRight wow  animated">
		Быстро. Качественно. Квалифицированно.
	</p>
	<p class="content roboto-light fs-10 color5 wow fadeInUp">
		Осуществляем юридическую помощь, ведение бухгалтерии, услуги по банкротству физических и юридических лиц.
	</p>
</section><section class="section py-5 color2 background-color3">
	<div class="container text-center text-uppercase">
		<h2 class="content">
			Наши услуги
		</h2>
		<div class="row justify-content-center mt-5 no-gutters wow  fadeIn  animated">
			<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 py-3 roboto-light">
				<div class="row text-left">
					<div class="col-3 text-center">
						<em class="icon fs-30 fa-briefcase"></em>
					</div>
					<div class="col-9">
						<div class="content fs-15 mt-3">
							Административное право
						</div>
						<p class="content color6 mt-2">
							Поможем в решении споров с контрольно-надзорными органами.
						</p>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 py-3 roboto-light">
				<div class="row text-left">
					<div class="col-3 text-center">
						<em class="icon fs-30 fa-university"></em>
					</div>
					<div class="col-9">
						<div class="content fs-15 mt-3">
							Бухгалтерские услуги
						</div>
						<p class="content color6 mt-2">
							Оказываем полный спектр услуг в бухгалтерской сфере.
						</p>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 py-3 roboto-light">
				<div class="row text-left">
					<div class="col-3 text-center">
						<em class="icon fs-30 fa-receipt"></em>
					</div>
					<div class="col-9">
						<div class="content fs-15 mt-3">
							Услуги в сфере финансов
						</div>
						<p class="content color6 mt-2">
							Помощь в составлении расписок, договоров займов, взыскания.
						</p>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 py-3 roboto-light">
				<div class="row text-left">
					<div class="col-3 text-center">
						<em class="icon fs-30 fa-users"></em>
					</div>
					<div class="col-9">
						<div class="content fs-15 mt-3">
							Гражданское право
						</div>
						<p class="content color6 mt-2">
							Договорное право, составление документов, представление в судах и другое.
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section><section class="section text-center py-5 roboto-regular background-color7">
	<h2 class="content text-uppercase color2">
		В нашей компании работает очень опытный персонал
	</h2>
	<div class="container mt-5 wow fadeIn animated">
		<div class="row justify-content-center">
			<div class="col-12 col-md-6 col-lg-4 fs-12">
				<img class="img" src="/app/img/5f510dc45547f.png" alt="" />
				<div class="content roboto-medium color5 text-uppercase">
					Иванов Иван Иванович
				</div>
				<div class="content my-2 color2">
					Управляющий
				</div>
				<p class="content color6 font-italic roboto-light fs-9">
					Имеет серьезную подготовку. Два высших экономических образования. Кандидат экономических наук. Большой опыт практического решения сложных задач. Амбициозен, решителен, точно знает, когда нужно действовать.
				</p>
			</div>
			<div class="col-12 col-md-6 col-lg-4 fs-12">
				<img class="img" src="/app/img/5f510dcc2998e.png" alt="" />
				<div class="content roboto-medium color5 text-uppercase">
					Иванова Эльвира Ивановна
				</div>
				<div class="content my-2 color2">
					Консультант по финансам
				</div>
				<p class="content color6 font-italic roboto-light fs-9">
					Стаж работы главным бухгалтером 20 лет. Легко сведет дебит с кредитом, приведет в порядок самые «проблемные» места вашей бухгалтерии, поможет оптимизировать налогообложение. После её аудита не страшна никакая проверка!
				</p>
			</div>
			<div class="col-12 col-md-6 col-lg-4 fs-12">
				<img class="img" src="/app/img/5f510dd66cf20.png" alt="" />
				<div class="content roboto-medium color5 text-uppercase">
					Васильев Василий Иванович
				</div>
				<div class="content my-2 color2">
					Адвокат
				</div>
				<p class="content color6 font-italic roboto-light fs-9">
					Имеет два высших образования ведущих ВУЗов страны: Государственный Университет Управления, МГУ. Высочайшая квалификация, опыт решения любых гражданско-правовых вопросов. Имеет награды, благодарности, почетные грамоты.
				</p>
			</div>
		</div>
	</div>
</section><section class="section py-5 background-color7">
	<div class="container wow fadeIn   animated">
		<div class="row flex-column-reverse flex-lg-row">
			<div class="roboto-light font-italic col-12 col-lg-8 color2">
				<div class="content fs-15 roboto-regular">
					Дорогие друзья!
				</div>
				<div class="content color5 fs-10 mt-3">
					Мы основали наше агенство и собрали высококвалифицированных специалистов для того, чтобы всегда иметь возможность помочь в сложившейся ситуации. Мы стоим на защите прав и законных интересов как физических, так и юридических лиц. Наша основная задача состоит в том, чтобы каждый, кто обратиться к нам - получил грамотную и квалифицированную помощь. Перед нами стоит непростая и очень сложная задача - защищать права и законные интересы наших граждан. Мы обязательно справимся со всеми трудностями, которые нас ожидают в процессе работы.
				</div>
				<div class="content text-right my-3 fs-13">
					С уважением основатель агенства “Company”
				</div>
				<div class="content text-right roboto-medium fs-17">
					Даниил Данилов
				</div>
			</div>
			<div class="col-lg-4 col-12 text-md-center">
				<img class="img img-fluid max-ht-md-30 mb-5 mb-lg-auto" src="/app/img/5f510ddd8acee.png" alt="" />
			</div>
		</div>
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
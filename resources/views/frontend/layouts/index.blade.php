<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>project</title>
    @include('frontend.css');
</head>
<body>
<div class="main mainLarge">
    <header class="header headerLarge">
        <div class="container">
            <h1 class="logo"><a href="index.html">Rocket Promo</a></h1>
            <nav class="nav">
                <button class="mobileButton">
                    <span class="buttonFirstLine"></span>
                    <span class="buttonSecondLine"></span>
                    <span class="buttonThirdLine"></span>
                </button>
                <ul class="mainNavList">
                    <li><a href="index.html">главная</a></li>
                    <li><a href="blog.html">блог</a></li>
                    <li><a href="about.html">о нас</a></li>
                    <li><a href="index.html">реклама</a></li>
                    <li><a href="contacts.html">контакты</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="title-block">
        <div class="container">
            <div class="title-text mainText">
                <h2>Запусти рекламу которую увидят тысячи пользователей Instagram<span class="blue">.</span></h2>
                <a href="#priceBlock" name="scrollAnimate" class="rocketStartButton">запустить</a>
            </div>
            <div class="rocket">
                <span class="cloud cloud-left"></span>
                <div class="rocket-img">
                    <img src="images/rocket.png" alt="">
                    <img src="images/rocket-mobile.png" alt="" class="rocket-mobile">
                </div>
                <span class="cloud cloud-right"></span>
            </div>
        </div>
    </div>

    <div class="iphoneBlock">
        <div class="container">
            <div class="iphoneFlex">
                <div class="iphoneImageItem">
                    <img class="iphoneBlur" src="images/iphoneBlur.png" alt="iphone">
                    <img class="iphone" src="images/iphone.png" alt="iphone">
                </div>
                <div class="iphoneContentItem">
                    <h2>Мы используем инструменты <span class="markerIphone">Instagram</span> которые позволяют<br> настроить показ рекламы<br> только <span class="markerIphone">потенциальным<br>  клиентам</span></h2>
                </div>
            </div>
        </div>
    </div>

    <div class="startSteps">
        <div class="container">
            <h2>Этапы запуска рекламы в Instagram<span class="pointMarker">.</span></h2>
            <div class="startFlex">
                <div class="startItem">
                    <div class="startItemBlock1">
                        <div class="startItemImg client"></div>
                    </div>
                    <div class="startItemBlock2">
                        <span>Этап 1</span>
                    </div>
                    <div class="startItemBlock3">
                        <span>Определяем параметры потенциального клиента</span>
                    </div>
                </div>
                <div class="startItem">
                    <div class="startItemBlock1">
                        <div class="startItemImg arrow"></div>
                    </div>
                    <div class="startItemBlock2">
                        <span>Этап 2</span>
                    </div>
                    <div class="startItemBlock3">
                        <span>Настраиваем цели рекламы</span>
                    </div>
                </div>
                <div class="startItem">
                    <div class="startItemBlock1">
                        <div class="startItemImg rocket"></div>
                    </div>
                    <div class="startItemBlock2">
                        <span>Этап 3</span>
                    </div>
                    <div class="startItemBlock3">
                        <span>Запускаем проект</span>
                    </div>
                </div>
                <div class="startItem">
                    <div class="startItemBlock1">
                        <div class="startItemImg result"></div>
                    </div>
                    <div class="startItemBlock2">
                        <span>Этап 4</span>
                    </div>
                    <div class="startItemBlock3">
                        <span>Получаем результат</span>
                    </div>
                </div>
                <div class="startItem">
                    <div class="startItemBlock1">
                        <div class="startItemImg desktop"></div>
                    </div>
                    <div class="startItemBlock2">
                        <span>Этап 5</span>
                    </div>
                    <div class="startItemBlock3">
                        <span>Готовим отчет</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="startBlock">
        <div class="container">
            <img class="backgroundImg" src="images/bgMultiItems.jpg" alt="background">
            <div class="startButtonFlex">
                <div class="startButtonItem1">
                    <h2>Запустить рекламу легко<span>.</span></h2>
                    <ul class="startList">
                        <li><span></span>Укажите параметры целевой аудитории, страна, город,<br> <span class="none"></span>возраст, пол и приблизительные интересы</li>
                        <li><span></span>Проведите оплату любым удобным способом</li>
                        <li><span></span>Получите первые показы уже через несколько минут</li>
                        <li><span></span>Просматривайте статистику и скачайте подробный отчет о кампании</li>
                    </ul>
                </div>
                <div class="startButtonItem2">
                    <img src="images/start.png" alt="start">
                </div>
            </div>
            <div class="decorationLinesWrapper">
                <div class="decorationLine1"></div>
                <div class="decorationLine2"></div>
                <div class="decorationLine3"></div>
                <div class="decorationLine4"></div>
            </div>
        </div>
    </div>

    <div class="priceBlock" id="priceBlock">
        <div class="container">
            <h2>Цена</h2>
            <div class="priceBlockFlex">
                <div class="priceBlockItem">
                    <div class="priceItemHeader blueColor">
                        <h3>Старт</h3>
                        <img src="images/rocketShadow.png" alt="icon">
                    </div>
                    <div class="priceItemContent">
                        <ul class="priceItemList">
                            <li><span></span>Запуск 1 рекламного<br><span class="none"></span> объявления</li>
                            <li><span></span>1 вариант рекламного<br><span class="none"></span> объявления</li>
                            <li><span></span>до 2 недель рекламы</li>
                            <li><span></span>1 оптимизация</li>
                            <li><span></span>Отчет</li>
                        </ul>
                        <img src="images/decoration.png" alt="decoration">
                        <div class="countMatchWrapper">
                            <div class="count">500</div>
                            <div class="match">гривен<br> в месяц</div>
                        </div>
                    </div>
                    <button class="buyThis">заказать</button>
                </div>
                <div class="priceBlockItem">
                    <div class="priceItemHeader greenColor">
                        <h3>Бизнес</h3>
                        <img src="images/moneyShadow.png" alt="icon">
                    </div>
                    <div class="priceItemContent">
                        <ul class="priceItemList">
                            <li><span></span>Запуск до 5 рекламных<br><span class="none"></span> объявлений</li>
                            <li><span></span>Подготовка макета<br><span class="none"></span> для рекламы</li>
                            <li><span></span>Разработка текста<br><span class="none"></span> для рекламы</li>
                            <li><span></span>3 варианта каждой рекламы</li>
                            <li><span></span>Сплит тестирование</li>
                            <li><span></span>Двухэтапная оптимизация</li>
                            <li><span></span>Месяц рекламы</li>
                            <li><span></span>Отчет</li>
                        </ul>
                        <img src="images/decoration.png" alt="decoration">
                        <div class="countMatchWrapper">
                            <div class="count">1500</div>
                            <div class="match">гривен<br> в месяц</div>
                        </div>
                    </div>
                    <button class="buyThis">заказать</button>
                </div>
                <div class="priceBlockItem">
                    <div class="priceItemHeader redColor">
                        <h3>Индивидуальный</h3>
                        <img src="images/IndividualShadow.png" alt="icon">
                    </div>
                    <div class="priceItemContent">
                        <ul class="priceItemList">
                            <li><span></span>Включает пакет бизнес</li>
                            <li><span></span>Определение потенциального<br><span class="none"></span> клиента</li>
                            <li><span></span>Разработка стратегии</li>
                            <li><span></span>Маркетинговый<br><span class="none"></span> анализ рекламы</li>
                            <li><span></span>Подготовка аккаунта<br><span class="none"></span> к рекламе</li>
                            <li><span></span>Оптимизация аккаунта<br><span class="none"></span> и повышение конверсии</li>
                            <li><span></span>Построение индивидуальной<br><span class="none"></span> рекламной компании</li>
                            <li><span></span>Запуск и проведение<br><span class="none"></span> рекламной компании</li>
                        </ul>
                        <img src="images/decoration.png" alt="decoration">
                        <div class="countMatchWrapper">
                            <div class="count">от 5000</div>
                            <div class="match">гривен<br> в месяц</div>
                        </div>
                    </div>
                    <button class="buyThis">заказать</button>
                </div>
            </div>
        </div>
    </div>

    <div class="consultingBlock">
        <div class="container">
            <div class="cunsultingFlex">
                <div class="consultingFlexItem1">
                    <img src="images/consultBg.png" alt="Img">
                </div>
                <div class="consultingFlexItem2">
                    <h2>Консультация</h2>
                    <h3>Получите консультацию по рекламе а так же её просчет</h3>
                    <form>
                        <input type="hidden" class="hidden-title">
                        <input type="text" placeholder="Ваше имя" name="name">
                        <input type="text" placeholder="Ваш телефон" name="telephone">
                        <input type="submit" value="отправить">
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('frontend.partials.footer')
</div>

<div class="popupFormMask"></div>
<div class="popupForm">
    <button class="popupFormClose"></button>
    <h3 class="titlePop">ТАРИФНЫЙ ПАКЕТ "СТАНДАРТ"</h3>
    <form>
        <input type="hidden" class="hidden-title">
        <input type="text" placeholder="Ваше имя">
        <input type="text" placeholder="Ваш телефон">
        <input type="submit" value="заказать" >
    </form>
</div>

<div class="thanksPopup">
    <button class="popupFormClose"></button>
    <span>Спасибо за заказ!</span>
</div>

<a href="#" id="back-top"></a>
@include('frontend.js');
</body>
</html>
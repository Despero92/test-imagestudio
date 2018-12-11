<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>project</title>
    @include('frontend.css')
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
    @if(session('message'))
        <div id="modal-success-message" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Успех!</h4>
                    </div>
                    <div class="modal-body">
                        <p>{!! session('message') !!}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="title-block">
        <div class="container">
            <div class="title-text mainText">
                <h2>{{$launchContent->value}}<span class="blue">.</span></h2>
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
                    <?php echo $instagramContent->value ?>
                </div>
            </div>
        </div>
    </div>

    <div class="startSteps">
        <div class="container">
            <h2>Этапы запуска рекламы в Instagram<span class="pointMarker">.</span></h2>
            <div class="startFlex">
                @foreach($stages as $stage)
                <div class="startItem">
                    <div class="startItemBlock1">
                        <div class="startItemImg">
                            <?php $imagePath = str_replace('public/', '', $stage->storage_path); ?>
                            <img src="{{ asset("storage/$imagePath") }}" alt="image-description">
                        </div>
                    </div>
                    <div class="startItemBlock2">
                        <span>{{ $stage->title }}</span>
                    </div>
                    <div class="startItemBlock3">
                        <span>{{ $stage->value }}</span>
                    </div>
                </div>
                @endforeach
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
                        @foreach($startupList as $row)
                            <li><span></span>{{ $row->value }}</li>
                        @endforeach
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
                @foreach($packages as $package)
                    @if(!empty((array)$package->description))
                <div class="priceBlockItem">
                    <div class="priceItemHeader blueColor">
                        <h3>{{ $package->title }}</h3>
                        {{--<img src="images/rocketShadow.png" alt="icon">--}}
                    </div>
                    <div class="priceItemContent">
                        <ul class="priceItemList">
                            @foreach($package->description as $item)
                                @if(!empty($item))
                                    <li><span></span>{{ $item }}</li>
                                @endif
                            @endforeach
                        </ul>
                        <img src="images/decoration.png" alt="decoration">
                        <div class="countMatchWrapper">
                            <div class="count">
                                @if(count($package->addition))
                                    {{ $package->addition }}
                                @endif
                                {{ $package->price }}
                            </div>
                            <div class="match">гривен<br> в месяц</div>
                        </div>
                    </div>
                    <button class="buyThis">заказать</button>
                </div>
                    @endif
                @endforeach
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
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
            </ul>
        </div>
    @endif
    {!! Form::open(array('route' => 'buy_package', 'method' => 'POST')) !!}
        {!! Form::hidden('package_title', '', array('class' => 'hidden-title')) !!}
        {!! Form::text('client_name', '', array('placeholder' => 'Ваше имя', 'id' => 'client_name')) !!}
        {!! Form::tel('client_phone', '', array('placeholder' => 'Ваш телефон', 'id' => 'client_phone')) !!}
        {!! Form::submit('заказать') !!}
    {!! Form::close() !!}
</div>

<div class="thanksPopup">
    <button class="popupFormClose"></button>
    <span>Спасибо за заказ!</span>
</div>

<a href="#" id="back-top"></a>
@include('frontend.js')
<script type="text/javascript">
    $(document).ready(function () {
        if( $('#modal-success-message').is(':hidden') ){
            $('#modal-success-message').modal('show')
        }
    })
</script>
</body>
</html>
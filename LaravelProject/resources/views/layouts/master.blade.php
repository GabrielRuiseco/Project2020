<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>
        API
    </title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Files -->
    <link href="{{mix('css/app.css')}}" rel="stylesheet" />
    <link href="{{mix('css/custome.css')}}" rel="stylesheet" />


{{--    <!-- Google Tag Manager -->--}}
{{--    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':--}}
{{--                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],--}}
{{--            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=--}}
{{--            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);--}}
{{--        })(window,document,'script','dataLayer','GTM-NKDMSK6');</script>--}}
{{--    <!-- End Google Tag Manager -->--}}

</head>
<body class="">
{{--<!-- Google Tag Manager (noscript) -->--}}
{{--<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6"--}}
{{--                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>--}}
{{--<!-- End Google Tag Manager (noscript) -->--}}
<div class="wrapper ">

    <div class="sidebar" data-color="blue">
        <!--
            Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
        -->

        <div class="logo">
            <a href="/home" class="simple-text logo-mini">
                API
            </a>

            <a href="/home" class="simple-text logo-normal">
                CONSUME API
            </a>

        </div>

        <div class="sidebar-wrapper" id="sidebar-wrapper">

            <ul class="nav">

                <li>
                    <a href="/home">

                        <i class="now-ui-icons design_app"></i>

                        <p>Dashboard</p>
                    </a>
                </li>

                <li >
                    <a href="/adafruit">

                        <i class="now-ui-icons design_vector"></i>

                        <p>Adafruit</p>
                    </a>
                </li>

{{--                <li >--}}
{{--                    <a href="/home">--}}

{{--                        <i class="now-ui-icons location_map-big"></i>--}}

{{--                        <p>Maps</p>--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--                <li >--}}
{{--                    <a href="/home">--}}

{{--                        <i class="now-ui-icons ui-1_bell-53"></i>--}}

{{--                        <p>Notifications</p>--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--                <li >--}}
{{--                    <a href="/home">--}}

{{--                        <i class="now-ui-icons users_single-02"></i>--}}

{{--                        <p>User Profile</p>--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--                <li >--}}
{{--                    <a href="/home">--}}

{{--                        <i class="now-ui-icons design_bullet-list-67"></i>--}}

{{--                        <p>Table List</p>--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--                <li >--}}
{{--                    <a href="./typography.html">--}}

{{--                        <i class="now-ui-icons text_caps-small"></i>--}}

{{--                        <p>Typography</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
            </ul>
        </div>
    </div>


    <div class="main-panel" id="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <a class="navbar-brand" href="/home">Dashboard</a>
                </div>

                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    <ul class="navbar-nav">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->

        <div class="panel-header panel-header-lg">
            <div class="row">
                <div class="col-6 offset-1"><h1 class="text-white">Welcome to my api</h1></div>
            </div>
            <div class="row">
                <div class="col-8 offset-4">
                    <h1 class="text-white">used to consume Ipstack</h1>
                </div>
            </div>
        </div>

        <div class="content">
            @yield('content')
        </div>

        <footer class="footer" >
            <div class=" container-fluid ">
                <div class="copyright" id="copyright">
                    &copy; Universidad Tecnologica de Torreon
                </div>
            </div>
        </footer>
    </div>
</div>


<!--   Core JS Files   -->
<script src="{{mix('js/app.js')}}" ></script>
<script src="{{mix('js/custome.js')}}" ></script>





{{--<!--  Google Maps Plugin    -->--}}

{{--<script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGat1sgDZ-3y6fFe6HD7QUziVC6jlJNog"></script>--}}

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

{{--<script>--}}
{{--    $(document).ready(function(){--}}

{{--        $('#facebook').sharrre({--}}
{{--            share: {--}}
{{--                facebook: true--}}
{{--            },--}}
{{--            enableHover: false,--}}
{{--            enableTracking: false,--}}
{{--            enableCounter: false,--}}
{{--            click: function(api, options){--}}
{{--                api.simulateClick();--}}
{{--                api.openPopup('facebook');--}}
{{--            },--}}
{{--            template: '<i class="fab fa-facebook-f"></i> Facebook',--}}
{{--            url: 'https://demos.creative-tim.com/now-ui-dashboard/examples/homeboard.html'--}}
{{--        });--}}

{{--        $('#google').sharrre({--}}
{{--            share: {--}}
{{--                googlePlus: true--}}
{{--            },--}}
{{--            enableCounter: false,--}}
{{--            enableHover: false,--}}
{{--            enableTracking: true,--}}
{{--            click: function(api, options){--}}
{{--                api.simulateClick();--}}
{{--                api.openPopup('googlePlus');--}}
{{--            },--}}
{{--            template: '<i class="fab fa-google-plus"></i> Google',--}}
{{--            url: 'https://demos.creative-tim.com/now-ui-dashboard/examples/homeboard.html'--}}
{{--        });--}}

{{--        $('#twitter').sharrre({--}}
{{--            share: {--}}
{{--                twitter: true--}}
{{--            },--}}
{{--            enableHover: false,--}}
{{--            enableTracking: false,--}}
{{--            enableCounter: false,--}}
{{--            buttons: { twitter: {via: 'CreativeTim'}},--}}
{{--            click: function(api, options){--}}
{{--                api.simulateClick();--}}
{{--                api.openPopup('twitter');--}}
{{--            },--}}
{{--            template: '<i class="fab fa-twitter"></i> Twitter',--}}
{{--            url: 'https://demos.creative-tim.com/now-ui-dashboard/examples/homeboard.html'--}}
{{--        });--}}




{{--        // Facebook Pixel Code Don't Delete--}}
{{--        !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?--}}
{{--            n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;--}}
{{--            n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;--}}
{{--            t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,--}}
{{--            document,'script','//connect.facebook.net/en_US/fbevents.js');--}}

{{--        try{--}}
{{--            fbq('init', '111649226022273');--}}
{{--            fbq('track', "PageView");--}}

{{--        }catch(err) {--}}
{{--            console.log('Facebook Track Error:', err);--}}
{{--        }--}}

{{--    });--}}
{{--</script>--}}
{{--<noscript>--}}
{{--    <img height="1" width="1" style="display:none"--}}
{{--         src="https://www.facebook.com/tr?id=111649226022273&ev=PageView&noscript=1"--}}
{{--    />--}}

{{--</noscript>--}}

{{--<script>--}}
{{--    $(document).ready(function(){--}}
{{--        $().ready(function(){--}}
{{--            $sidebar = $('.sidebar');--}}
{{--            $sidebar_img_container = $sidebar.find('.sidebar-background');--}}

{{--            $full_page = $('.full-page');--}}

{{--            $sidebar_responsive = $('body > .navbar-collapse');--}}
{{--            sidebar_mini_active = true;--}}

{{--            window_width = $(window).width();--}}

{{--            fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();--}}

{{--            // if( window_width > 767 && fixed_plugin_open == 'Dashboard' ){--}}
{{--            //     if($('.fixed-plugin .dropdown').hasClass('show-dropdown')){--}}
{{--            //         $('.fixed-plugin .dropdown').addClass('show');--}}
{{--            //     }--}}
{{--            //--}}
{{--            // }--}}

{{--            $('.fixed-plugin a').click(function(event){--}}
{{--                // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active--}}
{{--                if($(this).hasClass('switch-trigger')){--}}
{{--                    if(event.stopPropagation){--}}
{{--                        event.stopPropagation();--}}
{{--                    }--}}
{{--                    else if(window.event){--}}
{{--                        window.event.cancelBubble = true;--}}
{{--                    }--}}
{{--                }--}}
{{--            });--}}

{{--            $('.fixed-plugin .background-color span').click(function(){--}}
{{--                $(this).siblings().removeClass('active');--}}
{{--                $(this).addClass('active');--}}

{{--                var new_color = $(this).data('color');--}}

{{--                if($sidebar.length != 0){--}}
{{--                    $sidebar.attr('data-color',new_color);--}}
{{--                }--}}

{{--                if($full_page.length != 0){--}}
{{--                    $full_page.attr('filter-color',new_color);--}}
{{--                }--}}

{{--                if($sidebar_responsive.length != 0){--}}
{{--                    $sidebar_responsive.attr('data-color',new_color);--}}
{{--                }--}}
{{--            });--}}

{{--            $('.fixed-plugin .img-holder').click(function(){--}}
{{--                $full_page_background = $('.full-page-background');--}}

{{--                $(this).parent('li').siblings().removeClass('active');--}}
{{--                $(this).parent('li').addClass('active');--}}


{{--                var new_image = $(this).find("img").attr('src');--}}

{{--                if( $sidebar_img_container.length !=0 && $('.switch-sidebar-image input:checked').length != 0 ){--}}
{{--                    $sidebar_img_container.fadeOut('fast', function(){--}}
{{--                        $sidebar_img_container.css('background-image','url("' + new_image + '")');--}}
{{--                        $sidebar_img_container.fadeIn('fast');--}}
{{--                    });--}}
{{--                }--}}

{{--                if($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0 ) {--}}
{{--                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');--}}

{{--                    $full_page_background.fadeOut('fast', function(){--}}
{{--                        $full_page_background.css('background-image','url("' + new_image_full_page + '")');--}}
{{--                        $full_page_background.fadeIn('fast');--}}
{{--                    });--}}
{{--                }--}}

{{--                if( $('.switch-sidebar-image input:checked').length == 0 ){--}}
{{--                    var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');--}}
{{--                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');--}}

{{--                    $sidebar_img_container.css('background-image','url("' + new_image + '")');--}}
{{--                    $full_page_background.css('background-image','url("' + new_image_full_page + '")');--}}
{{--                }--}}

{{--                if($sidebar_responsive.length != 0){--}}
{{--                    $sidebar_responsive.css('background-image','url("' + new_image + '")');--}}
{{--                }--}}
{{--            });--}}

{{--            $('.switch-sidebar-image input').on("switchChange.bootstrapSwitch", function(){--}}
{{--                $full_page_background = $('.full-page-background');--}}

{{--                $input = $(this);--}}

{{--                if($input.is(':checked')){--}}
{{--                    if($sidebar_img_container.length != 0){--}}
{{--                        $sidebar_img_container.fadeIn('fast');--}}
{{--                        $sidebar.attr('data-image','#');--}}
{{--                    }--}}

{{--                    if($full_page_background.length != 0){--}}
{{--                        $full_page_background.fadeIn('fast');--}}
{{--                        $full_page.attr('data-image','#');--}}
{{--                    }--}}

{{--                    background_image = true;--}}
{{--                } else {--}}
{{--                    if($sidebar_img_container.length != 0){--}}
{{--                        $sidebar.removeAttr('data-image');--}}
{{--                        $sidebar_img_container.fadeOut('fast');--}}
{{--                    }--}}

{{--                    if($full_page_background.length != 0){--}}
{{--                        $full_page.removeAttr('data-image','#');--}}
{{--                        $full_page_background.fadeOut('fast');--}}
{{--                    }--}}

{{--                    background_image = false;--}}
{{--                }--}}
{{--            });--}}

{{--            $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function(){--}}
{{--                var $btn = $(this);--}}

{{--                if(sidebar_mini_active == true){--}}
{{--                    $('body').removeClass('sidebar-mini');--}}
{{--                    sidebar_mini_active = false;--}}
{{--                    nowuiDashboard.showSidebarMessage('Sidebar mini deactivated...');--}}
{{--                }else{--}}
{{--                    $('body').addClass('sidebar-mini');--}}
{{--                    sidebar_mini_active = true;--}}
{{--                    nowuiDashboard.showSidebarMessage('Sidebar mini activated...');--}}
{{--                }--}}

{{--                // we simulate the window Resize so the charts will get updated in realtime.--}}
{{--                var simulateWindowResize = setInterval(function(){--}}
{{--                    window.dispatchEvent(new Event('resize'));--}}
{{--                },180);--}}

{{--                // we stop the simulation of Window Resize after the animations are completed--}}
{{--                setTimeout(function(){--}}
{{--                    clearInterval(simulateWindowResize);--}}
{{--                },1000);--}}
{{--            });--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}

{{--<script>--}}
{{--    $(document).ready(function(){--}}
{{--        // Javascript method's body can be found in assets/js/demos.js--}}
{{--        demo.initDashboardPageCharts();--}}

{{--    });--}}
{{--</script>--}}

</body>

</html>

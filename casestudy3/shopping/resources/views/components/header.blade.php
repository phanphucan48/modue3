<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> {{ getConfigValueFromSettingTable('phone_contact')    }}</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> {{ getConfigValueFromSettingTable('email')    }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav"  style="flex-direction: row">
                            <li><a href="{{ getConfigValueFromSettingTable('facebook_link')    }}"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="{{ getConfigValueFromSettingTable('linkendin_link')    }}"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-md-4 clearfix">
                    <div class="logo pull-left">
                        <a href="index.html"><img src="/eshopper/images/home/yourlogo.png" alt="" /></a>
                    </div>
                    <div class="btn-group pull-right clearfix">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                USA
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="">Canada</a></li>
                                <li><a href="">UK</a></li>
                            </ul>
                        </div>

                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                DOLLAR
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="">Canadian Dollar</a></li>
                                <li><a href="">Pound</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 clearfix">
                    <div class="shop-menu clearfix pull-right">
                        <ul class="nav navbar-nav" style="flex-direction: row">
                            <li><a href=""><i class="fa fa-user"></i> Account</a></li>
                            <li><a href=""><i class="fa fa-star"></i> Wishlist</a></li>
                            <li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                            <li><a href="{{ route('show_tocart') }}"><i class="fa fa-shopping-cart"></i>
                                    <span class="badge badge-danger">
                                    <?php if (isset($carts)) {
                                            echo count($carts);
                                        } else {
                                            echo "0";
                                        }
                                        ?>
                                    </span>
                                </a>
                            </li>
                            <li><a href="{{ route('login') }}"><i class="fa fa-lock"></i> Login</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>


@include('home.components.main_menu')

                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <form action="{{ route('search') }}" value="" method="get">

                            <input type="text" name="key" placeholder="Search"/>
                            <button class="fa fa-search" type="submit" style="width: 30px; height: 35px;"></button>
                        </form>
                        <p class="pull-left">Search {{ count($products) }}</p>

                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->

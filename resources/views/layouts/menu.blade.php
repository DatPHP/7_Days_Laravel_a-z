<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">All Laravel TEnv</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">Trang chủ</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Ví dụ <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/first-blade-example">Ví dụ Blade 1</a></li>
                        <li><a href="/second-blade-example">Ví dụ Blade 2</a></li>
                    </ul>
                </li>


                <li><a href="/contact">Liên hệ</a></li>
                @if(isset($user))
                    <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Xin chào {{ $user->name }} <span class="caret"></span></a>
                @else

                @endif
                @if(Session::has('login') && Session::get('login') == true)
                    <li><a href="/product">Product List </a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Xin chào {{ Session::get('name') }} <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li id="log"><a href="/logout">Đăng xuất</a></li>
                        </ul>
                    </li>
                @else
                    <li><a href="/register"> create Acount</a></li>
                    <li id="02"><a href="/login">Login</a></li>
                @endif
                <script>
                    $(document).ready(function () {
                        $("#log").click(function () {
                            $("#02").show();
                        })

                        $("#02").show();
                    })
                </script>

            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

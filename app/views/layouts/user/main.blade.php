<!DOCTYPE html>
<html lang="{{Config::get('app.locale')}}">
    @include('layouts.guest.head')
    <body>
        <div class="container-fluid">
            <div id="header">
                <div class="row">
                    <div class="col-md-12">
                        <h1>
                            {{HTML::image('http://gravatar.com/avatar/'.md5(strtolower(trim(Auth::user()->email))).'?s=60', 'avatar', array('class' => 'avatar'))}}
                            {{Auth::user()->name}}
                        </h1>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="@yield('projects-navbar')"><a href="{{URL::to('/')}}">{{trans('layout.projects')}}</a></li>
                            @if (Auth::user()->admin)
                                <li class="@yield('admin-navbar')">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{trans('layout.admin')}} <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{URL::action('AdminController@getCreateUser')}}">{{trans('layout.cnu')}}</a></li>
                                        <li><a href="{{URL::action('AdminController@getCreateProject')}}">{{trans('layout.cnp')}}</a></li>
                                        <li class="divider"></li>
                                        <li><a href="{{URL::action('AdminController@getUsersList')}}">{{trans('layout.users')}}</a></li>
                                    </ul>
                                </li>
                            @endif
                            <li class="@yield('user-navbar')">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{trans('layout.user')}} <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{URL::action('UserController@getLogout')}}">{{trans('layout.logout')}}</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                        <hr>
                    </div>
                </div>
            </div>
            <div id="content">
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </div>
        @include('layouts.guest.footer-includes')
    </body>
</html>

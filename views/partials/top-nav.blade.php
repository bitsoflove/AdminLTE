<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button" style="margin: 0;">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </a>

    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <?php if (is_module_enabled('Notification')): ?>
            @include('notification::partials.notifications')
            <?php endif; ?>
            <li><a href="{{ URL::to('/') }}" target="_blank"><i class="fa fa-eye"></i> {{trans('core::core.general.view website')}}</a></li>

                @if(!is_module_enabled('Site'))
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-flag"></i>
                            <span>
                                {{ LaravelLocalization::getCurrentLocaleName()  }}
                                <i class="caret"></i>
                            </span>
                        </a>


                        <ul class="dropdown-menu language-menu">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li class="{{ App::getLocale() == $localeCode ? 'active' : '' }}">
                                    <a rel="alternate" lang="{{$localeCode}}" href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">
                                        {!! $properties['native'] !!}
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                    </li>
                @endif


            <?php if (is_module_enabled('Site')): ?>
                @include('site::partials.dropdown')
            <?php endif; ?>



            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i>
                    <span>
                        <?php if ($user->present()->fullname() != ' '): ?>
                            <?= $user->present()->fullName(); ?>
                        <?php else: ?>
                            <em>{{trans('core::core.general.complete your profile')}}.</em>
                        <?php endif; ?>
                        <i class="caret"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header bg-light-blue">
                        <img src="{{ $user->present()->gravatar() }}" class="img-circle" alt="User Image" />
                        <p>
                            <?php if ($user->present()->fullname() != ' '): ?>
                                <?= $user->present()->fullname(); ?>
                            <?php else: ?>
                                <em>{{trans('core::core.general.complete your profile')}}.</em>
                            <?php endif; ?>
                        </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <a href="{{ URL::route('logout')  }}" class="btn btn-default btn-flat">
                            {{trans('core::core.general.sign out')}}
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

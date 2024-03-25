<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show" style="background: white;">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route('technical.home') }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="{{ route('technical.appointments.index') }}"
                class="c-sidebar-nav-link {{ request()->is('technical/appointments') || request()->is('technical/appointments/*') ? 'c-active' : '' }}">
                <i class="fa-fw far fa-clock c-sidebar-nav-icon">

                </i>
                {{ trans('cruds.appointment.title') }}
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="{{ route('technical.systemCalendar') }}"
                class="c-sidebar-nav-link {{ request()->is('technical/system-calendar') || request()->is('technical/system-calendar/*') ? 'c-active' : '' }}">
                <i class="c-sidebar-nav-icon fa-fw fas fa-calendar">

                </i>
                {{ trans('global.systemCalendar') }}
            </a>
        </li>
        @php($unread = \App\Models\QaTopic::unreadCount())
        <li class="c-sidebar-nav-item">
            <a href="{{ route('technical.messenger.index') }}"
                class="{{ request()->is('technical/messenger') || request()->is('technical/messenger/*') ? 'c-active' : '' }} c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fa-fw fa fa-envelope">

                </i>
                <span>{{ trans('global.messages') }}</span>
                @if ($unread > 0)
                    <strong>( {{ $unread }} )</strong>
                @endif

            </a>
        </li>
        @if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}"
                    href="{{ route('profile.password.edit') }}">
                    <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                    </i>
                    {{ trans('global.change_password') }}
                </a>
            </li>
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link"
                onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>

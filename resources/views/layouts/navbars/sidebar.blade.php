<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ __('') }}</a>
            <a href="#" class="simple-text logo-normal">{{ __('') }}</a>
        </div>
        <ul class="nav">
            <li @if ($page  == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <!-- <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                  <i class="fa fa-address-card" aria-hidden="true"></i>
                    <span class="nav-link-text" >{{ __('My Account') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li @if ($page == 'profile') class="active " @endif>
                            <a href="{{ route('profile.edit')  }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ __('Profile') }}</p>
                            </a>
                        </li>

                    </ul>
                </div>
            </li> -->
            @if(auth()->user()->hasRole('super_admin'))
            <li @if ($page == 'users') class="active " @endif>
                <a href="{{ route('user.index')  }}">
                    <i class="tim-icons icon-bullet-list-67"></i>
                    <p>{{ __('Admin Management') }}</p>
                </a>
            </li>

            <li @if ($page =='parking') class="active " @endif>
                <a href="{{ route('parking.index') }}">
                <i class='tim-icons icon-square-pin'></i>
                    <p>{{ __('Parking Management') }}</p>
                </a>
            </li>
              @endif
            <li @if ($page =='b') class="active " @endif>
                <a href="{{ route('booking.index') }}">
                    <i class="tim-icons icon-bus-front-12"></i>
                    <p>{{ __('Booking Management') }}</p>
                </a>
            </li>

            <li @if ($page == 'rtl') class="active " @endif>
                <a href="{{ route('dashboardrtl') }}">
                    <i class="tim-icons icon-world"></i>
                    <p>{{ __('Arabic') }}</p>
                </a>
            </li>


        </ul>
    </div>
</div>

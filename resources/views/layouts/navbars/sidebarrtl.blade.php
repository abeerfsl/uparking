<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ __('') }}</a>
            <a href="#" class="simple-text logo-normal">{{ __('') }}</a>
        </div>
        <ul class="nav">
            <li @if ($page  == 'dashboard') class="active " @endif>
                <a href="">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('الصفحة الرئيسيه') }}</p>
                </a>
            </li>
          
            @if(auth()->user()->hasRole('super_admin'))
            <li @if ($page == 'users') class="active " @endif>
                <a href="{{ route('userrtl.index')  }}">
                    <i class="tim-icons icon-bullet-list-67"></i>
                    <p>{{ __('إداره المسؤولين') }}</p>
                </a>
            </li>

            <li @if ($page =='parking') class="active " @endif>
                <a href="{{ route('parking.indexrtl') }}">
                    <i class="tim-icons icon-bus-front-12"></i>
                    <p>{{ __('مواقف السيارات') }}</p>
                </a>
            </li>
  @endif
            <li @if ($page == 'rtl') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-world"></i>
                    <p>{{ __('english languge') }}</p>
                </a>
            </li>


        </ul>
    </div>
</div>

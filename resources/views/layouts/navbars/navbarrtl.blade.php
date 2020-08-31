@auth()
    @include('layouts.navbars.navs.authrtl')
@endauth

@guest()
    @include('layouts.navbars.navs.guest')
@endguest

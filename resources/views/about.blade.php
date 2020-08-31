@extends('layouts.app', ['class' => 'login-page', 'page' => __('About'), 'contentClass' => 'login-page'])

@section('content')

    <!-- box login -->
    <div class="col-lg-8 col-md-6 ml-auto mr-auto">

            <div class="card card-login card-white">

                <div class="card-header">
                    <!-- <img src="{{ asset('black') }}/img/login.png" class="rounded mx-auto d-block" alt="" width="40%" height="60%"> -->
                    <h1 class="card-title text-center " style="color:gray;">{{ __(' Uparking') }} </h1>
                </div>
                <div class="card-body">
                    <p scope="col" class="text-light mb-4 text-center">
                        A system established in 2018 by 5 girls from Saudi Arabia and implemented in 2019-2020
                    </p>
                    <h5>To send them an {{trans('site.email')}} : <br/></h5>

                      <table class="table tablesorter "id="">
                      <thead class=" text-primary">
                        <tr>
                            <th scope="col" class="text-left ">{{ __('name') }}</th>
                            <th scope="col"class="text-left">{{ __('email') }}</th>
                        </tr>
                      </thead>
                    <tbody class="text-primary">
                           <tr>
              <th scope="col"class="text-left">Lama</th>
               <th scope="col"class="text-left">lamo_1417@hotmail.com</th>
                            </tr>
                                 <tr>
                <th scope="col"class="text-left">sahar</th>
                 <th scope="col"class="text-left">sahar_nollily@hotmail.com</th>
                                  </tr>
                                     <tr>
                <th scope="col"class="text-left">shroug</th>
               <th scope="col"class="text-left">shrougsalem@gmail.com</th>
                                    </tr>
                                       <tr>
                  <th scope="col"class="text-left">Abeer</th>
                 <th scope="col"class="text-left">Abeeralrashediii@gmail.com</th>
                                      </tr>
                                      <tr>
                 <th scope="col"class="text-left">ghayda</th>
                <th scope="col"class="text-left">ghyd.q@hotmail.com</th>
                                     </tr>
                      </tbody>
                      </table>
                </div>
                <div class="card-footer">

                </div>
            </div>

    </div>
@endsection

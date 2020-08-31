@extends('layouts.apprtl', ['page' => __('الملف الشخصي'), 'pageSlug' => 'profile'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"style="background-color: #000000;">
                    <h5 class="title text-right font-weight-bold  text-primary">{{ __('تعديل الملف الشخصي') }}</h5>
                </div>
                <form method="post" action="{{ route('profile.update') }}" autocomplete="off">
                    <div class="card-body">
                            @csrf
                            @method('put')

                            @include('alerts.success')

                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} text-right">
                                <label>{{ __('الاسم') }}</label>
                                <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}">
                                @include('alerts.feedback', ['field' => 'name'])
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} text-right">
                                <label>{{ __('عنوان البريد الكتروني') }}</label>
                                <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email address') }}" value="{{ old('email', auth()->user()->email) }}">
                                @include('alerts.feedback', ['field' => 'email'])
                            </div>
                    </div>
                    <div class="card-footer" style="background-color: #000000;">
                        <button type="submit" class="btn btn-fill btn-primary ">{{ __('حفظ التعديلات') }}</button>
                    </div>
                </form>
            </div>

            <div class="card">
                <div class="card-header"style="background-color: #000000;">
                    <h5 class="title text-right font-weight-bold  text-primary"">{{ __('الرقم السري') }}</h5>
                </div>
                <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
                    <div class="card-body">
                        @csrf
                        @method('put')

                        @include('alerts.success', ['key' => 'password_status'])

                        <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }} text-right">
                            <label>{{ __('الرقم السري الحالي') }}</label>
                            <input type="password" name="old_password" class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Current Password') }}" value="" required>
                            @include('alerts.feedback', ['field' => 'old_password'])
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }} text-right">
                            <label>{{ __('الرقم السري الجديد') }}</label>
                            <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" value="" required>
                            @include('alerts.feedback', ['field' => 'password'])
                        </div>
                        <div class="form-group text-right">
                            <label>{{ __('تأكيد الرقم السري الجديد') }}</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="{{ __('Confirm New Password') }}" value="" required>
                        </div>
                    </div>
                    <div class="card-footer"style="background-color: #000000;">
                        <button type="submit" class="btn btn-fill btn-primary text-right">{{ __('حفظ التعديلات') }}</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-user">
                <div class="card-body">
                    <p class="card-text">
                        <div class="author">
                            <div class="block block-one"></div>
                            <div class="block block-two"></div>
                            <div class="block block-three"></div>
                            <div class="block block-four"></div>
                            <a href="#">
                                <!--<img class="avatar" src="{{ asset('black') }}/img/anime6.jpg" alt="">-->
                                <h4 class="title">{{ auth()->user()->name }}</h4>
                            </a>
                            <p class="description">
                                {{ __('المسؤول') }}
                            </p>
                        </div>
                    </p>
                </div>

            </div>
        </div>
    </div>
@endsection

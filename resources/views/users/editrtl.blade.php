@extends('layouts.apprtl', ['page' => __('إدارة المسؤولين'), 'pageSlug' => 'users'])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                  <div class="card-header" style="background-color: #000000;">
                      <div class="row">
                          <div class="col-8">
                              <h2 class="card-title text-right font-weight-bold  text-primary">{{ __('المسؤولين') }}</h2>
                          </div>
                          @if(auth()->user()->hasRole('super_admin'))
                          <div class="col-4">
                              <a href="{{ route('userrtl.index') }}" class="btn btn-sm btn-primary">{{ __(' العودة الى الخلف') }}</a>
                          </div>
                          @endif
                      </div>
                  </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('userrtl.update', $user) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4  text-right">{{ __('بيانات المسؤول') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label  text-right" for="input-name">{{ __('الأسم') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', $user->name) }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label  text-right" for="input-email">{{ __('الإيميل') }}</label>
                                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', $user->email) }}" required>
                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label  text-right" for="input-password">{{ __('الرقم السري') }}</label>
                                    <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" value="">
                                    @include('alerts.feedback', ['field' => 'password'])
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label  text-right" for="input-password-confirmation">{{ __('تأكيد الرقم السري') }}</label>
                                    <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Confirm Password') }}" value="">
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('حفظ ') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

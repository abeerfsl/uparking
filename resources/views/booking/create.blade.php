@extends('layouts.app', ['page' => __('Booking Management'), 'pageSlug' => 'booking'])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header"style="background-color: #000000;">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Booking') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('booking.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('booking.store', $booking) }}" autocomplete="off">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('  Add Information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('date') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-date">{{ __('Date') }}</label>
                                    {{Form::date('date', \Carbon\Carbon::today(),['class' => 'form-control mb-2 mr-sm-2 mb-sm-0'])}}
                                </div>

                                <div class="form-group{{ $errors->has('start_time') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input">{{ __('start time') }}</label>
                              {{Form::time('start_time',
                              \Carbon\Carbon::now()->timezone('Europe/Brussels')->format('H:i:s'),['class' => 'form-control'])}}
                                     @include('alerts.feedback', ['field' => 'start_time'])
                                                              </div>

                                    <div class="form-group{{ $errors->has('end_time') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-time">{{ __('end time') }}</label>
                                    {{Form::time('end_time',
                                    \Carbon\Carbon::now()->timezone('Europe/Brussels')->format('H:i:s'),['class' => 'form-control'])}}
                                      @include('alerts.feedback', ['field' => 'end_time'])
                                    </div>
                                    <div class="form-group{{ $errors->has('plate_number') ? ' has-danger' : '' }}">
                                     <label class="form-control-label" for="input-password">{{ __('plate number') }}</label>
                                     <input type="text" name="plate_number" id="input-name"
                                     class="form-control form-control-alternativ
                                     e{{ $errors->has('plate_number') ? ' is-invalid' : '' }}"
                                     placeholder="{{ __('plate number') }}" value="" required>
                                 </div>
                                    <div class="form-group{{ $errors->has('username') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('username') }}</label>
                                        <input type="text" name="username" id="input-id"
                                        class="form-control form-control-alternativ
                                        e{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('username') }}" value="{{ old('username') }}" required>
                                        @include('alerts.feedback', ['field' => 'username'])
                                    </div>
                                    <div class="form-group{{ $errors->has('parking_id') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('parking id') }}</label>
                                        <input type="text" name="parking_id" id="input-id"
                                        class="form-control form-control-alternativ
                                        e{{ $errors->has('parking_id') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('parking id') }}" value="" required>
                                        @include('alerts.feedback', ['field' => 'parking_id'])
                                    </div>
                                    <div class="form-group{{ $errors->has('slot_number') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('slot number') }}</label>
                                        <input type="text" name="slot_number" id="input-name"
                                        class="form-control form-control-alternativ
                                        e{{ $errors->has('slot_number') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('slot number') }}" value="" required>
                                        @include('alerts.feedback', ['field' => 'slot_number'])
                                    </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

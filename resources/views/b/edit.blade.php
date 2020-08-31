@extends('layouts.app', ['page' => __('Booking Management'), 'pageSlug' => 'booking'])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header" style="background-color:b;">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('booking Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('booking.index') }}"
                                class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('booking.update', $booking->id) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('booking information') }}</h6>
                            <div class="pl-lg-4">

                              <div class="form-group{{ $errors->has('date') ? ' has-danger' : '' }}">
                                  <label class="form-control-label" for="input-date">{{ __('Date') }}</label>
                                  <input type="date" name="date" class="form-control"
                                  value="{{ \Carbon\Carbon::parse($booking->date)->format('Y-m-d')}}">
                              </div>

                              <div class="form-group{{ $errors->has('start_time') ? ' has-danger' : '' }}">
                              <label class="form-control-label" for="input">{{ __('start time') }}</label>
                              <input type="time" name="start_time" class="form-control"
                              value="{{ \Carbon\Carbon::parse($booking->start_time)->format('H:i:s')}}">
                                   @include('alerts.feedback', ['field' => 'start_time'])

                                                            </div>

                                  <div class="form-group{{ $errors->has('end_time') ? ' has-danger' : '' }}">
                                  <label class="form-control-label" for="input-time">{{ __('end time') }}</label>
                                  <input type="time" name="end_time" class="form-control"
                                  value="{{ \Carbon\Carbon::parse($booking->end_time)->format('H:i:s')}}">
                                    @include('alerts.feedback', ['field' => 'end_time'])
                                  </div>

                              <div class="form-group{{ $errors->has('plate_number') ? ' has-danger' : '' }}">
                               <label class="form-control-label" for="input-password">{{ __('plate number') }}</label>
                               <input type="text" name="plate_number" id="input-name"
                               class="form-control form-control-alternative
                               {{ $errors->has('plate_number') ? ' is-invalid' : '' }}"
                               placeholder="{{ __('plate number') }}" value="{{ $booking->plate_number }}" required>
                               @include('alerts.feedback', ['field' => 'plate_number'])
                           </div>

                           <div class="form-group{{ $errors->has('username') ? ' has-danger' : '' }}">
                               <label class="form-control-label" for="input-name">{{ __('username') }}</label>
                               <input type="text" name="username" id="input-id"
                               class="form-control form-control-alternativ
                               e{{ $errors->has('username') ? ' is-invalid' : '' }}"
                               placeholder="{{ __('username') }}" value="{{ $booking->username }}" readonly>
                               @include('alerts.feedback', ['field' => 'username'])
                           </div>

                           <div class="form-group{{ $errors->has('parking_id') ? ' has-danger' : '' }}">
                               <label class="form-control-label" for="input-name">{{ __('parking_id') }}</label>
                               <input type="text" name="parking_id" id="input-id"
                               class="form-control form-control-alternativ
                               e{{ $errors->has('parking_id') ? ' is-invalid' : '' }}"
                               placeholder="{{ __('parking_id') }}" value="{{ $booking->parking_id }}" readonly>
                               @include('alerts.feedback', ['field' => 'parking_id'])
                           </div>

                           <div class="form-group{{ $errors->has('slot_number') ? ' has-danger' : '' }}">
                               <label class="form-control-label" for="input-name">{{ __('slot number') }}</label>
                               <input type="text" name="slot_number" id="input-name"
                               class="form-control form-control-alternativ
                               e{{ $errors->has('slot_number') ? ' is-invalid' : '' }}"
                               placeholder="{{ __('slot number') }}" value="{{ old('slot_number', $booking->slot_number) }}" required>
                               @include('alerts.feedback', ['field' => 'slot_number'])
                           </div>




                                <div class="text-center">
                                    <button type="submit" class="btn btn-fill btn-primary">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

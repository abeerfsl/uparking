@extends('layouts.app', ['page' => __('parking Managements'), 'pageSlug' => 'parking'])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header"style="background-color: #000000;">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Parking Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('parking.index') }}"
                                class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('parking.update', $parking_lot) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('parking information') }}</h6>
                            <div class="pl-lg-4">
                              <div class="form-group{{ $errors->has('parking_name') ? ' has-danger' : '' }}">
                               <label class="form-control-label" for="input-parking_name">{{ __('parking_name') }}</label>
                               <input type="text" name="parking_name" id="input-parking_name"
                               class="form-control form-control-alternative
                               {{ $errors->has('parking_name') ? ' is-invalid' : '' }}"
                               placeholder="{{ __('parking_name') }}" value="{{ $parking_lot->parking_name }}" readonly>
                               @include('alerts.feedback', ['field' => 'parking_name'])
                              </div>
                              <div class="form-group{{ $errors->has('parking_location') ? ' has-danger' : '' }}">
                               <label class="form-control-label" for="input-parking_location">{{ __('parking_location') }}</label>
                               <input type="text" name="parking_location" id="input-parking_location"
                               class="form-control form-control-alternative
                               {{ $errors->has('parking_location') ? ' is-invalid' : '' }}"
                               placeholder="{{ __('parking_location') }}" value="{{ $parking_lot->parking_location }}" required>
                               @include('alerts.feedback', ['field' => 'parking_location'])
                              </div>
                              <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                               <label class="form-control-label" for="input-description">{{ __('description') }}</label>
                               <input type="text" name="description" id="input-description"
                               class="form-control form-control-alternative
                               {{ $errors->has('description') ? ' is-invalid' : '' }}"
                               placeholder="{{ __('description') }}" value="{{ $parking_lot->description }}" required>
                               @include('alerts.feedback', ['field' => 'description'])
                              </div>
                              <div class="form-group">
                               <label class="form-control-label" >{{ __('number of section') }}</label>
                               <input type="text" name="number_of_section" class="form-control"
                               value="{{ old('number_of_section', $parking_lot->number_of_section) }}" required >
                               @include('alerts.feedback', ['field' => 'number_of_section'])
                              </div>
                              <div class="form-group{{ $errors->has('parking_state') ? ' has-danger' : '' }}">
                               <label class="form-control-label" for="input-parking_state">{{ __('parking_state') }}</label>
                               <input type="text" name="parking_state" id="input-parking_state"
                               class="form-control form-control-alternative
                               {{ $errors->has('parking_state') ? ' is-invalid' : '' }}"
                               placeholder="{{ __('parking_state') }}" value="{{ $parking_lot->parking_state }}" required>
                               @include('alerts.feedback', ['field' => 'parking_state'])
                              </div>
                              <div class="form-group">
                               <label class="form-control-label" >{{ __('admin id') }}</label>
                               <input type="text" name="users_id"  class="form-control"
                               value="{{ old('users_id', $parking_lot->users_id) }}" readonly>
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

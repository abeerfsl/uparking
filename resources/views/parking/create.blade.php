@extends('layouts.app', ['page' => __('Parking Management'), 'pageSlug' => 'parking'])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header"style="background-color: #000000;">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Parking') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('parking.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('parking.store', $parking_lot ?? '') }}" autocomplete="off">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('  Add Information') }}</h6>
                            <div class="pl-lg-4">
                              <div class="form-group{{ $errors->has('parking_name') ? ' has-danger' : '' }}">
                                  <label class="form-control-label" for="input-name">{{ __('parking name') }}</label>
                                  <input type="text" name="parking_name" id="input-name"
                                  class="form-control form-control-alternativ
                                  e{{ $errors->has('parking_name') ? ' is-invalid' : '' }}"
                                  placeholder="{{ __('parking name') }}"  required>
                                  @include('alerts.feedback', ['field' => 'parking_name'])
                              </div>

                                    <div class="form-group{{ $errors->has('parking_location') ? ' has-danger' : '' }}">
                                     <label class="form-control-label" for="input-password">{{ __('parking location') }}</label>
                                     <input type="text" name="parking_location" id="input-name"
                                     class="form-control form-control-alternativ
                                     e{{ $errors->has('parking_location') ? ' is-invalid' : '' }}"
                                     placeholder="{{ __('parking location') }}" required>
                                 </div>

                                    <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('description') }}</label>
                                        <input type="text" name="description" id="input-id"
                                        class="form-control form-control-alternativ
                                        e{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('description') }}"  required>
                                        @include('alerts.feedback', ['field' => 'description'])
                                    </div>
                                    <div class="form-group{{ $errors->has('number_of_section') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('number of section') }}</label>
                                        <input type="text" name="number_of_section" id="input-id"
                                        class="form-control form-control-alternativ
                                        e{{ $errors->has('number_of_section') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('number of section') }}"  required>
                                        @include('alerts.feedback', ['field' => 'number_of_section'])
                                    </div>
                                    <div class="form-group{{ $errors->has('users_id') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('admin id') }}</label>
                                        <input type="text" name="users_id" id="input-name"
                                        class="form-control form-control-alternativ
                                        e{{ $errors->has('users_id') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('admin id') }}" value="" required>
                                        @include('alerts.feedback', ['field' => 'users_id'])
                                    </div>
                                    <!-- <div class="form-group{{ $errors->has('users_id') ? ' has-danger' : '' }}">
                                     <label class="form-control-label" for="input-name">{{ __('admin id') }}</label>
                                     <select name="myselect" id="input-name" class="form-control form-control-alternative{{ $errors->has('users_id') ? ' is-invalid' : '' }}"
                                    placeholder="{{ __('admin id') }}">
                                      @foreach ($user as $value)
                                      <option value="{{ $value->id}}" style="color:black;">{{ $value->name}}</option>
                                      @endforeach
                                   </select>
                                 </div> -->
                                 <div class="form-group{{ $errors->has('users_id') ? ' has-danger' : '' }}">
                                  <label class="form-control-label" for="input-name">{{ __('admin id') }}</label>
                                  <select name="myselect" id="input-name" class="form-control form-control-alternative{{ $errors->has('users_id') ? ' is-invalid' : '' }}"
                                 placeholder="{{ __('admin id') }}">
                                 @foreach($user as $user)
                                  <option value="{{ $user->id }}"
                                  @if ($user->id == old('myselect', $user->option))selected="selected"
                                  @endif
                                  style="color:black;">{{ $user->name }}
                                  </option> @endforeach
                                 </select>

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

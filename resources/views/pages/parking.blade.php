@extends('layouts.app', ['page' => __('Parking'), 'pageSlug' => 'parking'])
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card " style="background-color: black">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ __('Parking info') }}</h4>
                        </div>

                        @if(auth()->user()->hasRole('super_admin'))
                        <div class="col-4 text-right">
                            <a class="btn btn-sm btn-primary" href="{{ route('pdfview',['download'=>'pdf']) }}" target="_blank" >
                              <i class="fa fa-print fa-1x" ></i>
                            </a>
                        </div>
                            @endif
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')
                      <div class="table-responsive">
                        <table class="table tablesorter "id="">
                        <thead class=" text-primary">
                          <tr>
                              <th scope="col" class="text-center">{{ __('ID') }}</th>
                              <th scope="col"class="text-center">{{ __('Parking Name') }}</th>
                              <th scope="col"class="text-center">{{ __('Parking Location') }}</th>
                              <th scope="col"class="text-center">{{ __('description') }}</th>
                              <th scope="col"class="text-center">{{ __('number of section') }}</th>
                              <th scope="col"class="text-center">{{ __('AdminId') }}</th>
                          </tr>
                        </thead>
                      <tbody class="text-primary">

                          @foreach ($parking_lot as $parking_lot)
                                @if (auth()->user()->id == $parking_lot->users_id || auth()->user()->hasRole('super_admin') )
                              <tr>
                              <th scope="col"class="text-center">{{ $parking_lot->id }}</th>
                              <th scope="col"class="text-center">{{ $parking_lot->parking_name }}</th>
                              <th scope="col"class="text-center">Mecca ,Saudi Arabia </th>
                              <th scope="col"class="text-center">{{ $parking_lot->description }}</th>
                              <th scope="col"class="text-center">{{ $parking_lot->number_of_section }}</th>
                              <th scope="col"class="text-center">{{ $parking_lot->users_id }}</th>
                              </tr>
                              @endif
                          @endforeach
                        </tbody>
                        </table>
                      </div>
                </div>
              </div>

        </div>
    </div>
@endsection

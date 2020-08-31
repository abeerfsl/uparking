@extends('layouts.app',['page' => __('booking Management'), 'pageSlug' => 'booking'])
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card " style="background-color: black">
                <div class="card-header">
                  <div class="row">
                  <div class="col-8">
                      <h4 class="card-title">{{ __('Booking Informations') }}</h4>
                  </div>
                  @if(auth()->user()->hasRole('sup_admin'))
                  <div class="col-4 text-right">
                      <a class="btn btn-sm btn-primary" href="{{ route('pdfbooking',['download'=>'pdf']) }}" target="_blank" >
                        <i class="fa fa-print fa-1x" ></i>
                      </a>
                  </div>
                  @endif

                </div>
              </div>
                <div class="card-body">
                  @include('alerts.success')
                  <div class="">
                      <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                            <th scope="col" class="text-center">{{ __('Date') }}</th>
                            <th scope="col" class="text-center">{{ __('Start time') }}</th>
                            <th scope="col" class="text-center">{{ __('End time') }}</th>
                            <th scope="col" class="text-center">{{ __('Plate num') }}</th>
                            <th scope="col" class="text-center">{{ __('Booking state') }}</th>
                            <th scope="col" class="text-center">{{ __('Slot num') }}</th>
                        </thead>
                          <tbody>

                              @foreach ($booking as $booking)

                              <tr>
                                  <td scope="col" class="text-center">{{ $booking->date->format('y-m-d') }}</td>
                                  <td scope="col" class="text-center">{{ Carbon\Carbon::parse($booking->start_time)->format('H:i:s') }}</td>
                                  <td scope="col" class="text-center">{{ Carbon\Carbon::parse($booking->end_time)->format('H:i:s') }}</td>
                                  <td scope="col" class="text-center">{{ $booking->plate_number }}</td>
                                  <td scope="col" class="text-center">{{ $booking->booking_state }}</td>
                                  <td scope="col" class="text-center">{{ $booking->slot_number }}</td>
                                  <td class="text-right">
                                          <div class="dropdown">
                                              <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  <i class="fas fa-ellipsis-v"></i>
                                              </a>
                                              <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <form action="{{ route('booking.destroy', $booking) }}" method="post">

                                                        @csrf
                                                        @method('delete')

                                                        <a class="dropdown-item" href="{{ route('booking.edit', $booking) }}"> <i class="tim-icons icon-pencil"></i>{{ __('Edit') }}</a>
                                                        <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this booking?") }}') ? this.parentElement.submit() : ''">
                                                                <i class="tim-icons icon-trash-simple"></i> {{ __('Delete') }}
                                                        </button>
                                                    </form>
                                              </div>
                                          </div>
                                  </td>
                                  </tr>
                              @endforeach
                          </tbody>
                      </table>
                    </div>
                  </div>
                <div class="card-footer py-4">
                  <nav class="d-flex justify-content-end" aria-label="...">

                  </nav>
                </div>
        </div>
    </div>
  </div>
@endsection

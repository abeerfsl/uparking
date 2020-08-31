@extends('layouts.apprtl', ['page' => __('إدارة مواقف السيارات'), 'pageSlug' => 'parking'])
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="card " style="background-color: black">
                <div class="card-header">
                    <div class="row">
                        <div class="col-4">
                            <h4 class="card-title">{{ __('بيانات الموقف ') }}</h4>
                        </div>

                        @if(auth()->user()->hasRole('super_admin'))
                        <div class="col-4 text-right">
                            <a class="btn btn-sm btn-primary" href="{{ route('pdfview',['download'=>'pdf']) }}" target="_blank" >
                              <i class="fa fa-print fa-1x" ></i>

                            </a>
                            <a href="{{ route('parking.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i>
                              {{ __('Parking') }}
                            </a>
                        </div>
                            @endif
                            <!-- search icons -->
                              <div class="col-4 text-right">
                                <form class="" action="/search" method="get">
                                    <input class="form-control" id="myInput" type="text" placeholder="Search..">

                                </form>
                               </div>
                          <!-- end search -->
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')
                      <div class="table-responsive-sm">
                        <table class="table tablesorter "id="">
                        <thead class=" text-primary">
                          <tr>
                            <th scope="col" class="text-center">{{ __('رقم التعريف') }}</th>
                            <th scope="col"class="text-center">{{ __('اسم المنظمه') }}</th>
                            <th scope="col"class="text-center">{{ __('موقع المنظمه') }}</th>
                            <th scope="col"class="text-center">{{ __('الوصف') }}</th>
                            <th scope="col"class="text-center">{{ __('عدد الأقسام') }}</th>
                            <th scope="col"class="text-center">{{ __('المسؤول') }}</th>
                          </tr>
                        </thead>
                      <tbody class="text-primary" id="myTable">

                          @foreach ($parking_lot as $parking_lots)
                                @if (auth()->user()->id == $parking_lots->users_id || auth()->user()->hasRole('super_admin') )
                              <tr>
                              <th scope="col"class="text-center">{{ $parking_lots->id }}</th>
                              <th scope="col"class="text-center">{{ $parking_lots->parking_name }}</th>
                              <th scope="col"class="text-center">{{ $parking_lots->parking_location }}</th>
                              <th scope="col"class="text-center">{{ $parking_lots->description }}</th>
                              <th scope="col"class="text-center">{{ $parking_lots->number_of_section }}</th>
                              <th scope="col"class="text-center">{{ $parking_lots->name }}</th>
                              <td class=" text-center">
                                 @if($parking_lots->parking_state == 0)
                              <span style="font-size: 2em; color:#03a369;"><i class="fa fa-check-circle" aria-hidden="true"></i></span>
                                 @else
                              <span style="font-size: 2em; color: Tomato;"><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                 @endif
                              </td>
                              <th class="text-right">
                                      <div class="dropdown">
                                          <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="fas fa-ellipsis-v"></i>
                                          </a>
                                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <form action="{{ route('parking.destroy', $parking_lots->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a class="dropdown-item" href="{{ route('parking.edit', $parking_lots) }}">
                                                      <i class="tim-icons icon-pencil"></i>{{ __('Edit') }}</a>
                                                         @if($parking_lots->parking_state == 0)
                                                    <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this parking?") }}') ? this.parentElement.submit() : ''">
                                                            <i class="tim-icons icon-trash-simple"></i> {{ __('Deactivated') }}
                                                    </button>
                                                    @else
                                                    <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this parking?") }}') ? this.parentElement.submit() : ''" disabled>
                                                            <i class="tim-icons icon-trash-simple"></i> {{ __('Deactivated') }}
                                                    </button>

                                                    @endif
                                                </form>
                                          </div>
                                      </div>
                              </th>
                            </tr>
                              @endif
                          @endforeach
                        </tbody>
                        </table>
                      </div>
                </div>
                <div class="card-footer py-4"style="background-color: #000000;">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        {{ $parking_lot->links() }}
                    </nav>
                </div>
              </div>

        </div>
    </div>

    <script>
    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
    </script>

@endsection

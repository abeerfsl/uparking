@extends('layouts.app', ['page' => __('User Management'), 'pageSlug' => 'users'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header" style="background-color: #000000;">
                    <div class="row">
                        <div class="col-4">
                            <h4 class="card-title">{{ __('Administrators') }}</h4>
                        </div>
                        @if(auth()->user()->hasRole('super_admin'))
                        <div class="col-4 text-right">
                            <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">{{ __('') }}
                                <i class="fas fa-user-plus"></i>
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
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col"class=" text-center" >{{ __('Name') }}</th>
                                <th scope="col"class=" text-center">{{ __('Email') }}</th>
                                <th scope="col"class=" text-center">{{ __('Creation Date') }}</th>
                                <th scope="col"class=" text-center">{{ __('State Account') }}</th>
                                <th scope="col"class=" text-center"></th>
                            </thead>
                            <tbody id="myTable" >
                                @foreach ($users as $user)
                                    <tr>
                                        <th class=" text-center">{{ $user->name }}</th>
                                        <th class=" text-center"><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></th>
                                        <th class=" text-center">{{ $user->created_at }}</th>
                                          <th class=" text-center">
                                             @if($user->isBan == 0)
                                          <span style="font-size: 2em; color:#03a369;"><i class="fa fa-check-circle" aria-hidden="true"></i></span>
                                             @else
                                          <span style="font-size: 2em; color: Tomato;"><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                             @endif
                                          </th>

                                        @if(auth()->user()->hasRole('super_admin'))
                                        <th class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        @if (auth()->user()->id != $user->id)
                                                            <form action="{{ route('user.destroy', $user) }}" method="post">
                                                                @csrf
                                                                @method('delete')

                                                                <a class="dropdown-item" href="{{ route('user.edit', $user) }}"> <i class="tim-icons icon-pencil"></i>{{ __('Edit') }}</a>
                                                                @if($user->isBan == 0)
                                                                <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                                                            <i class="tim-icons icon-trash-simple"></i>   {{ __('deactivated') }}
                                                                </button>
                                                                @else
                                                                <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''"disabled>
                                                                            <i class="tim-icons icon-trash-simple"></i>   {{ __('deactivated') }}
                                                                </button>
                                                                @endif

                                                            </form>
                                                        @else
                                                            <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Edit') }}</a>
                                                        @endif
                                                    </div>
                                                </div>
                                        </th>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4"style="background-color: #000000;">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        {{ $users->links() }}
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

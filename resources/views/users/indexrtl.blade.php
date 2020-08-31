@extends('layouts.apprtl', ['page' => __('إدارة المسؤولين'), 'pageSlug' => 'usersrtl'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header" style="background-color: #000000;">
                    <div class="row">
                        <div class="col-8">
                            <h2 class="card-title text-right font-weight-bold  text-primary">{{ __('المسؤولين') }}</h2>
                        </div>
                        @if(auth()->user()->hasRole('super_admin'))
                        <div class="col-4">
                            <a href="" class="btn btn-sm btn-primary font-weight-bold">{{ __(' إضافة مسؤول') }}</a>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col"class="text-center">{{ __('الأسم') }}</th>
                                <th scope="col"class="text-center">{{ __('الإيميل') }}</th>
                                <th scope="col"class="text-center">{{ __('تاريخ الإضافه') }}</th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="text-center">{{ $user->name }}</td>
                                        <td class="text-center">
                                            <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                        </td>
                                        <td class="text-center">{{ $user->created_at }}</td>

                                        @if(auth()->user()->hasRole('super_admin'))
                                        <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow">
                                                        @if (auth()->user()->id != $user->id)
                                                            <form action="{{ route('userrtl.destroy', $user) }}" method="post">
                                                                @csrf
                                                                @method('delete')

                                                                <a class="dropdown-item" href=""> <i class="tim-icons icon-pencil"></i>{{ __('Edit') }}</a>
                                                                <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                                                            <i class="tim-icons icon-trash-simple"></i>   {{ __('Delete') }}
                                                                </button>
                                                            </form>
                                                        @else
                                                            <a class="dropdown-item" href="{{ route('profile.editrtl') }}">{{ __('Edit') }}</a>
                                                        @endif
                                                    </div>
                                                </div>
                                        </td>
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
@endsection

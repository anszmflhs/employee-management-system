@extends('layouts.master')
@push('css')
    <!-- Custom styles for this page -->
    <link href="{{ asset('sbadmin/vendor/select2/select2.min.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="container-fluid">


        <h1 class="h3 mb-2 text-gray-800">Role-Permission</h1>


        <div class="card shadow mb-4">

            <div class="card-body">
                <form method="POST" action="{{ route('role-permission.store', $role->id) }}">
                    @csrf
                    <div class="form-group select2-purple">
                        <label>Permissions:</label>
                        <select class="select2" name="permission[]" multiple="multiple"
                            data-dropdown-css-class="select2-purple" data-placeholder="Select a Permissions"
                            style="width: 100%;">
                            @foreach ($permissions as $row)
                                @if ($role->hasAnyPermission($row->name))
                                    <option selected="" value="{{ $row->id }}">{{ $row->name }}</option>
                                @else
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save fa-fw"></i> SIMPAN
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection

@push('js')
    <!-- Page level plugins -->
    <script src="{{ asset('sbadmin/vendor/select2/select2.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script>
        $('.select2').select2()
    </script>
@endpush

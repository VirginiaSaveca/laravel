@extends('layouts.dashboard')

@section('PHP')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Employee</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('employees.index') }}">Employees</a></li>
                        <li class="breadcrumb-item">Create</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </div>
            </div>

            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create Employee</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('employees.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="first_name">First Name<span class="text-red">*</span></label>
                                        <input required type="text" name="first_name"
                                            class="form-control
                                        @error('first_name') is-invalid @enderror"
                                            value="{{ old('first_name') }}">
                                        @error('first_name')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="last_name">Last Name<span class="text-red">*</span></label>
                                        <input required type="text" name="last_name"
                                            class="form-control
                                        @error('last_name') is-invalid @enderror"
                                            value="{{ old('last_name') }}">
                                        @error('last_name')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email address<span class="text-red">*</span></label>
                                        <input required type="email" name="email"
                                            class="form-control
                                        @error('email') is-invalid @enderror"
                                            value="{{ old('email') }}">
                                        @error('email')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="phone_number">Phone Number<span class="text-red">*</span></label>
                                        <input required type="tel" name="phone_number"
                                            class="form-control
                                        @error('phone_number') is-invalid @enderror"
                                            value="{{ old('phone_number') }}">
                                        @error('phone_number')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="date_of_birth">Date Of Birth<span class="text-red">*</span></label>
                                        <input required type="date" name="date_of_birth"
                                            class="form-control
                                        @error('date_of_birth') is-invalid @enderror"
                                            value="{{ old('date_of_birth') }}">
                                        @error('date_of_birth')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <label for="gender">Gender<span class="text-red">*</span></label>
                                        <select required name="gender"
                                            class="form-control
                                        @error('gender') is-invalid @enderror">
                                            <option value=""></option>
                                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male
                                            </option>
                                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female
                                            </option>
                                            <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other
                                            </option>
                                        </select>
                                        @error('gender')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="address">Address<span class="text-red">*</span></label>
                                        <input required type="text" name="address"
                                            class="form-control
                                        @error('address') is-invalid @enderror"
                                            value="{{ old('address') }}">
                                        @error('address')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="salary">Salary<span class="text-red">*</span></label>
                                        <input required type="number" name="salary"
                                            class="form-control
                                        @error('salary') is-invalid @enderror"
                                            value="{{ old('salary') }}">
                                        @error('salary')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>

                                    </div>
                                </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">

                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

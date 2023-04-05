@extends('layouts.backend')
@section('title', 'Admin - Settings')
@section('header', 'Settings')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @elseif($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="content-body">
        <section>
            <div class="row">
                <!-- left menu section -->
                <div class="col-md-3 mb-2 mb-md-0">
                    <ul class="nav nav-pills flex-column mt-md-0 mt-1">

                        <li class="nav-item">
                            <a class="nav-link d-flex py-75" id="pill-bank" data-toggle="pill" href="#vertical-bank"
                                aria-expanded="false">
                                <i class="feather icon-credit-card mr-50 font-medium-3"></i>
                                Data Bank
                            </a>
                        </li>

                    </ul>
                </div>
                <!-- right content section -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="tab-content">

                                    <div class="tab-pane active" id="vertical-bank" role="tabpanel"
                                        aria-labelledby="pill-bank" aria-expanded="false">
                                        <form action="" method="post">
                                            @csrf
                                            <div class="row">
                                                @if (Auth::User()->bank == null)
                                                    <div class="col-md-4">
                                                        <a data-toggle="modal" data-target="#addpayment">
                                                            <div class="card bg-primary">
                                                                <div class="card-body">
                                                                    <div class="card-title text-white">
                                                                        Tambah Akun Bank
                                                                    </div>
                                                                    <div class="text-center text-white">
                                                                        <i class="feather icon-plus"></i>
                                                                    </div> <br>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @else
                                                    @foreach ($databank as $bank)
                                                        <div class="col-md-4">
                                                            <a data-toggle="modal" data-target="#editpayment">
                                                                <div class="card bg-danger">
                                                                    <div class="card-body text-center">
                                                                        <div class="card-title text-white">
                                                                            {{ $bank->nama_bank }}
                                                                        </div>
                                                                        <span
                                                                            class="text-white">{{ $bank->no_rekening }}</span>
                                                                        <br>
                                                                        <small
                                                                            class="text-white">{{ $bank->nama_pemilik }}</small>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    @endforeach

                                                    <div class="col-md-4">
                                                        <a data-toggle="modal" data-target="#addpayment">
                                                            <div class="card bg-primary">
                                                                <div class="card-body">
                                                                    <div class="card-title text-white">
                                                                        Tambah Akun Bank
                                                                    </div>
                                                                    <div class="text-center text-white">
                                                                        <i class="feather icon-plus"></i>
                                                                    </div> <br>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endif

                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('modul_admin.setting.modal')
    </div>
@endsection
@section('scripts')
    <script>
        @if (count($errors) > 0)
            $(function() {
                $('#addpayment').modal('show');
            });
        @endif
    </script>
@endsection

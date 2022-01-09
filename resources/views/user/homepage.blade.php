@extends('user.layouts.master')
@section('title', 'Anasayfa')
@section('content')

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Hoş geldiniz, Sn. {{\Illuminate\Support\Facades\Auth::user()->nameSurname}}</h1>
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <h5 class="card-title">Kocaeli Üniversitesi Öğrenci Başvuru Portalı</h5>

                                <p class="card-text">
                                    Sol taraftaki bulunan menüden başvuru yapabilir veya mevcut başvurularınızın durumunu sorgulayabilirsiniz.
                                </p>

                            </div>
                        </div><!-- /.card -->

                    <!-- /.col-md-6 -->

                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
@endsection

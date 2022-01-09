@extends('admin.layouts.master')
@section('title', 'Anasayfa')
@section('content')

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Hoş geldiniz, Sn. {{\Illuminate\Support\Facades\Auth::guard('web_admin')->user()->nameSurname}}</h1>
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
                                <h5 class="card-title">Kocaeli Üniversitesi Başvuru Yönetim Portalı</h5>

                                <p class="card-text">
                                    Sol taraftaki bulunan menüden başvuruları inceleyebilir ve onaylayabilirsiniz.
                                </p>

                            </div>
                        </div><!-- /.card -->

                        <div class="row">
                            <div class="col-lg-4 col-6">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>{{$statistics['awaitingApplication']}}</h3>

                                        <p>Onay Bekleyen Başvuru Sayısı</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="{{route('panel.awaiting')}}" class="small-box-footer">Detaylı Bilgi <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-4 col-6">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>{{$statistics['totalApplication']}}</h3>

                                        <p>Tüm Başvurular</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a href="{{route('panel.all.applications')}}" class="small-box-footer">Detaylı Bilgi <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-4 col-6">
                                <!-- small box -->
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3>{{$statistics['userCount']}}</h3>

                                        <p>Sisteme Kayıtlı Kullanıcı Sayısı</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                    <a href="{{route('panel.all.users')}}" class="small-box-footer">Detaylı Bilgi <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <!-- ./col -->
                        </div>
                    <!-- /.col-md-6 -->

                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
@endsection

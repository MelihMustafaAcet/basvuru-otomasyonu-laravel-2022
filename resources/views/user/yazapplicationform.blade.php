@extends('user.layouts.master')
@section('title', 'Yaz Okulu Başvuru Formu')
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

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Yaz Okulu Başvuru Formu</h3>
                            </div>

                            @if (isset($errors) && count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                        @endif
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{route('student.yaz.application.action')}}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Danışman Ad Soyad</label>
                                        <input type="text" required name="teacher" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Yaz Okulu Yapılacak Üniversite</label>
                                        <input type="text" required name="university" class="form-control">
                                    </div>

                                    <div class="alert alert-info alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h5><i class="icon fas fa-info"></i> Uyarı!</h5>
                                        En az 1, en çok 3 ders tercihinde bulunabilirsiniz.
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Sorumlu Olunan Ders</label>
                                                <input type="text" name="kou_1" class="form-control" required placeholder="Kocaeli Üniversitesi bünyesinde aldığınız ders adını giriniz.">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Yaz Okulunda Alınacak Ders</label>
                                                <input type="text" name="university_1" class="form-control" required placeholder="Yaz okulu kapsamında alınacak ders adını giriniz.">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Sorumlu Olunan Ders</label>
                                                <input type="text" name="kou_2" class="form-control" placeholder="Kocaeli Üniversitesi bünyesinde aldığınız ders adını giriniz.">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Yaz Okulunda Alınacak Ders</label>
                                                <input type="text" name="university_2" class="form-control" placeholder="Yaz okulu kapsamında alınacak ders adını giriniz.">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Sorumlu Olunan Ders</label>
                                                <input type="text" name="kou_3" class="form-control"  placeholder="Kocaeli Üniversitesi bünyesinde aldığınız ders adını giriniz.">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Yaz Okulunda Alınacak Ders</label>
                                                <input type="text" name="university_3" class="form-control" placeholder="Yaz okulu kapsamında alınacak ders adını giriniz.">
                                            </div>
                                        </div>
                                    </div>




                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Başvur</button>
                                </div>
                            </form>
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

@extends('user.layouts.master')
@section('title', 'ÇAP Başvuru Formu')
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
                                <h3 class="card-title">Çift Anadal Başvuru Formu</h3>
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
                            <form action="{{route('student.cap.application.action')}}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Okuduğu Dönem Sayısı(Hazırlık Hariç)</label>
                                        <input type="text" required name="studiedPeriod" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Genel Not Ortalaması</label>
                                        <input type="text" required name="gpa" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Sınıf Başarı Yüzdesi</label>
                                        <input type="text" required name="classSuccessPercentage" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Başvuru Yapılan Dönem</label>
                                        <select name="semester" required class="form-control">
                                            <option value="2">2.Yarıyıl</option>
                                            <option value="3">3.Yarıyıl</option>
                                        </select>
                                    </div>

                                    <div class="alert alert-info alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h5><i class="icon fas fa-info"></i> Uyarı!</h5>
                                        En az 1, en çok 3 bölüm tercihinde bulunabilirsiniz.
                                    </div>

                                    <div class="form-group">
                                        <label>1. Tercih</label>
                                        <select name="option1" required class="form-control">
                                            @foreach($sections as $item)
                                                <option value="{{$item->sectionName}}">{{$item->sectionName}}</option>
                                            @endforeach
                                        </select>

                                        <label>2. Tercih</label>
                                        <select name="option2" class="form-control">
                                            <option value="unselected" selected>Seçiniz</option>
                                            @foreach($sections as $item)
                                                <option value="{{$item->sectionName}}">{{$item->sectionName}}</option>
                                            @endforeach
                                        </select>

                                        <label>3. Tercih</label>
                                        <select name="option3" class="form-control">
                                            <option value="unselected" selected>Seçiniz</option>
                                            @foreach($sections as $item)
                                                <option value="{{$item->sectionName}}">{{$item->sectionName}}</option>
                                            @endforeach
                                        </select>
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

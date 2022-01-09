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

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">ÇAP Başvurularım</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @if(count($capApplications) != 0)
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Başvuru Tarihi</th>
                                        <th>Öğrenci Numarası</th>
                                        <th>Öğrenci Adı</th>
                                        <th>Belge Görüntüle</th>
                                        <th>Onay Durumu</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($capApplications as $item)
                                    <tr>
                                        <td>{{$item->created_at}}</td>
                                        <td>{{$item->studentNumber}}</td>
                                        <td>{{$item->nameSurname}}</td>
                                        <td><a href="{{ asset('storage/file/' . $item->file)}}"  target="_blank"> Görüntüle </a> </td>
                                        <td><a href="{{route('panel.application.update', ['type' => 'cap', 'studentId' => $item->studentId, 'applicationId' => $item->applicationId, 'status' => 1])}}">Onayla</a> /
                                            <a href="{{route('panel.application.update', ['type' => 'cap', 'studentId' => $item->studentId, 'applicationId' => $item->applicationId])}}">Reddet</a></td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Başvuru Tarihi</th>
                                        <th>Öğrenci Numarası</th>
                                        <th>Öğrenci Adı</th>
                                        <th>Belge Görüntüle</th>
                                        <th>Onay Durumu</th>
                                    </tr>
                                    </tfoot>
                                </table>
                                @else
                                    <div class="callout callout-info">
                                        <h5>Başvuru bulunamadı!</h5>

                                        <p>Henüz bir başvurunuz bulunmuyor.</p>
                                    </div>
                                    @endif
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Yaz Okulu Başvurularım</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @if(count($yazApplications) != 0)
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Başvuru Tarihi</th>
                                            <th>Öğrenci Numarası</th>
                                            <th>Öğrenci Adı</th>
                                            <th>Belge Görüntüle</th>
                                            <th>Onay Durumu</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($yazApplications as $item)
                                            <tr>
                                                <td>{{$item->created_at}}</td>
                                                <td>{{$item->studentNumber}}</td>
                                                <td>{{$item->nameSurname}}</td>
                                                <td><a href="{{ asset('storage/file/' . $item->file)}}"  target="_blank"> Görüntüle </a> </td>
                                                <td><a href="{{route('panel.application.update', ['type' => 'yaz', 'studentId' => $item->studentId, 'applicationId' => $item->applicationId, 'status' => 1])}}">Onayla</a> /
                                                    <a href="{{route('panel.application.update', ['type' => 'yaz', 'studentId' => $item->studentId, 'applicationId' => $item->applicationId])}}">Reddet</a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Başvuru Tarihi</th>
                                            <th>Öğrenci Numarası</th>
                                            <th>Öğrenci Adı</th>
                                            <th>Belge Görüntüle</th>
                                            <th>Onay Durumu</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                @else
                                    <div class="callout callout-info">
                                        <h5>Başvuru bulunamadı!</h5>

                                        <p>Henüz bir başvurunuz bulunmuyor.</p>
                                    </div>
                            @endif
                            <!-- /.card-body -->
                            </div>
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

@section('scripts')
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection

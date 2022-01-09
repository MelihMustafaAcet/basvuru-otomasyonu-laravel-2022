@extends('user.layouts.master')
@section('title', 'Başvurularım')
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

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">ÇAP Başvurularım</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @if(count($cap) != 0)
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Başvuru Tarihi</th>
                                        <th>Onay Durumu</th>
                                        <th>Belge Gönder</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cap as $item)
                                    <tr>
                                        <td>{{$item->created_at}}</td>
                                        @if(!$item->isConfirmed && $item->isDraft)
                                        <td>Dosya Bekleniyor</td>
                                        @elseif(!$item->isConfirmed && !$item->isDraft && $item->file != null)
                                            <td>Onay Bekliyor</td>
                                        @elseif($item->isConfirmed == -1)
                                            <td>Reddedildi</td>
                                        @else
                                            <td>Onaylandı</td>
                                        @endif
                                        @if($item->file == null)
                                        <td><a href="javascript: void(0)" onclick="window.open('{{route('student.cap.upload', ['studentId' => $item->studentId, 'applicationId' => $item->id])}}','_blank','width=900,height=300');">Belge Yükle</a>
                                            / <a href="{{route('student.cap.application.preview', ['studentId' => $item->studentId, 'applicationId' => $item->id])}}">Belge İndir</a></td>
                                        @else
                                            <td>Yükleme Yapılmış</td>
                                            @endif

                                    </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Başvuru Tarihi</th>
                                        <th>Onay Durumu</th>
                                        <th>Belge Gönder</th>
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
                                @if(count($yaz) != 0)
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Başvuru Tarihi</th>
                                            <th>Onay Durumu</th>
                                            <th>Belge Gönder</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($yaz as $item)
                                            <tr>
                                                <td>{{$item->created_at}}</td>
                                                @if(!$item->isConfirmed && $item->isDraft)
                                                    <td>Dosya Bekleniyor</td>
                                                @elseif(!$item->isConfirmed && !$item->isDraft && $item->file != null)
                                                    <td>Onay Bekliyor</td>
                                                @elseif($item->isConfirmed == -1)
                                                    <td>Reddedildi</td>
                                                @else
                                                    <td>Onaylandı</td>
                                                @endif
                                                @if($item->file == null)
                                                    <td><a href="javascript: void(0)" onclick="window.open('{{route('student.yaz.upload', ['studentId' => $item->studentId, 'applicationId' => $item->id])}}','_blank','width=900,height=300');">Belge Yükle</a>
                                                        / <a href="{{route('student.yaz.application.preview', ['studentId' => $item->studentId, 'applicationId' => $item->id])}}">Belge İndir</a></td>
                                                @else
                                                    <td>Yükleme Yapılmış</td>
                                                @endif

                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Başvuru Tarihi</th>
                                            <th>Onay Durumu</th>
                                            <th>Belge Gönder</th>
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

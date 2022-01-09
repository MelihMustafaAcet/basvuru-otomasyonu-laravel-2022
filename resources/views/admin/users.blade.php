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
                                <h3 class="card-title">Kullanıcılar</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @if(count($users) != 0)
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Öğrenci Numarası</th>
                                        <th>Adı Soyadı</th>
                                        <th>E-Mail</th>
                                        <th>Telefonu</th>
                                        <th>Fakülte</th>
                                        <th>Bölüm</th>
                                        <th>Detay</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $item)
                                    <tr>
                                    <td>{{$item->studentNumber}}</td>
                                    <td>{{$item->nameSurname}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->phoneNumber}}</td>
                                    <td>{{$item->facultyName}}</td>
                                    <td>{{$item->sectionName}}</td>
                                        <td>
                                            <a href="{{route('panel.user', ['id' => $item->userId])}}" onclick="window.open(this.href, 'mywin',
'left=20,top=20,width=500,height=750,toolbar=1,resizable=0'); return false;" >Detay</a>
                                        </td>
                                     </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Öğrenci Numarası</th>
                                        <th>Adı Soyadı</th>
                                        <th>E-Mail</th>
                                        <th>Telefonu</th>
                                        <th>Fakülte</th>
                                        <th>Bölüm</th>
                                        <th>Detay</th>
                                    </tr>
                                    </tfoot>
                                </table>
                                @else
                                    <div class="callout callout-info">
                                        <h5>Kullanıcı bulunamadı!</h5>

                                        <p>Herhangi bir kayıt yok.</p>
                                    </div>
                                    @endif
                            </div>
                            <!-- /.card-body -->
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

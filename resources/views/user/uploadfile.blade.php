<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Dosya Yükle</title>
</head>
<body>
@if($success == true)
    <div class="alert alert-success" role="alert">
        Başarıyla yükleme yapıldı. Sayfadan ayrılabilirsiniz.
    </div>

@else
    <div class="alert alert-danger" role="alert">
    Yüklediiğiniz dosya mutlaka imzalı olmalıdır. Yalnızca PDF formatında dosya yükleyebilirsiniz. Henüz belgenizi indirmediyseniz: <a href="{{route('student.cap.application.preview', ['studentId' => $data['studentId'], 'applicationId' => $data['applicationId']])}}" class="alert-link">Belgeyi indirmek için tıklayın</a>
</div>
<form action="{{route('student.cap.upload.action', ['studentId' => $data['studentId'], 'applicationId' =>$data['applicationId']])}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="exampleFormControlFile1">Dosya seçiniz</label>
        <input type="file" class="form-control-file" required name="file" id="exampleFormControlFile1">
    </div>
    <button type="submit" class="btn btn-primary">Yükle</button>
</form>

    @endif


@include('sweetalert::alert')
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

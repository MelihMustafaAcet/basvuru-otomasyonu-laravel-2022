<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Kullanıcı Detayı</title>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="span4"></div>
        <div class="span4"><img src="{{ asset('storage/images/' . $user->photo) }}" width="150" class="img-fluid" alt="Responsive image"></div>
        <div class="span4"></div>
    </div>
</div>

<div class="row text-center">

</div>


<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">#</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">Adı Soyadı</th>
        <td>{{$user->nameSurname}}</td>
    </tr>
    <tr>
        <th scope="row">Öğrenci Numarası</th>
        <td>{{$user->studentNumber}}</td>
    </tr>
    <tr>
        <th scope="row">TC Numarası</th>
        <td>{{$user->identyNumber}}</td>
    </tr>
    <tr>
        <th scope="row">Fakültesi</th>
        <td>{{$user->facultyName}}</td>
    </tr>
    <tr>
        <th scope="row">Bölümü</th>
        <td>{{$user->sectionName}}</td>
    </tr>
    <tr>
        <th scope="row">E-Mail</th>
        <td>{{$user->email}}</td>
    </tr>
    <tr>
        <th scope="row">Adres</th>
        <td>{{$user->address}}</td>
    </tr>
    <tr>
        <th scope="row">Doğum Tarihi</th>
        <td>{{$user->birthday}}</td>
    </tr>
    </tbody>
</table>


@include('sweetalert::alert')
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

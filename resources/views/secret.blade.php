<!DOCTYPE html>
<html>
    <head>
<!-- Suggested code may be subject to a license. Learn more: ~LicenseLog:3552286262. -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Pagina Privada</title>
<!-- Suggested code may be subject to a license. Learn more: ~LicenseLog:1186561501. -->
        <link href="chttps://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0eveHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
<!-- Suggested code may be subject to a license. Learn more: ~LicenseLog:3724577512. -->
    <div class="container">
<!-- Suggested code may be subject to a license. Learn more: ~LicenseLog:1211157326. -->
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
<!-- Suggested code may be subject to a license. Learn more: ~LicenseLog:2623809393. -->
            <a class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            Pagina Privada @auth de {{ Auth::user()->nombre }} @endauth

</a>
<!-- Suggested code may be subject to a license. Learn more: ~LicenseLog:337668675. -->
<div class="col-md-3 text-end">
    <a href="{{route('logout')}}"><button type="button" class="btn btn-outline-primary me-2">Salir</button></a>
</div>
</header>
</div>
<article class="container">
    <h2>tu seccion privada</h2>
</article>
</body>
    </html>
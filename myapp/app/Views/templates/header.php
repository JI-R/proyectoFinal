<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto IOT</title>
    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/main.css" rel="stylesheet">
    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<header>
<nav class="navbar bg-dark navbar-expand-md" data-bs-theme="bg-light">
  <div class="container">
    <a class="navbar-brand" href="/api">IoT</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link"  href="/dashboard">panel de control</a>
        <a class="nav-link" href="/table">tabla</a>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Echarts
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/e-bar">grafico barra</a></li>
            <li><a class="dropdown-item" href="/e-line">grafico de linea</a></li>
            <li><a class="dropdown-item" href="/e-gauge">medidores</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Google Charts
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/g-gauge">medidores</a></li>
            <li><a class="dropdown-item" href="/g-line">grafico de linea</a></li>
          </ul>
        </li>
      </div>
    </div>
  </div>
</nav>
</header>
<main class="container my-3">
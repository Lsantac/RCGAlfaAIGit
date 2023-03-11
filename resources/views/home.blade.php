@extends('master')

@section('content')

<div class="container">
  <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <h1 style="text-align: center; color:blue;">{{$ident->nome_ident}}</h1>
        <img src="/imagens/imagem2.jpg" class="d-block" style="width: 80%; height: auto; object-fit: cover; margin: 0 auto;" alt="...">
      </div>
      <div class="carousel-item">
        <h1 style="text-align: center; color:blue;">{{$ident->nome_ident}}</h1>
        <img src="/imagens/imagem6.webp" class="d-block" style="width: 80%; height: auto; object-fit: cover; margin: 0 auto;" alt="...">
      </div>
      <div class="carousel-item">
        <h1 style="text-align: center; color:blue;">{{$ident->nome_ident}}</h1>
        <img src="/imagens/imagem9.jpg" class="d-block" style="width: 80%; height: auto; object-fit: cover; margin: 0 auto;" alt="...">
      </div>
      <div class="carousel-item">
        <h1 style="text-align: center; color:blue;">{{$ident->nome_ident}}</h1>
        <img src="/imagens/imagem8.jpg" class="d-block" style="width: 80%; height: auto; object-fit: cover; margin: 0 auto;" alt="...">
      </div>
      <div class="carousel-item">
        <h1 style="text-align: center; color:blue;">{{$ident->nome_ident}}</h1>
        <img src="/imagens/imagem3.jpg" class="d-block" style="width: 80%; height: auto; object-fit: cover; margin: 0 auto;" alt="...">
      </div>
    
    </div>
    
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>

@endsection

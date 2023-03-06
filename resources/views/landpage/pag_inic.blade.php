<!DOCTYPE html>
<html>
<head>
	<title>Rede Colaborativa Global</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
	<link rel="icon" type="image/png" href="/imagens/logo.jpg" /> 
	<link rel="stylesheet" href="{{ asset('/css/pag_inic.css') }}">
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="/"><img id="imagem_logo"  src="/imagens/{{App\Http\Controllers\IdentController::consulta_logo()}}" class="imagem-header"></a>
				<a class="navbar-brand" href="#">Rede Colaborativa Global</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link" href="#contato">Contato</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#tutoriais">Tutoriais</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#sistema">Entrar</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<main>
		<section class="intro">
			<div class="container">
				<div class="row mt-3">
					<div class="col-md-12">
						<h5>Que tal participar de uma rede colaborativa versátil, que oferece diversas ferramentas para impulsionar a circulação de seus produtos, serviços e outros itens por meio de trocas, doações ou uso de moedas solidárias? Essa plataforma facilita a criação de redes, estimulando o trabalho cooperativo e o compartilhamento de recursos, além de fornecer estatísticas para análise da prosperidade dessas redes. Com essa iniciativa, os recursos são direcionados de forma mais eficiente para onde são mais necessários.</h5>
					</div>
				</div>
			</div>
		</section>
	<br>
<section class="features">
<div class="container">
  <h3>Módulos Conceituais</h3>
  <br>
  <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
	
	<div class="col">
	  <div class="card h-100 card_partic">
		<div class="card-body">
		  <h3 class="card-title">Participantes</h3>
		  <p class="card-text">Seriam pessoas físicas ou jurídicas que fariam parte de uma ou mais redes. Poderiam participar de eventos e projetos.</p>
		  <p class="card-text">Cada participante cadastrará suas “ofertas” e/ou  “necessidades”, como produtos que produz ou que precisa, serviços e outros itens possíveis.</p>
		</div>
	  </div>
	</div>
	<div class="col">
		<div class="card h-100 card_redes">
		  <div class="card-body">
			<h3 class="card-title">Redes</h3>
			<ul class="card-text">
			  <li>Poderiam ser criadas a vontade, e seriam cadastradas com nome, localização e uma breve descrição.</li>
			  <li>Essas redes seriam compostas de “participantes” de uma cidade, comunidade, escola, clube ou qualquer ou tipo de agrupamento de pessoas.</li>
			  <li>Seriam criadas categorias e tipos de redes para facilitar a busca de recursos pela rede. Ex. Redes de pessoas físicas, de profissionais autônomos, empresas de vários ramos e até fábricas.</li>
			</ul>
		  </div>
		</div>
	</div>
	<div class="col">
	  <div class="card h-100 card_ofertas">
		<div class="card-body">
		  <h3 class="card-title">Ofertas</h3>
		  <p class="card-text">Qualquer tipo de produto ou serviço que o participante produza ou queira doar ou troca na rede. Produtos e serviços devem atender a algumas regras básicas de ética comunitária.</p>
		</div>
	  </div>
	</div>
	<div class="col">
	  <div class="card h-100 card_necessidades">
		<div class="card-body">
		  <h3 class="card-title">Necessidades</h3>
		  <p class="card-text">Da mesma forma que as Ofertas, as Necessidades que cada participante tem de produtos, serviços ou qualquer outro tipo de item ofertado na rede.</p>
		</div>
	  </div>
	</div>
	<div class="col">
		<div class="card h-100 card_transacoes">
		  <div class="card-body">
			<h3 class="card-title">Transações</h3>
			<p class="card-text">São feitas entre os participantes, um que disponibilizou uma “oferta” e outro que tem uma “necessidade” compatível. Podem ser realizadas durante um evento, pessoalmente, por correio, ou outra forma a combinar. Cada transação possui uma avaliação e uma confirmação de execução pelos participantes que receberam as “ofertas”. Podem haver também trocas entre participantes que estão ofertando seus produtos ou serviços. As transações podem ser vinculadas a algum evento ou projeto para futura referência.</p>
		  </div>
		</div>
	</div>
	<div class="col">
		<div class="card h-100 card_eventos">
		  <div class="card-body">
			<h3 class="card-title">Eventos</h3>
			<p class="card-text">Feiras e encontros dos participantes para entrega das ofertas e realizar as transações. Define-se local, data e periodicidade. Não é obrigatório que as transações sejam feitas durante um evento.</p>
		  </div>
		</div>
	</div>	  
	<div class="col">
		<div class="card h-100 card_projetos">
		  <div class="card-body">
			<h3 class="card-title">Projetos</h3>
			<p class="card-text">Projetos de natureza comunitária ou colaborativa que podem ser criados pelos participantes e que podem ser favorecidos por transações feitas nas redes. Exemplos incluem melhoria ou criação de escolas, comunidades sustentáveis, auxílio a famílias carentes e assim por diante.</p>
		  </div>
		</div>
	</div>	
	<div class="col">
		<div class="card h-100 card_estat">
		  <div class="card-body">
			<h3 class="card-title">Estatísticos</h3>
			<p class="card-text">Gráficos e dados estatísticos mostrando a performance das redes e participantes, indicando a saúde do fluxo dos recursos por toda a rede.</p>
		  </div>
		</div>
	</div>	   

  </section>
  <footer class="footer mt-auto py-3 text-center">
    <div class="container">
        <p class="text-muted">&copy; 2023 Rede Colaborativa Global</p>
    </div>
</footer>

</main>
<script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
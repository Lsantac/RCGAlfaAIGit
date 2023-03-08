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
				<a class="navbar-brand" href="#inicio">Rede Colaborativa Global</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<a class="nav-link" href="#Conceitos">Módulos</a>
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
  <h3>Módulos</h3>
  <br>
  <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
	
	<div class="col">
		<div class="card h-100 card_partic">
			<div class="text-center">
				<img src="/icones/participantes.jpg" alt="Participantes" class="card-img-top" style="width:100px; height:100px; object-fit:cover;">
			</div>
			<div class="card-body">
				<h3 class="card-title text-center">Participantes</h3>
				<p class="card-text">São pessoas físicas, jurídicas ou até mesmo entidades conceituais, que fariam parte de uma ou mais redes. Poderiam participar de eventos e projetos.</p>
				<p class="card-text">Cada participante cadastrará suas “ofertas” e/ou  “necessidades”, como produtos ou serviços que produz ou que precisa, e outros itens possíveis.</p>
			</div>
		</div>
	</div>
	<div class="col">
		<div class="card h-100 card_redes">
		  <div class="text-center">
		    	<img src="/icones/redes.jpg" alt="Redes" class="card-img-top" style="width:100px; height:100px; object-fit:cover;">
		 </div>
		  <div class="card-body">
			<h3 class="card-title text-center">Redes</h3>
			<p class="card-text">
			  Podem ser criadas a vontade e são cadastradas com nome e uma breve descrição.
			  Essas redes são compostas de “participantes” de uma cidade, comunidade, escola, clube ou qualquer tipo de agrupamento de pessoas.
			</p>
			<p>Ex: Redes de pessoas físicas ligadas a algum interesse específico, de profissionais de vários tipos, empresas e até fábricas.</p>
		  </div>
		</div>
	</div>
	<div class="col">
	  <div class="card h-100 card_ofertas">
		<div class="text-center">
			<img src="/icones/ofertas.jpg" alt="Ofertas" class="card-img-top" style="width:100px; height:100px; object-fit:cover;">
	    </div>
		<div class="card-body text-center">
		  <h3 class="card-title">Ofertas</h3>
		  <p class="card-text">Qualquer tipo de produto ou serviço que o participante produza ou queira doar ou trocar nas redes. Produtos e serviços devem atender a algumas regras básicas de ética comunitária, não podem ser nada ligado a violência, preconceitos raciais ou de qualquer tipo.</p>
		</div>
	  </div>
	</div>
	<div class="col">
	  <div class="card h-100 card_necessidades">
		<div class="text-center">
			<img src="/icones/necessidades.jpg" alt="Necessidades" class="card-img-top" style="width:100px; height:100px; object-fit:cover;">
	    </div>
		<div class="card-body text-center">
		  <h3 class="card-title">Necessidades</h3>
		  <p class="card-text">Da mesma forma que as Ofertas, as Necessidades que cada participante tem de produtos, serviços ou qualquer outro tipo de item ofertado nas redes.</p>
		</div>
	  </div>
	</div>
	<div class="col">
		<div class="card h-100 card_transacoes">
		   <div class="text-center">
		 		<img src="/icones/transacoes.jpg" alt="Transacoes" class="card-img-top" style="width:100px; height:100px; object-fit:cover;">
		  </div>	
		  <div class="card-body text-center">
			<h3 class="card-title">Transações</h3>
			<p class="card-text">São feitas entre os participantes, um que disponibilizou uma “Oferta” e outro que tem uma “Necessidade” compatível. Podem ser realizadas durante um evento, pessoalmente, por correio, ou outra forma a combinar. Cada transação possui uma avaliação e uma confirmação de execução pelos participantes que receberam as “ofertas”. Podem haver também trocas entre participantes que estão ofertando seus produtos ou serviços. As transações podem ser vinculadas a algum evento ou projeto para futura referência.</p>
			<p class="card-text">São confirmadas e avaliadas por cada participante envolvido e a negociação é feita através de mensagens para combinar os termos de entrega e recebimento.</p>
		  </div>
		</div>
	</div>
	<div class="col">
		<div class="card h-100 card_eventos">
			<div class="text-center">
				<img src="/icones/eventos.jpg" alt="Eventos" class="card-img-top" style="width:100px; height:100px; object-fit:cover;">
			</div>
		  <div class="card-body text-center">
			<h3 class="card-title">Eventos</h3>
			<p class="card-text">São feiras e encontros dos participantes de forma presencial onde é possivel fazer entregas das ofertas e realizar as transações. Define-se local, data e periodicidade. Não é obrigatório que as transações sejam feitas durante um evento. É um momento muito propicio para uma maior integração das comunidades ou redes.</p>
		  </div>
		</div>
	</div>	  
	<div class="col">
		<div class="card h-100 card_projetos">
			<div class="text-center">
				<img src="/icones/projetos.jpg" alt="Projetos" class="card-img-top" style="width:100px; height:100px; object-fit:cover;">
			</div>	
		  <div class="card-body text-center">
			<h3 class="card-title">Projetos</h3>
			<p class="card-text">Projetos de natureza comunitária ou colaborativa que podem ser criados pelos participantes e que podem ser favorecidos por transações feitas nas redes. Exemplos incluem melhoria ou criação de escolas, comunidades sustentáveis, auxílio a famílias carentes e assim por diante.</p>
			<p class="card-text">É possivel criar projetos de vários outros tipos, contanto que não vá contra as regras de ética do relacionamento entre os participantes, não fomentando violência e preconceitos.</p>
		  </div>
		</div>
	</div>	
	<div class="col">
		<div class="card h-100 card_estat">
			<div class="text-center">
				<img src="/icones/estatisticos.jpg" alt="Estatisticos" class="card-img-top" style="width:100px; height:100px; object-fit:cover;">
			</div>
		  <div class="card-body text-center">
			<h3 class="card-title">Estatísticos</h3>
			<p class="card-text">Gráficos e dados estatísticos mostrando a performance das redes e participantes, indicando a saúde do fluxo dos recursos por todas as redes.</p>
			<p class="card-text">Uma das idéias basicas do sistema é facilitar que os recursos possam fluir forma a garantir que cada participante tenha o que precisa para viver,
			 e possa fazer fluir os recursos que produtos ou dispõe.</p>
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
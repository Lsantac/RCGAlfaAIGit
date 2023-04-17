<!DOCTYPE html>
<html>
<head>
	<title>Rede Colaborativa Global</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="icon" type="image/png" href="/imagens/logo.jpg" /> 
	<link rel="stylesheet" href="{{ asset('/css/pag_inic.css') }}">
</head>
<body>
	<br><br>
	<header class="fixed-top">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="/"><img id="imagem_logo"  src="/imagens/{{App\Http\Controllers\IdentController::consulta_logo()}}" class="imagem-logo"></a>
				<a class="navbar-brand" href="/">{{$ident->nome_ident}}</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link" href="#conceitual" style="color:rgb(45, 45, 175);">
								<div class="conceitual">C<span>o</span><span>n</span><span>c</span><span>e</span><span>i</span><span>t</span><span>u</span><span>a</span><span>l</span>
								</div>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#contato">Contato</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#tutoriais">Tutoriais</a>
						</li>
						<li class="nav-item btn-entrar">
							<a href="login" class="btn btn-primary" style="background: linear-gradient(to right, #e74c3c, #f1c40f, #2ecc71);">Entrar</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<main>
		<div class="container">

			<div class="row justify-content-center mt-5">
			    <div class="col-lg-7 col-md-10 col-sm-11">

					<div class="card bg-white shadow card_inic">
						
						<div class="card-body">
							<div id="carouselExampleSlidesOnly" class="carousel slide rounded-top carousel_inic" data-bs-ride="carousel" style="max-height: 400px;">
								<div class="carousel-inner">
									
									<div class="carousel-item active">
									    <img src="/imagens/imagem_inicial1.jpg" class="d-block w-100 imagem_inic" alt="...">
									</div>	
									<div class="carousel-item">
										<img src="/imagens/imagem_inicial2.jpg" class="d-block w-100 imagem_inic" alt="...">
									</div>
									<div class="carousel-item">
										<img src="/imagens/imagem_inicial3.jpg" class="d-block w-100 imagem_inic" alt="...">
									</div>
									<div class="carousel-item">
										<img src="/imagens/imagem_inicial4.jpg" class="d-block w-100 imagem_inic" alt="...">
									</div>
									<div class="carousel-item">
										<img src="/imagens/imagem_inicial5.jpg" class="d-block w-100 imagem_inic" alt="...">
									</div>
									<div class="carousel-item">
										<img src="/imagens/imagem_inicial6.jpg" class="d-block w-100 imagem_inic" alt="...">
									</div>
									

								</div>
							</div>
							<br>

						<h5 class="card-title text-left">Bem-vindo à nossa plataforma colaborativa!</h5>
						<p class="card-text text-left" style="background-color: rgba(255, 255, 255, 0.7); padding: 10px;">Que tal participar de uma rede colaborativa versátil, que oferece diversas ferramentas para impulsionar a circulação de seus produtos, serviços e outros itens por meio de trocas, doações ou uso de moedas solidárias? Essa plataforma facilita a criação de redes, estimulando o trabalho cooperativo e o compartilhamento de recursos, além de fornecer estatísticas para análise da prosperidade dessas redes. Com essa iniciativa, os recursos são direcionados de forma mais eficiente para onde são mais necessários.</p>
						<div class="text-center mt-3">
							<a href="login" class="btn btn-primary" style="background: linear-gradient(to right, #e74c3c, #f1c40f, #2ecc71);">Venha participar também!!</a>
						</div>
						</div>
					</div>
				  
			    </div>
			</div>
		</div>
		 
	<br id="conceitual"><br><br>
	<br>
<section class="features" >
<div class="container" >
	<h3 style="text-align: center;">Conceitual</h3>

  <br>
  <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
	
	<div class="col">
		<div class="card h-100 card_partic">
			<div class="text-center">
				<img src="/icones/participantes.jpg" alt="Participantes" class="card-img-top" style="width:100px; height:100px; object-fit:cover;">
			</div>
			<div class="card-body">
				<h3 class="card-title text-center">Participantes</h3>
				<p class="card-text">São indivíduos, empresas ou até mesmo organizações abstratas que podem fazer parte de uma ou mais redes. Eles teriam a oportunidade de participar de eventos e projetos promovidos pelas redes.
             	   Cada participante pode cadastrar suas "ofertas" e/ou "necessidades", tais como produtos ou serviços que produzem ou que precisam, além de outros itens possíveis.
			    </p>
				
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
				As redes podem ser criadas conforme a necessidade e cadastradas com nome e breve descrição. Elas são compostas por "participantes" que compartilham interesses em comum, podendo ser de uma cidade, comunidade, escola, clube ou qualquer outro tipo de pessoa.
                Por exemplo, podem existir redes de pessoas físicas ligadas a algum interesse específico, de profissionais de várias áreas, empresas e até mesmo fábricas.
			</p>

		  </div>
		</div>
	</div>
	<div class="col">
	  <div class="card h-100 card_ofertas">
		<div class="text-center">
			<img src="/icones/ofertas.jpg" alt="Ofertas" class="card-img-top" style="width:100px; height:100px; object-fit:cover;">
	    </div>
		<div class="card-body">
		  <h3 class="card-title text-center">Ofertas</h3>
		  <p class="card-text">Ofertas são os produtos ou serviços que cada participante pode disponibilizar nas redes em que está cadastrado. Podem incluir itens como doações, trocas ou vendas. 
			Destaca-se que as ofertas cadastradas pelos participantes devem seguir algumas regras básicas de ética comunitária, de forma a garantir que produtos e serviços não estejam associados à violência ou qualquer tipo de preconceito racial ou social.
		  </p>
		</div>
	  </div>
	</div>
	<div class="col">
	  <div class="card h-100 card_necessidades">
		<div class="text-center">
			<img src="/icones/necessidades.jpg" alt="Necessidades" class="card-img-top" style="width:100px; height:100px; object-fit:cover;">
	    </div>
		<div class="card-body">
		  <h3 class="card-title text-center">Necessidades</h3>
		  <p class="card-text">As Necessidades são parte essencial das redes, permitindo aos participantes encontrar produtos, serviços ou outros itens que desejam adquirir. Ao cadastrá-las, os participantes se integram mais à rede e podem receber ajuda e suporte dos demais membros. Além disso, a identificação das Necessidades pode criar oportunidades de negócio e promover a troca de conhecimentos e habilidades entre os membros.
             Porém, é fundamental que as Necessidades cadastradas estejam de acordo com as regras básicas de ética comunitária e não estejam associadas a qualquer tipo de violência ou preconceito. Assim, as redes se tornam ambientes seguros e saudáveis para a troca de bens e serviços, fortalecendo a comunidade e incentivando a cooperação mútua.</p>
		</div>
	  </div>
	</div>
	<div class="col">
		<div class="card h-100 card_transacoes">
		   <div class="text-center">
		 		<img src="/icones/transacoes.jpg" alt="Transacoes" class="card-img-top" style="width:100px; height:100px; object-fit:cover;">
		  </div>	
		  <div class="card-body ">
			<h3 class="card-title text-center">Transações</h3>
			<p class="card-text">Transações podem ocorrer entre participantes que possuem uma oferta e uma necessidade compatíveis. Essas transações podem ocorrer em eventos presenciais, por meio de correio ou outro método acordado entre os participantes. Cada transação é acompanhada de uma avaliação e confirmação de execução pelos participantes que receberam a oferta. Além disso, os participantes podem trocar produtos ou serviços entre si. É possível vincular as transações a eventos ou projetos para referência futura.
               Para realizar uma transação, os participantes envolvidos confirmam e avaliam a transação por meio de mensagens para acertar os termos de entrega e recebimento.</p>
		  </div>
		</div>
	</div>
	<div class="col">
		<div class="card h-100 card_eventos">
			<div class="text-center">
				<img src="/icones/eventos.jpg" alt="Eventos" class="card-img-top" style="width:100px; height:100px; object-fit:cover;">
			</div>
		  <div class="card-body">
			<h3 class="card-title text-center">Eventos</h3>
			<p class="card-text">Eventos são feiras e encontros presenciais onde os participantes podem realizar transações e entregas de suas ofertas. Os eventos são definidos com antecedência, com local, data e periodicidade estabelecidos. No entanto, as transações não são limitadas a esses eventos e podem ocorrer em outros momentos e locais. Os eventos são uma oportunidade valiosa para a integração das comunidades ou redes, promovendo a interação entre os participantes.</p>
		  </div>
		</div>
	</div>	  
	<div class="col">
		<div class="card h-100 card_projetos">
			<div class="text-center">
				<img src="/icones/projetos.jpg" alt="Projetos" class="card-img-top" style="width:100px; height:100px; object-fit:cover;">
			</div>	
		  <div class="card-body">
			<h3 class="card-title text-center">Projetos</h3>
			<p class="card-text">Os participantes podem criar projetos comunitários ou colaborativos que são beneficiados pelas transações feitas nas redes. Esses projetos podem incluir a melhoria ou criação de escolas, comunidades sustentáveis, ajuda a famílias carentes e muito mais. No entanto, é importante que esses projetos respeitem as regras de ética no relacionamento entre os participantes, não promovendo violência ou preconceito. É possível criar projetos de vários tipos, desde que sejam compatíveis com essas diretrizes éticas.
			</p>

		  </div>
		</div>
	</div>	
	<div class="col">
		<div class="card h-100 card_estat">
			<div class="text-center">
				<img src="/icones/estatisticos.jpg" alt="Estatisticos" class="card-img-top" style="width:100px; height:100px; object-fit:cover;">
			</div>
		  <div class="card-body">
			<h3 class="card-title text-center">Estatísticos</h3>
			<p class="card-text">Os dados estatísticos e gráficos mostram a performance das redes e dos participantes, oferecendo informações sobre o fluxo de recursos em toda a rede. A ideia central do sistema é facilitar o fluxo de recursos, garantindo que cada participante tenha acesso ao que precisa para viver e possa compartilhar os recursos que possui. O objetivo é garantir que os recursos sejam distribuídos de forma justa e equilibrada, criando um ambiente mais sustentável e colaborativo para todos os envolvidos. Os dados estatísticos e gráficos são uma importante ferramenta para avaliar a saúde do sistema e encontrar maneiras de melhorar sua eficiência.
			</p>
		  </div>
		</div>
	</div>
	<div class="col">
		<div class="card h-100 card_futuro">
			<div class="text-center">
				<img src="/icones/futuro.jpg" alt="Futuro" class="card-img-top" style="width:100px; height:100px; object-fit:cover;">
			</div>
		  <div class="card-body">
			<h3 class="card-title text-center">Futuro</h3>
			<p class="card-text">O futuro do sistema de redes colaborativas é promissor e está aberto a colaboração de desenvolvedores que compartilham o entusiasmo pelo projeto. O objetivo é expandir o sistema e torná-lo mais acessível e útil para uma variedade de públicos. O sistema pretende ser aberto e conectável com outros aplicativos e soluções, utilizando APIs e outros recursos para criar um ambiente colaborativo no mesmo molde do projeto em si. Com essa abertura, o sistema pode crescer de forma exponencial, agregando mais participantes e tornando-se uma referência para iniciativas colaborativas e sustentáveis. Juntos, podemos construir um futuro mais justo e equitativo para todos.
			</p>
		  </div>
		</div>
	</div>		
</div>	

	<hr class="hr-separator">
	<br>
	<br>
	
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<div class="card">
					<div class="card-body">
						<form action="{{ route('MensContato') }}" method="GETt">
							@csrf
	
							<h3 class="text-center mb-4" id="contato">Contato</h3>
	
							<div class="mb-3">
								<label for="nome" class="form-label">Nome</label>
								<input type="text" id="nome" name="nome" class="form-control">
							</div>
							<div class="mb-3">
								<label for="email" class="form-label">E-mail</label>
								<input type="email" id="email_contato" name="email_contato" class="form-control">
							</div>
							<div class="mb-3">
								<label for="assunto" class="form-label">Assunto</label>
								<input type="text" id="assunto" name="assunto" class="form-control">
							</div>
							<div class="mb-3">
								<label for="mensagem" class="form-label">Mensagem</label>
								<textarea id="mensagem" name="mensagem" class="form-control"></textarea>
							</div>
							<button type="submit" class="btn btn-primary">Enviar</button>
						</form>
					</div>
				</div>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
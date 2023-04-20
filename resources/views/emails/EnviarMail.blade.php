<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @if($details['tipo'] == 'esqueci-senha')
       <title>Reset de Senha de Email</title>
    @else
       @if($details['tipo'] == 'contato')
          <title>Contato de Visitante</title>
       @endif 
    @endif
</head>

<body>

    @if($details['tipo'] == 'esqueci-senha')
        <h1>{{$details['title']}}</h1>
        <br>
        <img src="{{$details['image']}}" alt="">
        <br>
        <p>
                    
        <a href="{{asset('/alterpass_email')}}/{{$details['id']}}">clique aqui para resetar sua senha</a>   
        </p>

    @else
       @if($details['tipo'] == 'contato')
            <h1>{{$details['title']}}</h1>
            <h2>Email : {{$details['email_contato']}}</h2>
            <br>
            <h3>{{$details['body']}}</h3>
            <br>
            <img src="{{$details['image']}}" alt="">
            
       @endif 
    @endif
    
</body>

</html>
<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Mail\SendMail;
use App\Mail\ContatoEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;


class MailController extends Controller
{
    public function SendEmail(Request $request){

        $email = $request->input('email_enviado');
        /*dd($email);*/

        $ident = DB::table('identidade')->first();
        $nome_ident = $ident->nome_ident;
        $part = DB::table('participantes')->where('email', $email)->first();

        if(!$part){
            return redirect('/login')->with('fail','Email não cadastrado!');
        }  

        $nome_part = $part->nome_part;

        $details = [
            'title' => "Olá '".$nome_part."' da ". $nome_ident .' !',
            'body' => 'Essa mensagem é para voce poder resetar sua senha, clique no link abaixo. Seja Bem Vindo a '. $nome_ident.' !',
            'image' => 'http://redecolaborativa.ddns.net:8222/img/logo.jpg',
            'id' => $part->id,
            'tipo' => 'esqueci-senha',
           
        ];

        
        /*dd($details);*/
        /*dd(public_path());*/
        /*dd(asset('/img/logo.jpg'));*/

        Mail::to($email)->send(new \App\Mail\SendMail($details),['html' => 'email.EnviarMail']);

        return back()->with('success', 'Email enviado para '.$email. ' com sucesso! Verifique sua caixa de entrada e use o link para redefinir sua senha !');
         

    } 
    
 /*
  Send a message from a visitor.
 */
public function MensContato(Request $request)
{
    $email = 'lsantac@gmail.com';
    $email_contato = $request->input('email_contato');
    $nome = $request->input('nome');
    $mensagem = $request->input('mensagem');
    $subject = $request->input('assunto');

    $nome_ident = DB::table('identidade')->value('nome_ident');

    $details = [
        'title' => 'Mensagem do visitante : '. $nome.' da '. $nome_ident,
        'name' => $nome,
        'email_contato' => $email_contato,
        'subject' => $subject,
        'body' => $mensagem, 
        'id' => '',
        'tipo' => 'contato',
    ];
 
    $message = new \App\Mail\ContatoMail(compact('nome'), $subject, $details);
    /*  $imagePath = public_path('/imagens/logo.jpg');*/
    /* $message->attach($imagePath, ['as' => 'logo.jpg']);*/

    Mail::to($email)->send($message, ['html' => 'email.EnviarMail']);

    return back()->with('success', 'Sua mensagem foi enviada com sucesso!');
}


    public function SendEmail_teste($email)
    {
         
        Mail::send('email.EnviarMail', function ($m) use($email) {
            $m->from('lsantac.redecolaborativa@gmail.com', 'Your Application');
 
            $m->to($email)->subject('Your Reminder!');
        });
    }





    public function send_email_mailer() {
        $to      = 'lsantac@gmail.com';
        $subject = 'Teste de email pelo LARAVEL';
        $message = "Testando de Email pelo LARAVEL";
        $headers = 'From: lsantac@gmail.com'       . "\r\n" .
                    'Reply-To: lsantac@gmail.com' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();

                    ini_set("SMTP","localhost");
                    ini_set("smtp_port","25");
                    ini_set("sendmail_from","lsantac.redecolaborativa@gmail.com");
                    ini_set("sendmail_path", "C:\wamp\bin\sendmail.exe -t");                    

        mail($to, $subject, $message, $headers);

        return "Email enviado com sucesso!";
    }

}

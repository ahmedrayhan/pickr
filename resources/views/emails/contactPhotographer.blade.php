 <!DOCTYPE html>
 <html lang="en">
 <head>
 </head>
 <html>
 <body>
 <div class="container">
     <div class="jumbotron">
         <div class="row">
             <div class="col-md-12 center">
                 <h4>Email to contact for job.</h4>
                 <hr>
             </div>
             <div class="col-md-12">
                 <p class="text-info">This is an email sent from <a href="#">PickR.com </a>by a {{$mail->name}} to contact you. If you are not a member of PickR.com
                  then ignore this message.</p>
             </div>
             <div class="col-md-12">
                 <p><b>Hello,</b></p>
                    <p> {{$mail->mesg}}<p>
                     <p>Thank You.<br>
                     <b>{{$mail->name}}</b></p>
                 </p>
             </div>
         </div>
     </div>
 </div>
 </body>
 </html>
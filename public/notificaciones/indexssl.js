
var fs = require('fs');
var options = {
  key: fs.readFileSync('llave2.PEM'),
  cert: fs.readFileSync('principal.PEM'),
  ca: fs.readFileSync('DigiCertCA.crt')
 
};


const server = require('https').createServer(options);
const io = require('socket.io')(server,{
    cors: {
        origin: "*",
    }
});



server.listen(3000, function() {
    console.log('Listening HTTP on 3000' );
});


io.on('connection',function (socket){
    console.log('connected');


   socket.on('send-message',function (data){
       console.log(data);
       io.emit('message',data);
   });

   socket.on('send-ubicacion',function (data){
       console.log(data);
       io.emit('ubicacion',data);
   });

   socket.on('disconnect',function (){
       console.log('disconnected')
   });
})

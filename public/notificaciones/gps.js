
var fs = require('fs');
var options = {
  key: fs.readFileSync('llaveRicardo.PEM'),
  cert: fs.readFileSync('ab74f2e62ff8f417.PEM'),
  ca: fs.readFileSync('gd_bundle-g2-g1.crt')
 
};


const server = require('https').createServer(options);
const io = require('socket.io')(server,{
    cors: {
        origin: "*",
    }
});



server.listen(3001, function() {
    console.log('Listening HTTP on 3001' );
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

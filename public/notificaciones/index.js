const server = require('http').createServer();
const io = require('socket.io')(server,{
    cors: {
        origin: "*",
    }
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

   socket.on('alerta',function (data){
       console.log(data);
       io.emit('alertas',data);
   });

   socket.on('disconnect',function (){
       console.log('disconnected')
   });
})
server.listen(3000);
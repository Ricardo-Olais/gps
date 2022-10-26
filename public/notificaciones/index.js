var app = require('express')();
    var https = require('https');
    var fs = require( 'fs' );
    var io = require('socket.io')(server);

    var options = {
        key: fs.readFileSync('./test_key.key'),
        cert: fs.readFileSync('./test_cert.crt'),
        ca: fs.readFileSync('./test_ca.crt'),

        requestCert: false,
        rejectUnauthorized: false
    }

    var server = https.createServer(options, app);
        io.on('connection',function (socket){
        console.log('connected');
       socket.on('send-message',function (data){
           console.log(data);
           io.emit('message',data);
       })
       socket.on('disconnect',function (){
           console.log('disconnected')
       })
    })

    server.listen(3000);
    

    
   
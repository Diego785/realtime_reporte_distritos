const express = require('express');
require('dotenv').config();
// const app = express();
// const server = require('http').Server(app);



const cors = require('cors');
const app = require('express')();

const server = require('http').createServer(app);
const io = require('socket.io')(server, {
    cors: {
        origin: 'http://realtime-report.test',
        methods: ['GET', 'POST'],
        credentials: true
    }
});

// const io = require('socket.io')(server);

// Objeto para almacenar los usuarios conectados
const connectedUsers = {};

io.use((socket, next) => {
    // Verificar las credenciales del usuario al recibir una conexión
    const sessionId = socket.handshake.auth.sessionId;
    // Realiza la validación de las credenciales contra tu sistema de autenticación
    // Si el usuario está autenticado, continúa
    // Si no está autenticado, puedes emitir un evento de error o desconectar al usuario

    // Agregar el usuario a la lista de usuarios conectados
    connectedUsers[sessionId] = socket.id;

    // Continuar con la conexión
    next();
});


// Configura las rutas y middleware de express si es necesario

io.on('connection', (socket) => {
    const sessionId = socket.handshake.auth.sessionId;
    console.log('Usuario conectado:', socket.id);

  
    socket.on('disconnect', () => {
        console.log('Usuario desconectado:', socket.id);
        delete connectedUsers[sessionId];
    });
});


const port = process.env.PORT || 3001;
server.listen(port, () => {
    console.log('Servidor de sockets iniciado en el puerto', port);
});

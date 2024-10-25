const express = require('express');
require('dotenv').config();

const cors = require('cors');
const app = require('express')();

const server = require('http').createServer(app);
const io = require('socket.io')(server, {
    cors: {
        origin: 'http://realtime-reporte.test',
        methods: ['GET', 'POST'],
        credentials: true
    }
});

// const io = require('socket.io')(server);

// Objeto para almacenar los usuarios conectados
const connectedUsers = {};

io.use((socket, next) => {
    const sessionId = socket.handshake.auth.sessionId;
    connectedUsers[sessionId] = socket.id;
    next();
});


io.on('connection', (socket) => {

    const sessionId = socket.handshake.auth.sessionId;
    console.log('Usuario conectado:', socket.id);


    // Listen for 'messageSent' from the client
    socket.on('messageSent', (message, progress) => {
        console.log('Message received on the server:', message);
        
        // Emit 'messageReceived' back to all connected clients
        io.emit('messageReceived', { admin: 'Nuevo mensaje', message }, progress); // Optionally include the original message
    });
    socket.on('disconnect', () => {
        console.log('Usuario desconectado:', socket.id);
        delete connectedUsers[sessionId];
    });
});


const port = process.env.PORT || 3001;
server.listen(port, () => {
    console.log('Servidor de sockets iniciado en el puerto', port);
});

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

    // Simulate progress update
    setInterval(() => {
        const progress = Math.floor(Math.random() * 100);
        io.emit('progressUpdate', { progress });
    }, 5000); // Update progress every 5 seconds for demo purposes

    // Emit event with initial progress value if needed
    socket.emit('progressUpdate', { progress: 0 });

    // Handle updates to the progress
    socket.on('updateProgress', (data) => {
        const { progress } = data;
        console.log(`Progress updated to: ${progress}%`);

        // Emit the updated progress to all connected clients
        io.emit('progressUpdate', { progress });
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

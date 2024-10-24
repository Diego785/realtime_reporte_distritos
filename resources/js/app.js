// import './bootstrap';
// import io from 'socket.io-client';
// const socket = io.connect('http://localhost:3001');

// // let socket = io.connect('http://localhost:3001', {
// //     extraHeaders: {
// //         "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
// //     }
// // });


import './bootstrap';  // Keep the default bootstrap imports if you are using them

import { io } from "socket.io-client";

// Connect to your Socket.io server
const socket = io('http://localhost:3001');

socket.on('connect', () => {
    console.log('Conexión establecida');
});

socket.on('disconnect', () => {
    console.log('Desconectado');
});
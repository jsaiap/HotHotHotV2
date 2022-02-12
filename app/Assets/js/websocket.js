socket = new WebSocket("wss://ws.hothothot.dog:9502");

setTimeout(function() {
    if (socket.readyState == 1) {
        socket.send("coucou !");
        console.log("Connexion établie");
        socket.addEventListener("message", e => {
            console.log(e);
        })
    } else {
        console.log("état socket.readyState");
        console.log(socket.readyState);
    };
}, 5000)
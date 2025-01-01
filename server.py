import os
import socket

HOST = '0.0.0.0' 
PORT = int(os.getenv('PORT', 10000))  # Usa a variável de ambiente PORT, se existir

with socket.socket(socket.AF_INET, socket.SOCK_STREAM) as s:
    s.bind((HOST, PORT))
    s.listen()
    print(f"Listening on {HOST}:{PORT}")
    conn, addr = s.accept()
    with conn:
        print(f"Connection from {addr}")
        while True:
            data = conn.recv(1024)
            if not data:
                break
            conn.sendall(data)

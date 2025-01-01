import os
import socket

HOST = '0.0.0.0' 
PORT = int(os.getenv('PORT', 4444))  # Usa a porta da variável de ambiente PORT, caso não exista, usa 4444

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

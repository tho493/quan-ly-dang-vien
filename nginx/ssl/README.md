# SSL Certificates Setup

Thư mục này chứa các file SSL certificate cho HTTPS.

## Tạo Self-Signed Certificate (cho development)

Chạy lệnh sau để tạo self-signed certificate:

```bash
openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
  -keyout key.pem \
  -out cert.pem \
  -subj "/C=VN/ST=State/L=City/O=Organization/CN=localhost"
```

## Sử dụng Let's Encrypt (cho production)

1. Cài đặt certbot:
```bash
sudo apt-get update
sudo apt-get install certbot
```

2. Tạo certificate:
```bash
sudo certbot certonly --standalone -d yourdomain.com
```

3. Copy certificate vào thư mục này:
```bash
sudo cp /etc/letsencrypt/live/yourdomain.com/fullchain.pem ./cert.pem
sudo cp /etc/letsencrypt/live/yourdomain.com/privkey.pem ./key.pem
```

4. Cấu hình auto-renewal trong cron:
```bash
0 0 * * * certbot renew --quiet --deploy-hook "docker-compose restart nginx"
```

## Lưu ý

- File `cert.pem` và `key.pem` phải có trong thư mục này
- Đảm bảo quyền truy cập phù hợp: `chmod 644 cert.pem` và `chmod 600 key.pem`
- Không commit private key vào git repository


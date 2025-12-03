@echo off
REM Script to generate self-signed SSL certificate for development (Windows)

echo Generating self-signed SSL certificate...

openssl req -x509 -nodes -days 365 -newkey rsa:2048 ^
  -keyout key.pem ^
  -out cert.pem ^
  -subj "/C=VN/ST=State/L=City/O=Organization/CN=localhost"

if %ERRORLEVEL% EQU 0 (
    echo SSL certificate generated successfully!
    echo Files created:
    echo   - cert.pem
    echo   - key.pem
    echo.
    echo Note: This is a self-signed certificate for development only.
    echo For production, use Let's Encrypt or a trusted CA certificate.
) else (
    echo Error: Failed to generate certificate.
    echo Make sure OpenSSL is installed and in your PATH.
    echo You can download OpenSSL from: https://slproweb.com/products/Win32OpenSSL.html
)

pause


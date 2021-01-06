# GameHub
Progetto Tecnologie Web


## Configurazione Progetto
***
1) modificare il file php.ini di xampp
   Sotto la voce [mail function]:
   * SMTP=smtp.libero.it
   * smtp_port=465
   * sendmail_from = gamehub2021@libero.it
   * sendmail_path ="C:\xampp\sendmail\sendmail.exe -t"
    
2) modificare il file sendmail.ini [sendmail]:
    *  smtp_server=smtp.libero.it
    *  smtp_port=465
    *  auth_username=gamehub2021@libero.it
    *  auth_password=Gamehub98!
    *  error_logfile=error.log
    *  force_sender=gamehub2021@libero.it
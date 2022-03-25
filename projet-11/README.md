# email avec xampp :

 Trouvez [sendmail] : 
 
      smtp_server=smtp.gmail.com
      smtp_port=587
      error_logfile=error.log
      debug_logfile=debug.log
      auth_username=VotreGmailId@gmail.com
      auth_password=Votre-MotDePasse-Gmail
      force_sender=VotreGmailId@gmail.com(optionnel)
 
 Ouvrez le répertoire C:\xampp\php et ouvrez le fichier php.ini.
 
 Trouvez [mail function] :
 
      SMTP=smtp.gmail.com
      smtp_port=587
      sendmail_from = VotreGmailId@gmail.com
      sendmail_path = "\"C:\xampp\sendmail\sendmail.exe\" -t"


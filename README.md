Sea fight game
========================

1. git clone http://gitlab.antyron.com/seafight/seafight-backend.git
2. composer install
3. Run MySQL and create new DB and DB_User (see parameters.yml.dist)
4. bin/console doctrine:migrations:migrate 
5. bin/console nd:symfony:doctrine:fixtures:load --purge-with-truncate
6. bin/console gos:websocket:server

    or create file /etc/supervisor/conf.d/websocket.conf:
   
     
         command: /usr/bin/php /var/www/html/app/console gos:websocket:server
         autorestart: true
         autostart:true
         stderr_logfile=/var/log/websocket.err.log
         stdout_logfile=/var/log/websocket.out.log
     
   Now, our server will automatically restart in the event of kresh and run at system startup
   
         $ Sudo supervisorctl start websocket
         $ Sudo supervisorctl restart websocket
         $ Sudo supervisorctl stop websocket
# wonde.pp.ua
My test work from Beetroot Academy
Инструкция по запуску проекта PHP/laravel под Ubuntu 16.04.

1.	Установка на Windows
1)  Если Вы устаноавливаетt LAMP наWindows посредством Virtual Box и Vagrant:
-	 vagrant init ubuntu/xenial64 – установка Ubuntu (создайте папку Ubuntu)
 config.vm.network "private_network", ip: "192.168.33.10" –раскомментировать строку в Vagrantfile
-	 vagrant up – запуск виртуальной машины
-	 vagrant ssh – подключение к серверу

Если Вы устанавливаете LAMP на Linux раздел Установка на Windows пропустить.

1.	Пароль для ROOT на Ubuntu
1)	имя пользователя – root
2)	включаем учетную запись ROOT на Ubuntu 
:~# sudo passwd -u root
3)	Создаем пароль для учетной записи ROOT
:~# sudo passwd root
4)	подключаемся к ROOT с помощью команды "su"
:~# su
5)	Введите пароль заданный вами ранее для ROOT – Готово
2.	Подключение через SFTP под ROOT на Ubuntu 14.04
1)	редактируем sshd_config
:~# nano /etc/ssh/sshd_config
2)	находим строку:
PermitRootLogin without-password
3)	и меняем это значение на:
PermitRootLogin yes
Этого будет достаточно чтобы подключиться под ROOT через sftp клиент fileZilla и др
4)	Перезапускаем SSH командой
:~# service ssh restart
3.	 Before Starting 
-  sudo apt-get update - обновление пакетного менеджера. 
4.	 Apache Part 
-  sudo apt-get install apache2 – установка apache2
-  sudo nano /etc/apache2/apache2.conf – корректируем файл
At the bottom of the file append -- ServerName 127.0.0.1 --
-  /etc/init.d/apache2 restart  - рестарт apache2
-  sudo a2enmod rewrite – включаем mod_rewrite на сервере
-  /etc/apache2/apache2.conf – корректируем файл
changing the "AllowOverride" directive for the /var/www directory : AllowOverride All
5.	Mysql Part 
-  sudo apt-get install mysql-server – установка Mysql
6.	 PHP Part
- sudo add-apt-repository ppa:ondrej/php 
- sudo apt-get update
- sudo apt-get install php7.2 libapache2-mod-php php-mcrypt php-mbstring php-mysql php-xml– установка PHP
- sudo apt-get install php-mysql – установка модуля php-mysql
- sudo apt-get install php-fpm – установка модуля php-fpm
- sudo nano /etc/apache2/mods-enabled/dir.conf – корректируем файл
 удалить -- index.php – в конце второй линии
добавить -- index.php -- перед index.html 
-  /etc/init.d/apache2 restart  - рестарт apache2
7.	 phpMyAdmin Part
- sudo apt-get install phpmyadmin – установка phpmyadmin
- sudo nano /etc/apache2/apache2.conf  – корректируем файл
Добавить в самом конце файла -- Include /etc/phpmyadmin/apache.conf 
-  сделаем символьную ссылку на директорию где у нас будет лежать сайт:
	ln -s /usr/share/phpmyadmin /var/www/html/{название вашего сайта}
- зайти в phpMyAdmin:
	{название вашего сайта}/phpmyadmin/
- Reload Apache == /etc/init.d/apache2 restart .
8.	 Install Composer Part
- качаем установщик composer
- php composer-setup.php --install-dir=bin --filename=composer
- Set composer global: 
- mv composer.phar /usr/local/bin/composer
- перейти в папку с проектом: cd var/www/{название вашего сайта}
- composer install – установка composer
9.	 Upload Project Part 
- посредством FTP в созданную директорию копируем проект скачанный с https://github.com/alexandrtiunov/wonde.pp.ua
- php artisan key:generate – получение ключа
- изменить данные в .env файле
-  Set permition "777" to all folder
-  php artisan make migrate – запустить миграции
- php artisan db:seed --class=CategorySeeder and RoleSeeder – запустить посев данных
	или
- импортировать через phpMyAdmin готовую БД
10. Настройка виртуальных хостов в apache
- создаем директорию следующим образом:
 sudo mkdir -p /var/www/{название вашего сайта}
- посредством FTP в созданную директорию копируем проект скачанный с https://github.com/alexandrtiunov/wonde.pp.ua
- создание файла виртуального хоста
cp /etc/apache2/sites-available/000-default.conf  /etc/apache2/sites-available/001-{название вашего сайта}.conf
- откройте новый файл в редакторе с root-правами:
sudo nano /etc/apache2/sites-available/001-{название вашего сайта}.conf
- файл виртуального хоста должен выглядеть следующим образом:
<VirtualHost *:80>
    ServerAdmin admin@example.com
    ServerName {название вашего сайта}
    ServerAlias www.{название вашего сайта}
    DocumentRoot /var/www/{название вашего сайта}/public
    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
- включение новых виртуальных хостов
sudo a2ensite {название вашего сайта}.conf
- после завершения необходимо перезапустить Apache, чтобы изменения вступили в силу:
sudo service apache2 restart
6. Запуск PhpMyAdmin
-  сделаем символьную ссылку на директорию где у нас будет лежать сайт:
ln -s /usr/share/phpmyadmin /var/www/html/{название вашего сайта}
- зайти в phpMyAdmin:
{название вашего сайта}/phpmyadmin/
 
Команда ifconfig даст информацию о сервере. 

(если localhost или переход на ip сервера не отображается в браузере, необходимо в файле hosts который расположен по адресу C:\Windows\System32\drivers\etc\ добавить ip сервера.)


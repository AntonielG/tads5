# Analise e desenvolvimento de sistemas - Desenvolvimento Web III

# Primeiro passo é baixar a maquina virtual:
Downloads – Oracle VirtualBox: https://www.virtualbox.org/wiki/Downloads

# Baixar ISO do Debian 12
Debian -- Baixar o Debian: https://www.debian.org/download

# Adicionar ISO no VirtualBox:
        ->Novo
        ->Imagem ISO → Selecionar a ISO baixada
        ->Marcar “Pular instalação desassistida”
        ->Configurar hardware (RAM e processador)
        ->Configurar a rede e colocar ela em modo Bridge
![image](https://github.com/user-attachments/assets/1afd7f58-9d90-47b2-a817-2e072e0a5292)

->Finalizar

# Configurar instalaçao do Debian
        ->Selecionar “Graphical install” 
        ->Permite instalar visualmente, mas não significa que vai ser instalada uma interface)
        ->Configurar idioma, local, fuso horário, etc
        ->Na seleção de software você vai selecionar somente o "servidor SSH" e "utilitários de sistema padrão":
![image](https://github.com/user-attachments/assets/25c475a0-ac32-472c-b015-f6173cbee7f1)

# Configurar o Debian
        ->Primeiro acesso já coloque o usuário "su"
        ->Comando su (Informar usuário e senha root)
        ->Comando apt update (Lista as atualizações)
        ->Comando apt upgrade (Aplica atualizações conforme a listagem de novas versões)

        ->Caso de erro de CDROM será preciso redirecionar o repositório do release file do cdrom para outro caminho
        ->Execeute o comando: nano /etc/apt/sources.list
        ->Obtenha a URL atualizada https://www.debian.org/security/ e insera no arquivo
        ->Exemplo de source atualizada: https://wiki.debian.org/SourcesList#sources.list
        
        Copiar e colar no sources.list:
        
        deb https://deb.debian.org/debian bookworm main non-free-firmware
        deb-src https://deb.debian.org/debian bookworm main non-free-firmware

        deb https://security.debian.org/debian-security bookworm-security main non-free-firmware
        deb-src https://security.debian.org/debian-security bookworm-security main non-free-firmware

        deb https://deb.debian.org/debian bookworm-updates main non-free-firmware
        deb-src https://deb.debian.org/debian bookworm-updates main non-free-firmware
        
        ->CTRL + O para salvar
        ->CTRL + X para sair

# Instalar Apache no Debian
        ->Comando apt install apache2
        ->Para verificar se o Apache foi instalado com sucesso vai no navegador e coloque o ip da maquina: https://ip.da.maquina:80
        ->Para visualizar o IP na máquina
        ->Comando ip a
        ->Copie o IP correspondente até a barra, depois do inet
        ->Ignore o IP 127.0.0.1, pois é o localhost
        ->Caso prefira verificar pela maquina basta digitar no terminal: systemctl status apache2

# Puxar repositório do sury
        #Use o repositório abaixo para baixar o php na versão 8.3
        ->apt install curl
        ->apt install apt-transport-https
        
        ->echo "deb https://packages.sury.org/php/ bookworm main" | tee /etc/apt/sources.list.d/php.list
        ->apt install gpg
        ->curl -fsSL https://packages.sury.org/php/apt.gpg | gpg --dearmor -o /etc/apt/trusted.gpg.d/php.gpg
        ->apt update
        ->apt upgrade

# Instalar PHP
        ->apt install php8.3
        - Verificar versão
        ->php -v
        - Realizar instalação do libapache2 e extensões
        ->apt install libapache2-mod-php8.3 php8.3-{cli,curl,fileinfo,intl,mbstring,mysql,sqlite3,zip}
        - Verificar lista de módulos
        ->php -m
        - Reiniciar o serviço do apache2
        ->systemctl restart apache2

# Instalar MariaDB
        ->apt install mariadb-server
        ->systemctl enable mariadb.service
        ->systemctl status mariadb.service
        ->systemctl restart mariadb
        
        #Se você tiver errado alguma coisa:
        ->systemctl disable mariadb.service
        ->apt remove mariadb-server
        #Instale novamente o mariadb

# Acessar o MariaDB
        ->mysql -u root -p
        #Abaixo está o comando que vai criar o seu usuário e banco de dados no mariadb:
        
        CREATE DATABASE nome_do_banco;
        CREATE USER 'usuario'@'localhost' IDENTIFIED BY 'senha';
        GRANT ALL PRIVILEGES ON nome_do_banco.* TO 'usuario'@'localhost';
        FLUSH PRIVILEGES;
        EXIT;

# Instalar e configurar o github
        ->apt install git
        #Acessar pasta de HTML do servidor e remover index.html padrão
        ->cd /var/www/html
        ->rm index.html
        #Clonar projeto no servidor
        ->cd /var/www/html
        ->git clone https://github.com/seu-usuario-do-github/repositorio.git ads, exemplo: git clone https://github.com/AntonielG/tads5.git ads

# Criar pastas e liberar permissões
        ->cd /var/www/html/pasta-do-projeto/
        ->mkdir logs
        ->mkdir tmp
        ->chmod -R 757 /var/www/html/pasta-do-projeto/logs
        ->chmod -R 757 /var/www/html/pasta-do-projeto/tmp
        ->chmod -R 557 /var/www/html/pasta-do-projeto/bin/cake

# Definir configurações do Apache2
        #Caso o a2enmod não funcione pode deixar ele de fora que não vai impactar o funcionamento do servidor
        ->a2enmod rewrite
        ->systemctl restart apache2
        ->cd /etc/apache2
        ->nano apache2.conf
        #Descer até a seção com tags <Directory />
        #Alterar tag
        #<Directory /var/www/>
        #AllowOverride None
        #Mudar None para All
        #Salvar edição
        ->CTRL + O
        ->Enter
        ->Sair
        ->CTRL + X
        ->cd sites-available
        ->nano 000-default.conf
        #Alterar DocumentRoot /var/www/html
        #Adicionar caminho da pasta raiz do projeto do Cake
        ->a2ensite 000-default.conf
        ->cd ..
        ->cd sites-enabled
        ->nano 000-default.conf
        #O arquivo 000-default.conf da pasta sites-enabled estar igual ao da pasta sites-available
        ->systemctl restart apache2



















FROM codercom/code-server

# Install PHP 8
RUN sudo apt update \
    && sudo apt install -y lsb-release ca-certificates apt-transport-https software-properties-common wget gnupg \
    && echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | sudo tee /etc/apt/sources.list.d/sury-php.list \
    && wget -qO - https://packages.sury.org/php/apt.gpg | sudo apt-key add - \
    && sudo apt update

RUN sudo apt -y install php8.0-cli
RUN sudo apt -y install php8.0-curl php8.0-xml
RUN sudo apt -y install composer

Заходим в фолдер с проектами. Клонируем репозиторий.
git clone https://your_name@bitbucket.org/olijen/wpi.git

Автоматическая сборка при помощи Vagrant:

Кратко: ставим Vagrant, прописываем IP, запускаем сборку.
(позже всё сведётся к команде vagrant up)

Устанавливаем Vagrant...

Заходим в фолдер проекта
cd wpi

vagrant/config/vagrant-local.yml меняем ip: на свободный ip системы.
Узнать его можно, например, с помощью команды
nmap -v -sP 192.168.0.142/24 | grep down

А так же добавляем домены в файл /etc/hosts
192.168.0.223   wpi.loc         # Адрес API сервера (используется клиент-приложением)
192.168.0.223   admin.wpi.loc   # Административная зона для участников проекта
192.168.0.223   localwpi.com    # для авторизации через Google нужна приставка .com


Стартуем виртуальную машину
vagrant up
Также запустится компиляция фронтенд-приложения на TypeScript и live-reload сервер Node.
Можно выйти через CTRL+C или открыть новый терминал (CTRL+ALT+T)

Заходим по адресу wpi.loc:4200 (angular frontend)

...

PROFIT!!!

Зайти на виртуальную машину можно, набрав в рабочей директории
vagrant ssh
Проект находится в /app

Как узнать, на каком IP находится виртуальная машина?
После коннекта машина сообщит её IP. (например, IP address for eth1: 192.168.0.223)
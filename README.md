Заходим в фолдер с проектами. Клонируем репозиторий.
git clone https://your_name@bitbucket.org/olijen/wp-ingenium.git

Устанавливаем Vagrant

Заходим в фолдер проекта
cd wp-ingenium

Стартуем виртуальную машину
vagrant up
*Для записи вывода в файл
VAGRANT_LOG=info vagrant up --debug  | tee vagrant/vagrant.log

Коннектимся к ней
vagrant ssh

После коннекта машина сообщит её IP. 
Заходим в /etc/hosts и подставляем этот IP вместо 127.0.0.1 в разделе wp-ingenium

Заходим по адресу wp-ingenium.loc

...

PROFIT!!!
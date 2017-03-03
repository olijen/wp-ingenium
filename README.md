Заходим в фолдер с проектами. Клонируем репозиторий.
git clone https://your_name@bitbucket.org/olijen/locaut.git

Устанавливаем Vagrant

Заходим в фолдер проекта
cd locaut

Стартуем виртуальную машину
vagrant up

Коннектимся к ней
vagrant ssh

После коннекта машина сообщит её IP. 
Заходим в /etc/hosts и подставляем этот IP вместо 127.0.0.1 в разделе locaut

Заходим по адресу locaut.loc

...

PROFIT!!!
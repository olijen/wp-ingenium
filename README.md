Заходим в фолдер с проектами. Клонируем репозиторий.
git clone https://your_name@bitbucket.org/olijen/wpi.git

Устанавливаем Vagrant

Заходим в фолдер проекта
cd wpi

Стартуем виртуальную машину
vagrant up
*Для записи вывода в файл
VAGRANT_LOG=info vagrant up --debug  | tee vagrant/vagrant.log

Коннектимся к ней
vagrant ssh

После коннекта машина сообщит её IP. 
Заходим в /etc/hosts и подставляем этот IP вместо 127.0.0.1 в разделе wpi

Заходим по адресу wpi.loc

...

PROFIT!!!

# ANGULAR CLI

# Создать новый компонент
ng generate component my-new-component

# Создать новую директиву
ng generate directive my-new-directive

# Создать новый pipe
ng generate pipe my-new-pipe

# Создать новый сервис
ng generate service my-new-service

# Создать новый класс
ng generate class my-new-class

# Создать новый интерфейс
ng generate interface my-new-interface

# Создать новый enum
ng generate enum my-new-enum
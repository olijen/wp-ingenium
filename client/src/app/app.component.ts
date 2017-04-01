import { Component } from '@angular/core';

//@Component в качестве параметра принимает объект с конфигурацией, которая указывает
// фреймворку, как работать с компонентом и его представлением.
@Component({
    moduleId: module.id,
    selector: 'app',
    templateUrl: 'app.component.html'
})

export class AppComponent { }
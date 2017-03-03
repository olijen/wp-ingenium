import { Component } from '@angular/core';

const todos = [
    'some TODO',
    'some TODO',
    'some TODO',
    'some TODO',
];
const actions = [

];

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'TODO list';
  todos = todos;
  actions = actions;
}

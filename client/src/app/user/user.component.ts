import { Component, OnInit } from '@angular/core';
var users = [
  {id: 1, name: 'Name1', email:'olijenius@gmail.com',},
  {id: 2, name: 'Name2', email:'olijenius@gmail.com',},
  {id: 3, name: 'Name3', email:'olijenius@gmail.com',},
  {id: 4, name: 'Name4', email:'olijenius@gmail.com',},
  {id: 5, name: 'Name5', email:'olijenius@gmail.com',},
];
@Component({
  selector: 'app-user',
  templateUrl: './user.component.html',
  styleUrls: ['./user.component.css']
})
export class UserComponent implements OnInit {
  users = users;

  constructor() {
    console.log(this.name);
  }

  ngOnInit() {
    console.log(this);
    console.log(this.name);
  }

}

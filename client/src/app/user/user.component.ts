import { Component, OnInit } from '@angular/core';

var users = [
  {id: 1, name: 'Name1', email:'olijenius@gmail.com', admin: true},
  {id: 2, name: 'Name2', email:'olijenius@gmail.com', admin: false},
  {id: 3, name: 'Name3', email:'olijenius@gmail.com', admin: true},
  {id: 4, name: 'Name4', email:'olijenius@gmail.com', admin: false},
  {id: 5, name: 'Name5', email:'olijenius@gmail.com', admin: true},
];

@Component({
  selector: 'app-user',
  templateUrl: './user.component.html',
  styleUrls: ['./user.component.css']
})
export class UserComponent implements OnInit {
  users = users;

  constructor() {
    console.log(this.users[0].name);
  }

  ngOnInit() {
    console.log(this);
    console.log(this.users[0].name);
  }

  create() {
    
  }

  read() {

  }

  update() {

  }

  remove() {

  }

}

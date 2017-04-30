import { Component, OnInit } from '@angular/core';

import { User } from '../_models/index';

@Component({
    moduleId: module.id,
    templateUrl: 'home.component.html'
})

export class HomeComponent implements OnInit {
    customer: User;
    users: User[] = [];

    constructor() {
        this.customer = JSON.parse(localStorage.getItem('customer'));
    }

    ngOnInit() {
        
    }
}
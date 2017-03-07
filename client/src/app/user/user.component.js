"use strict";
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var core_1 = require('@angular/core');
var users = [
    { id: 1, name: 'Name1', email: 'olijenius@gmail.com' },
    { id: 2, name: 'Name2', email: 'olijenius@gmail.com' },
    { id: 3, name: 'Name3', email: 'olijenius@gmail.com' },
    { id: 4, name: 'Name4', email: 'olijenius@gmail.com' },
    { id: 5, name: 'Name5', email: 'olijenius@gmail.com' },
];
var UserComponent = (function () {
    function UserComponent() {
        this.users = users;
        console.log(this.name);
    }
    UserComponent.prototype.ngOnInit = function () {
        console.log(this);
        console.log(this.name);
    };
    UserComponent = __decorate([
        core_1.Component({
            selector: 'app-user',
            templateUrl: './user.component.html',
            styleUrls: ['./user.component.css']
        })
    ], UserComponent);
    return UserComponent;
}());
exports.UserComponent = UserComponent;
//# sourceMappingURL=user.component.js.map
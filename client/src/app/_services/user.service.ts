import { Injectable } from '@angular/core';
import { Http, Headers, RequestOptions, Response } from '@angular/http';

import { User } from '../_models/index';

@Injectable()
export class UserService {
    constructor(private http: Http) { }

    getById(id: number) {
        return this.http.get('http://localwpi.com/customers' + id, this.jwt())
            .map((response: Response) => response.json());
    }

    getCurrent() {
        let id = JSON.parse(localStorage.getItem('auth')).id;
        return this.http.get('http://localwpi.com/customers/' + id, this.jwt())
            .map((response: Response) => {
                console.log(response, 'getCurrent resp');
                response = response.json();
                localStorage.setItem('customer', JSON.stringify(response));
                return response;
            });
    }

    create(user: User) {
        return this.http.post('http://localwpi.com/customers', user, this.jwt())
            .map((response: Response) => response.json());
    }

    update(user: User) {
        return this.http.put('http://localwpi.com/customers' + user.id, user, this.jwt())
            .map((response: Response) => response.json());
    }

    delete(id: number) {
        return this.http.delete('http://localwpi.com/customers' + id, this.jwt())
            .map((response: Response) => response.json());
    }

    private jwt() {
        let currentUser = JSON.parse(localStorage.getItem('auth'));
        if (currentUser && currentUser.token) {
            let headers = new Headers({ 'Authorization': 'Bearer ' + currentUser.token });
            return new RequestOptions({ headers: headers });
        }
    }
}

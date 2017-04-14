import { Injectable } from '@angular/core';
import { Http, Headers, Response } from '@angular/http';
import { Observable } from 'rxjs/Observable';
import 'rxjs/add/operator/map'

@Injectable()
export class AuthenticationService {
    constructor(private http: Http) { }

    login(username: string, password: string) {
        return this.http.post(
            'http://localwpi.com/customers?login=1',
            { username: username, password: password /*todo: remember me*/}
        ).map((response: Response) => {
            let user = response.json();
            if (user && user.auth_key) {
                localStorage.setItem('currentUser', JSON.stringify(user));
                console.log(localStorage);
            } else {
                //todo: alert block
            }
        });
    }

    logout() {
        localStorage.removeItem('currentUser');
    }
}
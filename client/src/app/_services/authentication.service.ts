import { Injectable } from '@angular/core';
import { Http, Response } from '@angular/http';
import 'rxjs/add/operator/map'

@Injectable()
export class AuthenticationService {
    constructor(private http: Http) { }

    login(username: string, password: string) {
        return this.http.post(
            'http://localwpi.com/security',
            { username: username, password: password /*todo: remember me*/}
        ).map((response: Response) => {
            console.log(response);
            let user = response.json();
            if (user && user.token) {
                localStorage.setItem('auth', JSON.stringify(user));
            } else {
                console.log('token empty');
                //todo: alert block
            }
        });
    }

    logout() {
        localStorage.removeItem('auth');
        localStorage.removeItem('customer');
    }
}
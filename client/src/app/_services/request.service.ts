import { Injectable } from '@angular/core';
import {AlertService} from "./alert.service";
import { Http, Headers, RequestOptions, Response } from '@angular/http';

@Injectable()
export class RequestService {

    constructor(
        private alertService: AlertService,
        private http: Http
    ) {

    }
    //todo: промежуточный перехват статуса и отображение ошибки валидации
    post(url: string, body: any, jwt: boolean = true) {
        return this.http.post(url, body, (jwt ? this.jwt() : undefined))
            .map((response: Response) => {
                console.log(response);
                if (response.status < 200) {
                    throw new Error('This request has (<200) - ' + response.status);
                } else if (response.status == 422) {
                    this.alertService.serverValidationErrors(response.json());
                }
                return response.json()
            });
    }

    private jwt() {
        let currentUser = JSON.parse(localStorage.getItem('auth'));
        if (currentUser && currentUser.token) {
            let headers = new Headers({ 'Authorization': 'Bearer ' + currentUser.token });
            return new RequestOptions({ headers: headers });
        }
    }
}
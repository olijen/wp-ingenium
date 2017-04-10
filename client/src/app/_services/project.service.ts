import { Injectable } from '@angular/core';
import { Http, Headers, RequestOptions, Response } from '@angular/http';

import { Project } from '../_models/index';

@Injectable()
export class ProjectService {
    constructor(private http: Http) { }

    getAll() {
        console.log('Get all');
        return this.http.get('http://localwpi.com/projects'/*, this.jwt()*/).map((response: Response) => response.json());
    }

    getById(id: number) {
        return this.http.get('http://localwpi.com/projects/' + id/*, this.jwt()*/).map((response: Response) => response.json());
    }

    create(project: Project) {
        return this.http.post('/api/projects', project, this.jwt()).map((response: Response) => response.json());
    }

    update(project: Project) {
        return this.http.put('/api/projects/' + project.id, project, this.jwt()).map((response: Response) => response.json());
    }

    delete(id: number) {
        return this.http.delete('/api/projects/' + id, this.jwt()).map((response: Response) => response.json());
    }
    
    //JSON web token
    private jwt() {
        // create authorization header with jwt token
        let currentUser = JSON.parse(localStorage.getItem('currentUser'));
        if (currentUser && currentUser.token) {
            let headers = new Headers({ 'Authorization': 'Bearer ' + currentUser.token });
            return new RequestOptions({ headers: headers });
        }
    }
}
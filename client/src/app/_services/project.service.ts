import { Injectable } from '@angular/core';
import { Http, Headers, RequestOptions, Response } from '@angular/http';

import { Project } from '../_models/index';

@Injectable()
export class ProjectService {
    
    constructor(private http: Http) { }

    getAll() {
        return this.http.get('http://localwpi.com/projects', ProjectService.jwt())
            .map((response: Response) => response.json());
    }

    getById(id: number) {
        return this.http.get('http://localwpi.com/projects/' + id, ProjectService.jwt())
            .map((response: Response) => response.json());
    }

    create(project: Project) {
        return this.http.post('http://localwpi.com/projects', project, ProjectService.jwt())
            .map((response: Response) => response.json());
    }

    update(project: Project) {
        return this.http.put('http://localwpi.com/projects/' + project.id, project, ProjectService.jwt())
            .map((response: Response) => {return true;});
    }

    delete(id: number) {
        return this.http.delete('http://localwpi.com/projects/' + id, ProjectService.jwt())
            .map((response: Response) => {return true});
    }
    
    //JSON web token
    private static jwt() {
        // create authorization header with jwt token
        let currentUser = JSON.parse(localStorage.getItem('auth'));
        if (currentUser && currentUser.token) {
            let headers = new Headers({ 'Authorization': 'Bearer ' + currentUser.token });
            return new RequestOptions({ headers: headers });
        }
    }
}

import { Injectable } from '@angular/core';
import { Http, Headers, RequestOptions, Response } from '@angular/http';

import { Issue } from '../_models/index';

@Injectable()
export class IssueService {
    constructor(private http: Http) { }

    getAll(projectId: number) {
        return this.http.get('http://localwpi.com/projects/' + projectId + '/issues', IssueService.jwt())
            .map((response: Response) => response.json());
    }

    getById(id: number) {
        return this.http.get('http://localwpi.com/issues/' + id, IssueService.jwt())
            .map((response: Response) => response.json());
    }

    create(issue: Issue, projectId: number) {
        return this.http.post('http://localwpi.com/projects/' + projectId + '/issues', issue, IssueService.jwt())
            .map((response: Response) => response.json());
    }

    update(issue: Issue) {
        return this.http.put('http://localwpi.com/issues/' + issue.id, issue, IssueService.jwt())
            .map((response: Response) => response.json());
    }

    delete(id: number) {
        return this.http.delete('http://localwpi.com/issues/' + id, IssueService.jwt())
            .map((response: Response) => response.json());
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

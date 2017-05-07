import { Component, OnInit } from '@angular/core';
import {ActivatedRoute} from '@angular/router';

import { Issue } from '../_models/index';
import { IssueService } from '../_services/index';

@Component({
    moduleId: module.id,
    templateUrl: 'issues.list.component.html'
})

export class IssuesListComponent implements OnInit
{
    issues: Issue[] = [];
    projectId: number;

    constructor(
        private issueService: IssueService,
        private activateRoute: ActivatedRoute
    ) {
        console.log('construct issue');
        this.projectId = activateRoute.snapshot.params['project_id'];
    }

    ngOnInit() {
        console.log('Load issues');
        this.loadAll();
    }

    private loadAll() {
        this.issueService.getAll(this.projectId).subscribe(issues => { this.issues = issues; });
    }
}

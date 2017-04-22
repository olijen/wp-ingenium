import { Component, OnInit } from '@angular/core';

import { Issue } from '../_models/index';
import { IssueService } from '../_services/index';

@Component({
    moduleId: module.id,
    templateUrl: 'issues.list.component.html'
})

export class IssuesListComponent implements OnInit
{
    issues: Issue[] = [];

    constructor(private issueService: IssueService)
    {
        console.log('construct issue');
    }

    ngOnInit()
    {
        console.log('Load issues');
        this.loadAll();
    }

    create(issue)
    {
        this.issueService.create(issue).subscribe(() => { this.loadAll() });
    }

    private loadAll()
    {
        this.issueService.getAll().subscribe(issues => { this.issues = issues; });
    }

}
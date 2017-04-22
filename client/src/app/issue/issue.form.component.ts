import {Component, OnInit} from '@angular/core';
import {ActivatedRoute} from '@angular/router';

import {Issue, Project} from '../_models/index';
import {IssueService, ProjectService} from '../_services/index';

@Component({
    moduleId: module.id,
    templateUrl: 'issue.form.component.html'
})

export class IssueFormComponent implements OnInit {
    id:number;
    projectId:number;
    issue:Issue;
    project:Project;

    constructor(
        private issueService:IssueService,
        private projectService:ProjectService,
        private activateRoute:ActivatedRoute
    ) {
        console.log('proj form construct!!3');
        this.id = activateRoute.snapshot.params['id'];
        this.projectId = activateRoute.snapshot.params['project_id'];
    }

    ngOnInit() 
    {
        this.loadProject();
        this.loadIssue();
    }
    
    private onSubmit() 
    {
        (this.id) ? this.update() : this.create();
    }

    private create() 
    {
        console.log('create form');
        this.issueService.create(this.issue).subscribe((issue: Issue) => {
            console.log(issue);
        });
    }

    private update() {
        this.issueService.update(this.issue).subscribe((issue: Issue) => {
            console.log(issue);
        });
    }

    private loadIssue() 
    {
        if (this.id) {
            this.issueService.getById(this.id).subscribe((issue: Issue) => {
                console.log(issue);
                this.issue = issue;
            });
        } else {
            this.issue = new Issue;
        }
    }
    
    private loadProject()
    {
        this.projectService.getById(this.projectId).subscribe((project: Project) => {
            console.log(project);
            this.project = project;
        });
    }
}

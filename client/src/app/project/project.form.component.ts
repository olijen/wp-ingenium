import {Component, OnInit} from '@angular/core';

import {Project} from '../_models/index';
import {ProjectService} from '../_services/index';
import {ActivatedRoute} from '@angular/router';

@Component({
    moduleId: module.id,
    templateUrl: 'project.form.component.html'
})

export class ProjectFormComponent implements OnInit {
    id:number;
    project:Project;

    constructor(
        private projectService:ProjectService,
        private activateRoute:ActivatedRoute
    ) {
        console.log('proj form construct!!3');
        this.id = activateRoute.snapshot.params['id'];
    }

    ngOnInit() 
    {
        this.loadProject();
    }
    
    private onSubmit() 
    {
        (this.id) ? this.update() : this.create();
    }

    private create() 
    {
        console.log('create form');
        this.projectService.create(this.project).subscribe((project: Project) => {
            console.log(project);
        });
    }

    private update() {
        this.projectService.update(this.project).subscribe((project: Project) => {
            console.log(project);
        });
    }

    private loadProject() 
    {
        if (this.id) {
            this.projectService.getById(this.id).subscribe((project: Project) => {
                console.log(project);
                this.project = project;
            });
        } else {
            this.project = new Project;
        }
    }
}

import {Component, OnInit} from '@angular/core';

import {Project} from '../_models/index';
import {ProjectService} from '../_services/index';
import {ActivatedRoute} from '@angular/router';

@Component({
    moduleId: module.id,
    templateUrl: 'project.component.html'
})

export class ProjectComponent implements OnInit {
    project:Project;
    id:number;

    constructor(
        private projectService:ProjectService,
        private activateRoute:ActivatedRoute
    ) {
        this.id = activateRoute.snapshot.params['id'];
    }

    ngOnInit() {
        this.loadProject();
    }

    delete() {
        this.projectService.delete(this.id).subscribe((result:boolean) => {
            console.log(result);
        });
    }

    private loadProject() {
        this.projectService.getById(this.id).subscribe((project: Project) => {
            console.log(project);
            this.project = project;
        });
    }
}

import { Component, OnInit } from '@angular/core';

import { Project } from '../_models/index';
import { ProjectService } from '../_services/index';

@Component({
    selector: 'projects-list',
    moduleId: module.id,
    templateUrl: 'projectslist.component.html'
})

export class ProjectsListComponent implements OnInit {
    projects: Project[] = [];

    constructor(private projectService: ProjectService) {

    }

    ngOnInit() {
        console.log('Load projects');
        this.loadAllProjects();
    }

    createProject(project) {
        this.projectService.create(project).subscribe(() => { this.loadAllProjects() });
    }

    private loadAllProjects() {
        this.projectService.getAll().subscribe(projects => { this.projects = projects; });
    }

}
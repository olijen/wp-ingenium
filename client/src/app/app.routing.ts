import { Routes, RouterModule } from '@angular/router';

import { HomeComponent } from './home/index';
import { LoginComponent } from './login/index';
import { RegisterComponent } from './register/index';
import { ProjectComponent, ProjectsListComponent, ProjectFormComponent } from './project/index';
import { IssueComponent, IssuesListComponent, IssueFormComponent } from './issue/index';

import { AuthGuard } from './_guards/index';

const appRoutes: Routes = [
    { path: '', component: HomeComponent, canActivate: [AuthGuard] },
    { path: 'login', component: LoginComponent },
    { path: 'projects/:project_id/issues/form', component: IssueFormComponent },

    { path: 'register', component: RegisterComponent },
    { path: 'projects/form', component: ProjectFormComponent },
    { path: 'projects/:id/form', component: ProjectFormComponent },
    { path: 'projects', component: ProjectsListComponent },
    { path: 'projects/:project_id/issues', component: IssuesListComponent },
    { path: 'projects/:id', component: ProjectComponent },

    { path: 'issues/form', component: IssueFormComponent },
    { path: 'issues/:id/form', component: IssueFormComponent },
    { path: 'issues/:id', component: IssueComponent },

    // otherwise redirect to home
    { path: '**', redirectTo: '' }
];

export const routing = RouterModule.forRoot(appRoutes);
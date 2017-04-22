import { NgModule }      from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { FormsModule }    from '@angular/forms';
import { HttpModule } from '@angular/http';

import { AppComponent }  from './app.component';
import { routing }        from './app.routing';

import { AlertComponent } from './_directives/index';
import { AuthGuard } from './_guards/index';
import { AlertService, AuthenticationService, UserService, ProjectService, IssueService } from './_services/index';

import { HomeComponent } from './home/index';
import { LoginComponent } from './login/index';
import { RegisterComponent } from './register/index';

import { ProjectComponent, ProjectsListComponent, ProjectFormComponent } from './project/index';
import { IssueComponent, IssuesListComponent, IssueFormComponent } from './issue/index';

// used to create fake backend
import { fakeBackendProvider } from './_helpers/index';
import { MockBackend, MockConnection } from '@angular/http/testing';
import { BaseRequestOptions } from '@angular/http';

@NgModule({
    //набор классов представлений, которые должны использоваться в шаблонах компонентов из других модулей
    exports: [
        
    ],
    //другие модули, классы которых необходимы для шаблонов компонентов из текущего модуля
    imports: [
        BrowserModule,
        FormsModule,
        HttpModule,
        routing
    ],
    //классы представлений (view classes), которые принадлежат модулю (comp, dir, pipes)
    declarations: [
        AppComponent,
        AlertComponent,
        HomeComponent,
        LoginComponent,
        RegisterComponent,
        
        ProjectComponent,
        ProjectsListComponent,
        ProjectFormComponent,

        IssueComponent,
        IssuesListComponent,
        IssueFormComponent
    ],
    //классы, создающие сервисы, используемые модулем
    providers: [
        AuthGuard,
        AlertService,
        AuthenticationService,
        UserService,
        ProjectService,
        IssueService,

        // providers used to create fake backend
        //fakeBackendProvider,
        MockBackend,
        BaseRequestOptions
    ],
    //корневой компонент, который вызывается по умолчанию при загрузке приложения
    bootstrap: [AppComponent]
})

export class AppModule { }
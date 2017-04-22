import {Component, OnInit} from '@angular/core';

import {Issue} from '../_models/index';
import {IssueService} from '../_services/index';
import {ActivatedRoute} from '@angular/router';

@Component({
  moduleId: module.id,
  templateUrl: 'issue.component.html'
})

export class IssueComponent implements OnInit {
  issue:Issue;
  id:number;

  constructor(
      private issueService:IssueService,
      private activateRoute:ActivatedRoute
  ) {
    this.id = activateRoute.snapshot.params['id'];
  }

  ngOnInit() {
    this.loadIssue();
  }

  deleteIssue() {
    this.issueService.delete(this.id).subscribe(() => {
    });
  }

  private loadIssue() {
    this.issueService.getById(this.id).subscribe((issue: Issue) => {
      console.log(issue);
      this.issue = issue;
    });
  }
}

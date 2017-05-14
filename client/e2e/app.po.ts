import { browser, element, by } from 'protractor';

export class ClientPage {
  navigateTo() {
    return browser.get('/');
  }

  getTitleText() {
    return element(by.tagName('h2')).getText();
  }
}

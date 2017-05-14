import { ClientPage } from './app.po';

describe('Main page', () => {
  let page: ClientPage;

  beforeEach(() => {
    page = new ClientPage();
  });

  it('should display login page, because i am guest', () => {
    page.navigateTo();
    expect(page.getTitleText()).toEqual('Login');
  });
});

/*describe('Register page', () => {
  let page: LoginPage;

  beforeEach(() => {
    page = new RegisterPage();
  });

  it('should display register page', () => {
    page.navigateTo();
    expect(page.getTitleText()).toEqual('Login');
  });
});*/

//client page

//projects actions

//issues actions

//logout and check permissions

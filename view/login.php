
<style>
  @import url('https://fonts.googleapis.com/css?family=Raleway:400,700');

#login_wrapper {

  font-family: Raleway, sans-serif;
  color: #666;
}

#login_wrapper .login {
  margin: 20px auto;
  padding: 40px 50px;
  max-width: 300px;
  border-radius: 5px;
 
}
  #login_wrapper .login input {
    width: 100%;
    display: block;
    box-sizing: border-box;
    margin: 10px 0;
    padding: 14px 12px;
    font-size: 16px;
    border-radius: 2px; 
    font-family: Raleway, sans-serif;
  }

#login_wrapper .login input[type=text],
#login_wrapper .login input[type=password] {
  border: 1px solid #c0c0c0;
  transition: .2s;
}

#login_wrapper .login input[type=text]:hover {
  border-color: #F44336;
  outline: none;
  transition: all .2s ease-in-out;
} 

#login_wrapper .login input[type=submit] {
  border: none;
  background: #EF5350;
  color: white;
  font-weight: bold;  
  transition: 0.2s;
  margin: 20px 0px;
}

#login_wrapper .login input[type=submit]:hover {
  background: #F44336;  
}

  #login_wrapper .login h2 {
    margin: 20px 0 0; 
    color: #EF5350;
    font-size: 28px;
  }

#login_wrapper .login p {
  margin-bottom: 40px;
}

#login_wrapper .links {
  display: table;
  width: 100%;  
  box-sizing: border-box;
  border-top: 1px solid #c0c0c0;
  margin-bottom: 10px;
}

#login_wrapper .links a {
  display: table-cell;
  padding-top: 10px;
}

#login_wrapper .links a:first-child {
  text-align: left;
}

#login_wrapper .links a:last-child {
  text-align: right;
}

  #login_wrapper .login h2,
  #login_wrapper .login p,
  #login_wrapper .login a {
    text-align: center;    
  }

#login_wrapper .login a {
  text-decoration: none;  
  font-size: .8em;
}

#login_wrapper .login a:visited {
  color: inherit;
}

#login_wrapper .login a:hover {
  text-decoration: underline;
}

</style>
<section id="login_wrapper">
  <form class="login">
    <h2>Welcome, User!</h2>
    <p>Please log in</p>
    <input type="text" name="customer_email" placeholder="User Email" />
    <input type="password" name="customer_password" placeholder="Password" />
    <input type="submit" name="login" value="LogIn" />
    <div class="links">
      <a href="http://localhost/clones/igotit/public/forgotpassword">Forgot password</a>
      <a href="http://localhost/clones/igotit/public/register">Register</a>
    </div>
  </form>
  
  </section>
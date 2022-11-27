<?php
/* ********************************************************
 * ********************************************************
 * ********************************************************/
class UserBo {

  protected $dao;

  /* ********************************************************
	 * ********************************************************
	 * ********************************************************/
  public function __construct() {
    $this->dao = new UserDao(new MysqlDatabaseBo());
  }

  /* ********************************************************
	 * ********************************************************
	 * ********************************************************/
  public function getUsers() {
    return ($this->dao)->getUsers();
  }

  /* ********************************************************
	 * ********************************************************
	 * ********************************************************/
  public function createUser(array $parameters) {
    LogHelper::add(implode('/', $parameters));
    return ($this->dao)->createUser($parameters);
  }

  /* ********************************************************
	 * ********************************************************
	 * ********************************************************/
  public function getUserForgotPassword(array $parameters) {
    //TODO: Agree on message translations and factor out this string...
    //TODO: Agree on password retrieval/resetting method and finish this function...
    //TODO: This is a terrible hack until I debud the REQUEST/GET/POST mixmatch issue from .htaccess redirects
    return "Kérjük nézd meg az e-mail fiókod: {$parameters[0]}";
  }

}
?>

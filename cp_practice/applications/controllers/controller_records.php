<?php
class Controller_Records extends Controller
{
    function __construct()
        {
            $this->model = new model_records();
            $this->view = new View();
        }

        function handleRequest()
        {
            if(isset($_GET["action"]))
                {
                if ($_GET["action"] == 'new')
                    {
                    if ( isset($_POST['form-submitted']) )
                        {
                            $name = isset($_POST['name'])? "'".$_POST['name']."'":NULL;
                            $artist = isset($_POST['artist'])? "'".$_POST['artist']."'":NULL;
                            $desc = isset($_POST['desc'])? "'".$_POST['desc']."'":NULL;
                            $paperback = isset($_POST['paperback'])? "'".$_POST['paperback']."'":NULL;
                            $recyear = isset($_POST['recyear'])? "'".$_POST['recyear']."'":NULL;
                            $relyear = isset($_POST['relyear'])? "'".$_POST['relyear']."'" : NULL;
                            $aviability = isset($_POST['aviability'])? "'".$_POST['aviability']."'" : NULL;
                            $genre = isset($_POST['genre'])? "'".$_POST['genre']."'" : NULL;
                            $price = isset($_POST['price'])? "'".$_POST['price']."'" : NULL;
                            $rtype = isset($_POST['rtype'])? "'".$_POST['rtype']."'" : NULL;
                            $duration = isset($_POST['duration'])? "'".$_POST['duration']."'" : NULL;
                            $this->addRecord($name, $artist, $desc, $paperback, $recyear,$relyear, $aviability, $genre, $price, $rtype, $duration);
                    } else
                    $this->view->generate('record_form.php', 'template_view.php', null);
                }

                if($_GET['action'] == 'delete'){
                    $this->deleteRecord($_GET['product']);
                }

                if($_GET['action']== 'edit'){
                    $data = $this->model->get_one($_GET['product']);
                    $this->view->generate('record_form.php','template_view.php',$data);
                    $this->editRecord($_GET['product']);
                }

                if($_GET["action"]== 'log'){
                    if(isset($_POST['form-submitted']))
                    {
                        $login = isset($_POST['login'])? "'".$_POST['login']."'":NULL;
                        $password = isset($_POST['password'])? "'".$_POST['password']."'":NULL;
                        $this->loginUser($login, $password);
                    } else
                    $this->view->generate('login_view.php','template_view.php');
                }
                if($_GET["action"]== 'reg'){
                    if(isset($_POST['form-submitted']))
                    {
                        $login = isset($_POST['login'])? "'".$_POST['login']."'":NULL;
                        $email = isset($_POST['email'])? "'".$_POST['email']."'":NULL;
                        $password = isset($_POST['password'])? "'".$_POST['password']."'":NULL;
                        $chpassword = isset($_POST['chpassword'])? "'".$_POST['chpassword']."'":NULL;

                        if($password != $chpassword) die("Passwords are different");
                        $this->registerUser($login, $email, $password); 
                    } else
                    $this->view->generate('register_view.php','template_view.php');
                }

                if($_GET["action"]== 'short'){
                    $this->showProduct($_GET["product"]);
                }

                if($_GET["action"]=='user'){
                    if(isset($_POST['form-submitted']))
                    {
                        $mail = isset($_POST['mail'])? "'".$_POST['mail']."'":NULL;
                        $sname = isset($_POST['sname'])? "'".$_POST['sname']."'":NULL;
                        $name = isset($_POST['name'])? "'".$_POST['name']."'":NULL;
                        $fname = isset($_POST['fname'])? "'".$_POST['fname']."'":NULL;
                        $tnumber = isset($_POST['tnumber'])? "'".$_POST['tnumber']."'":NULL;
                        $sa = isset($_POST['sa'])? "'".$_POST['sa']."'":NULL;
                        $st = isset($_POST['st'])? "'".$_POST['st']."'":NULL;

                        $this->UpdateUser($mail, $sname,$name,$fname,$tnumber,$sa,$st);
                    } else
                    $this->userCabinet();
                }

                if($_GET["action"]=='logout'){
                    $this->logout();
                }

                if($_GET["action"]=='deleteacc'){
                    $this->model->deleteAcc();
                    $this->logout();
                }

                if($_GET["action"]=='order'){
                    $data = $this->model->get_one($_GET['product']);
                    $this->model->add_cart($data);
                }

                if($_GET["action"]=='drop'){
                    $data = $this->model->get_one($_GET['product']);
                    $this->model->drop_cart($data);
                }
                
                if($_GET["action"]=='cart'){
                    $this->view->generate('cart_view.php','template_view.php');
                }

                if($_GET["action"]=='clear'){
                    $this->view->generate('clear.php','template_view.php');
                }
                
            }
            else
            $this->listRecords();
        }

    function listRecords()
        {
            $data = $this->model->get_all();
            $this->view->generate('list_view.php', 'template_view.php',$data);
        }

    function loginUser($login, $password)
    {
        $this->model->log($login, $password);
    }

    function registerUser($login, $email, $password)
    {
        $this->model->reg($login, $email, $password);
        header('Location:index.php');
    }

    function addRecord($name, $artist, $desc, $paperback, $recyear,$relyear, $aviability, $genre, $price, $rtype, $duration)
	{
		$this->model->insert($name, $artist, $desc, $paperback, $recyear,$relyear, $aviability, $genre, $price, $rtype, $duration);
		header('Location:index.php');
	}

    function deleteRecord($id)
    {
        $this->model->delete_record($id);
        $this->listRecords();
    }

    function editRecord($id)
    {
        $data = $this->model->get_one($id);
        $this->view->generate('record_form.php','template_view.php',$data);
    }

    function showProduct($id)
    {
        $data = $this->model->get_one($id);
        $this->view->generate('record_view.php','template_view.php',$data);
    }
    function userCabinet()
    {
        $this->view->generate('user_view.php','template_view.php');
    }
    function UpdateUser($mail, $sname,$name,$fname,$tnumber,$sa,$st)
    {
        $this->model->update($mail, $sname,$name,$fname,$tnumber,$sa,$st);
        $this->userCabinet();
    }
    function logout()
    {
        $this->view->generate('logout.php','template_view.php');
    }
}
?>
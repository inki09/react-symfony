<?php
/**
 * Created by PhpStorm.
 * User: Allur-11
 * Date: 26/11/2019
 * Time: 15:07
 */

namespace App\Manager;


use App\Entity\Customer\UserCustomer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ContainerInterface;

class UserManager extends AbstractController implements UserManagerInterface
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    public function __construct(ContainerInterface $container)
   {

       $this->container = $container;
       $this->emC = $this->container->get('doctrine.orm.customer_entity_manager');
   }

    public function getEmCustormer($email)
    {
        $conn = $this->emC->getConnection();
        $sql = "SELECT * FROM user_customer WHERE email = :email";
        $test = $conn->prepare($sql);
        $test->execute(array('email' => $email));
        $userCustomer = $test->fetchAll();
       return $userCustomer;

    }
}
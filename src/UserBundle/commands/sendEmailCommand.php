<?php 
namespace UserBundle\commands;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Zend\Validator\Sitemap\Loc;

class sendEmailCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('cmd:sendEmail')
            ->setDescription('command description')
            //->addArgument('id', InputArgument::REQUIRED, 'Id')
            //->addArgument('type', InputArgument::REQUIRED, 'Tipo')
        ;
    }

    //Esta función es llamada cada hora desde una tarea del servidor para mandar un correo a los proveedores juniors

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $container              = $this->getContainer();
        $em                     = $container->getDoctrine()->getEntityManager();

    }
}
?>
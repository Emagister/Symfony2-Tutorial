<?php
namespace Emagister\BannersBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;

class NewsletterCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('emagister:newsletter')
             ->setDescription('Nuestro primer command en Symfony2');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('<info>Ejecutando newsletter</info>');
        $output->writeln('<error>Ejecutando newsletter</error>');
        $output->writeln('<question>Ejecutando newsletter</question>');
        $output->writeln('<comment>Ejecutando newsletter</comment>');

        $output->getFormatter()
            ->setStyle('fcbarcelona',
                   new OutputFormatterStyle('red', 'blue',
                       array('blink', 'bold', 'underscore')
                                            ));
        $output->writeln('<fcbarcelona>Messi for the win</fcbarcelona>');
    }
}
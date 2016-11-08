<?php

namespace Concrete\Core\Console\Command;

use Concrete\Core\Support\Symbol\ClassSymbol\ClassSymbol;
use Concrete\Core\Support\Symbol\ClassSymbol\MethodSymbol\MethodSymbol;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Exception;

class GenerateIDESymbolsCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('c5:ide-symbols')
            ->setDescription('Generate IDE symbols')
            ->addArgument('generate-what', InputArgument::IS_ARRAY, 'Elements to generate [all|ide-classes|phpstorm]', array('all'))
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $rc = 0;
        try {
            $what = $input->getArgument('generate-what');
            if (in_array('all', $what) || in_array('ide-classes', $what)) {
                $output->write('Generating fake PHP classes to help IDE... ');
                $this->generateIDEClasses();
                $output->writeln('<info>done.</info>');
            }
            if (in_array('all', $what) || in_array('phpstorm', $what)) {
                $output->write('Generating PHP metadata for PHPStorm... ');
                $this->generatePHPStorm();
                $output->writeln('<info>done.</info>');
            }
        } catch (Exception $x) {
            $output->writeln('<error>'.$x->getMessage().'</error>');
            $rc = 1;
        }

        return $rc;
    }

    protected function generatePHPStorm()
    {
        $metadataGenerator = new \Concrete\Core\Support\Symbol\MetadataGenerator();
        $metadata = $metadataGenerator->render();
        $filename = DIR_BASE . '/concrete/src/Support/.phpstorm.meta.php';
        if (file_put_contents($filename, $metadata) === false) {
            throw new Exception('Error writing to file "'.$filename.'"');
        }
    }

    protected function generateIDEClasses()
    {
        $generator = new \Concrete\Core\Support\Symbol\SymbolGenerator();
        $symbols = $generator->render(
            "\n",
            '    ',
            function (ClassSymbol $class, MethodSymbol $method) {
                if ($class->isFacade()) {
                    return true;
                }

                return false;
            }
        );
        $filename = DIR_BASE . '/concrete/src/Support/__IDE_SYMBOLS__.php';
        if (file_put_contents($filename, $symbols) === false) {
            throw new Exception('Error writing to file "'.$filename.'"');
        }
    }
}

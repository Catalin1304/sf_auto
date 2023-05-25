<?php

namespace App;

use Doctrine\Bundle\DoctrineBundle\DoctrineBundle;
use Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle;
use FOS\UserBundle\FOSUserBundle;
use Knp\Bundle\MarkdownBundle\KnpMarkdownBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Bundle\MakerBundle\MakerBundle;
use Symfony\Bundle\SecurityBundle\SecurityBundle;
use Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle;
use Symfony\Bundle\TwigBundle\TwigBundle;
use Symfony\Bundle\WebProfilerBundle\WebProfilerBundle;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\WebpackEncoreBundle\WebpackEncoreBundle;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    public function registerBundles(): iterable
    {
        $bundles = array(
            new FOSUserBundle(),
            new FrameworkBundle(),
            new DoctrineBundle(),
            new DoctrineMigrationsBundle(),
            new MakerBundle(),
            new TwigBundle(),
            new SecurityBundle(),
            new SwiftmailerBundle(),
            new WebProfilerBundle(),
            new WebpackEncoreBundle(),
            new KnpMarkdownBundle()
        );
        return $bundles;
    }
}



<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LevelingJobController extends AbstractController
{
    /**
     * @Route("/levelingjob", name="leveling_job")
     */
    public function index(): Response
    {
        return $this->render('leveling_job/index.html.twig');
    }
    /**
     * @Route("/levelingjob/craftweapons", name="craftweapons")
     */
    public function weapons(): Response
    {
        return $this->render('leveling_job/weapons.html.twig');
    }
    /**
     * @Route("/levelingjob/armor", name="craftarmor")
     */
    public function armor(): Response
    {
        return $this->render('leveling_job/armor.html.twig');
    }
    /**
     * @Route("/levelingjob/engineering", name="craftengineering")
     */
    public function engineering(): Response
    {
        return $this->render('leveling_job/engineering.html.twig');
    }
    /**
     * @Route("/levelingjob/jewel", name="craftjewel")
     */
    public function jewel(): Response
    {
        return $this->render('leveling_job/jewel.html.twig');
    }
    /**
     * @Route("/levelingjob/arcana", name="craftarcana")
     */
    public function arcana(): Response
    {
        return $this->render('leveling_job/arcana.html.twig');
    }
    /**
     * @Route("/levelingjob/cooking", name="craftcooking")
     */
    public function cooking(): Response
    {
        return $this->render('leveling_job/cooking.html.twig');
    }
    /**
     * @Route("/levelingjob/furninshing", name="craftfurninshing")
     */
    public function furninshing(): Response
    {
        return $this->render('leveling_job/furninshing.html.twig');
    }
}

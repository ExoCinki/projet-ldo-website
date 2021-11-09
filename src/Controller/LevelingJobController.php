<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LevelingJobController extends AbstractController
{
    /**
     * @Route("/levelingjob", name="leveling_job")
     * @IsGranted("ROLE_USER")
     */
    public function index(): Response
    {
        return $this->render('leveling_job/index.html.twig');
    }
    /**
     * @Route("/levelingjob/craftweapons", name="craftweapons")
     * @IsGranted("ROLE_USER")
     */
    public function weapons(): Response
    {
        return $this->render('leveling_job/weapons.html.twig');
    }
    /**
     * @Route("/levelingjob/armor", name="craftarmor")
     * @IsGranted("ROLE_USER")
     */
    public function armor(): Response
    {
        return $this->render('leveling_job/armor.html.twig');
    }
    /**
     * @Route("/levelingjob/engineering", name="craftengineering")
     * @IsGranted("ROLE_USER")
     */
    public function engineering(): Response
    {
        return $this->render('leveling_job/engineering.html.twig');
    }
    /**
     * @Route("/levelingjob/jewel", name="craftjewel")
     * @IsGranted("ROLE_USER")
     */
    public function jewel(): Response
    {
        return $this->render('leveling_job/jewel.html.twig');
    }
    /**
     * @Route("/levelingjob/arcana", name="craftarcana")
     * @IsGranted("ROLE_USER")
     */
    public function arcana(): Response
    {
        return $this->render('leveling_job/arcana.html.twig');
    }
    /**
     * @Route("/levelingjob/cooking", name="craftcooking")
     * @IsGranted("ROLE_USER")
     */
    public function cooking(): Response
    {
        return $this->render('leveling_job/cooking.html.twig');
    }
    /**
     * @Route("/levelingjob/furninshing", name="craftfurninshing")
     * @IsGranted("ROLE_USER")
     */
    public function furninshing(): Response
    {
        return $this->render('leveling_job/furninshing.html.twig');
    }
}

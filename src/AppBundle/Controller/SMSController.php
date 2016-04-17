<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Caracteristique;
use AppBundle\Entity\Image;
use AppBundle\Entity\Produit;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SMSController extends Controller
{

    /**
     * @Route("/parssing", name="parssing")
     */
    function envoifichierAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $produits = simplexml_load_file('../web/catalog_francereduc_sms.xml');
//    $url = '../web/catalog_francereduc_sms.xml';
//$rss_file = file_get_contents($url);
///*instanciation du parseur xml intgre a PHP 5*/
//$produits = simplexml_load_string($rss_file, 'SimpleXMLElement', LIBXML_NOCDATA);
        // parssing des catalogues (catalogue1, catalogue2, catalogue3, catalogue4)
//        foreach ($produits->catalogue as $catalogues) {
//
//            foreach ($catalogues as $catalogue1) {
//
//                $categorie1 = new Categorie1();
//                $categorie1->setId($catalogue1['id']);
//                $categorie1->setName($catalogue1['name']);
//                
//
//                foreach ($catalogue1 as $catalogue2) {
//
//                    $categorie2 = new Categorie2();
//                    $categorie2->setId($catalogue2['id']);
//                    $categorie2->setName($catalogue2['name']);
//                    $categorie1->addCategories2($categorie2);
//                  
//                    foreach ($catalogue2 as $catalogue3) {
//
//                        $categorie3 = new Categorie3();
//                        $categorie3->setId($catalogue3['id']);
//                        $categorie3->setName($catalogue3['name']);
//                        $categorie2->addCategories3($categorie3);
//                       
//
//                        foreach ($catalogue3 as $catalogue4) {
//
//                            $categorie4 = new Categorie4();
//                            $categorie4->setId($catalogue4['id']);
//                            $categorie4->setName($catalogue4['name']);
//                            $categorie3->addCategories4($categorie4);
//                            
//                        }
//                    }
//                }
//                $em->persist($categorie1);
//                $em->flush();
//            }
//             die();
//        }


        // parssing des produits avec caracteristiques, images et categorie
        foreach ($produits->prods as $produits) {

            foreach ($produits as $produit) {
                $prod = new Produit();
                $prod->setId($produit->art_id);
                $prod->setArtCle($produit->art_cle);
                $prod->setConstRef((string)$produit->const_ref);
                $prod->setConstGar($produit->const_gar);
                $prod->setPoids($produit->poids);
                $prod->setEan($produit->ean);
                $prod->setStatus($produit->statut);
                $prod->setPartNumber($produit->partnumber);
                $prod->setMarque((string)$produit->marque);
                $prod->setLib((string)$produit->lib);
                $prod->setPrxHt($produit->prx_ht);
                $prod->setPrxTaxe($produit->prx_taxe);
                $prod->setPrxPublic($produit->prx_public);
                $prod->setDescrC((string)$produit->descr_c);
                $prod->setDescrL((string)$produit->descr_l);
                $categorie4 = $em->getRepository('AppBundle:Categorie4')->findOneBy(array("id" => $produit->category));
                if ($categorie4) {
                    $prod->setCategorie4($categorie4);
                }

                foreach ($produit->imgs as $imgs) {

                    foreach ($imgs as $img) {

                        $image = new Image();
                        $image->setType((string)$img['type']);
                        $image->setUrl((string)$img->type);
                        $prod->addImage($image);
                    }
                }


                foreach ($produit->caracts as $caracts) {

                    foreach ($caracts as $caract) {

                        $caracteristique = new Caracteristique();
                        $caracteristique->setGroupe((string)$caract->group);
                        $caracteristique->setLib((string)$caract->lib);
                        $caracteristique->setVal((string)$caract->val);
                        $prod->addCaracteristique($caracteristique);
                    }
                }
                $em->persist($prod);
                $em->flush();
            }

        }
        var_dump("sss");
        die();
    }

}

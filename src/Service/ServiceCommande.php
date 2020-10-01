<?php

namespace App\Service;

use App\Repository\PaniersRepository;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Security;


class ServiceCommande
{

    private $session;
    private $paniersRepository;
    private $userRepository;
    private $user;

    /* ********************************************************************************************************** */
    public function __construct(SessionInterface $session, PaniersRepository $paniersRepository, UserRepository $userRepository, Security $security)
    {
        $this->session = $session;
        $this->paniersRepository = $paniersRepository;
        $this->userRepository = $userRepository;
        $this->user = $security->getUser();

    }

    /* *************************************** ADD **************************************************** */
    public function add(int $id, int $quantite)
    {
        $commande = $this->session->get('commande', []);

        if (!empty($commande[$id])) {
            $commande[$id] += $quantite;
        } else {
            $commande[$id] = $quantite;
        }

        $this->session->set('commande', $commande);
    }


    /* ******************************************* DELETE ******************************************************* */
    public function delete(int $id)
    {
        $commande = $this->session->get('commande', []);

        if (!empty($commande[$id])) {
            unset($commande[$id]);
        }

        $this->session->set('commande', $commande);
    }

    /* ************************************** GET COMMANDE ********************************************************* */
    public function getCommandeAll(): array
    {
        $commande = $this->session->get('commande', []);

        $commandeData = [];

        foreach ($commande as $id => $quantite) $commandeData[] = [
            'article' => $this->paniersRepository->find($id),
            'quantite' => $quantite,
            'user' => $this->user
        ];

        return $commandeData;
    }

    /* ******************************************* GET PRIX TOTAL ****************************************************** */
    public function getPrixTotal(): float
    {
        $total = 0;

        foreach ($this->getCommandeAll() as $item) {
            $totalItem = $item['article']->getPrixPanier() * $item['quantite'];
            $total += $totalItem;
        }

        return $total;
    }

    /* ********************************************** GET QUANTITE **************************************************** */
    public function getQuantite(): int
    {
        $quantite = 0;

        foreach ($this->getCommandeAll() as $item) {
            $q = $item['quantite'];

            $quantite += $q;
        }

        return $quantite;

    }

}

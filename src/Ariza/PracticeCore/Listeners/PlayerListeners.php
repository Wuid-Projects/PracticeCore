<?php

namespace Ariza\PracticeCore\Listeners;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerCreationEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\player\GameMode;
use pocketmine\item\VanillaItems;
use pocketmine\utils\TextFormat as C;
use Ariza\PracticeCore\Classes\ArizaPlayer;
use pocketmine\event\player\PlayerItemUseEvent;
use pocketmine\item\Compass;
use pocketmine\player\Player;
use jojoe77777\FormAPI\SimpleForm;
use pocketmine\event\player\PlayerInteractEvent;

class PlayerListeners implements Listener {

    public function onCreate(PlayerCreationEvent $event) {
        $event->setPlayerClass(ArizaPlayer::class);
    }

    public function onJoin(PlayerJoinEvent $event): void {
        $player = $event->getPlayer();
        $player->sendMessage(C::GREEN . "Welcome to the server!");
        $player->getInventory()->clearAll();
        $player->getArmorInventory()->clearAll();
        $player->setGamemode(GameMode::ADVENTURE());
        $compass = VanillaItems::COMPASS();
        $compass->setCustomName(C::GREEN . "Select Gamemode!\n" . C::GRAY . "Right Click for PC\nClick the air for Mobile");
        $player->getInventory()->setItem(0, $compass);
        $player->getInventory()->setHeldItemIndex(0);
    }

    private function ffaSelector(Player $player) {
        $form = new SimpleForm(function (Player $player, $data) {
            switch ($data){
                case 0:
                    $sumoWorld = $player->getServer()->getWorldManager()->getWorldByName("sumo");
                    $player->teleport($sumoWorld->getSafeSpawn());
            }
        });
        $form->setTitle("Select a gamemode");
        $form->addButton("Sumo");
    }

    public function onItemUse(PlayerItemUseEvent $event) {
        $item = $event->getItem();
        if ($item instanceof Compass) {
            $this->ffaSelector($event->getPlayer());
        }
    }

    public function onInteract(PlayerInteractEvent $event) {
        $item = $event->getItem();
        if ($item instanceof Compass) {
            $this->ffaSelector($event->getPlayer());
        }
    }
}
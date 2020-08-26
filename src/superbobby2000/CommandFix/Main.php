<?php

declare(strict_types=1);

namespace superbobby2000\CommandFix;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerCommandPreprocessEvent;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener {

    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onExecute(PlayerCommandPreprocessEvent $event) {
        $message = $event->getMessage();
        $player = $event->getPlayer();
        $m = substr("$message", 0, 1);
        $me = substr($message, 1, 1);
        if ($m == '/') {
            if ($me === ' ') {
                $event->setCancelled();
            }
        }
    }
}
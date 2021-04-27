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

    public function onCommandExecute(PlayerCommandPreprocessEvent $event) {
        $message = $event->getMessage();
        $msg = explode(' ',trim($message));
        $m = substr("$message", 0, 1);
        $whitespace_check = substr($message, 1, 1);
        $slash_check = substr($msg[0], -1, 1);
        if ($m == '/') {
            if ($whitespace_check === ' ' or $slash_check === '\\') {
                $event->setCancelled();
            }
        }
    }
}